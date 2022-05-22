<?php

declare(strict_types=1);

namespace App\Http\Services\Client;

use JsonException;

class TelegramClient
{
    protected BaseClient $client;

    public const SEND_MESSAGE_METHOD = 'sendMessage';

    /**
     * @param BaseClient $client
     */
    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }

    /**
     * @throws JsonException
     */
    public function sendMessage(array $message): void
    {
        $url = env('TELEGRAM_DOMAIN') . env('TELEGRAM_TOKEN') . '/' . self::SEND_MESSAGE_METHOD;
        $this->client->post($url, $message);
    }
}