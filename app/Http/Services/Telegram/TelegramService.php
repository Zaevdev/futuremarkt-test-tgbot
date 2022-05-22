<?php

declare(strict_types=1);

namespace App\Http\Services\Telegram;

class TelegramService
{

    protected TelegramKeyboardHelper $keyboardHelper;

    /**
     * @param TelegramKeyboardHelper $keyboardHelper
     */
    public function __construct(TelegramKeyboardHelper $keyboardHelper)
    {
        $this->keyboardHelper = $keyboardHelper;
    }

    public function readMessage(array $telegramMessage): array
    {
        $message = mb_strtolower(($telegramMessage['message']['text']), 'utf-8');
        $send_data = match ($message) {
            mb_strtolower(TelegramKeyboardHelper::BUTTON_ONE) => $this->keyboardHelper->getButtonOne(),
            mb_strtolower(TelegramKeyboardHelper::BUTTON_TWO) => $this->keyboardHelper->getButtonTwo(),
            default => $this->keyboardHelper->getButtonDefault(),
        };
        $send_data['chat_id'] = $telegramMessage['message']['chat']['id'];

        return $send_data;
    }
}