<?php

declare(strict_types=1);

namespace App\Http\Services\Telegram;

use JetBrains\PhpStorm\ArrayShape;

class TelegramKeyboardHelper
{

    public const BUTTON_ONE = 'Кнопка 1';
    public const BUTTON_TWO = 'Кнопка 2';
    public const BUTTON_DEFAULT = 'На главную!';

    #[ArrayShape(['text' => "string", 'reply_markup' => "array"])]
    public function getButtonOne(): array
    {
        return [
            'text' => 'Ответ от кнопки 1',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => self::BUTTON_DEFAULT],
                    ]
                ]
            ]

        ];
    }

    #[ArrayShape(['text' => "string", 'reply_markup' => "array"])]
    public function getButtonTwo(): array
    {
        return [
            'text' => 'Ответ от кнопки 2',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => self::BUTTON_DEFAULT],
                    ]
                ]
            ]

        ];
    }

    #[ArrayShape(['text' => "string", 'reply_markup' => "array"])]
    public function getButtonDefault(): array
    {
        return [
            'text' => 'Привет, друг! Выбери кнопку:',
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => self::BUTTON_ONE],
                        ['text' => self::BUTTON_TWO],
                    ]
                ]
            ]
        ];
    }
}