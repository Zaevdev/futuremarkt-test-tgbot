<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Services\Client\TelegramClient;
use App\Http\Services\Telegram\TelegramService;
use Illuminate\Http\Request;
use JsonException;

class TelegramController extends Controller
{

    public TelegramService $service;

    public TelegramClient $client;

    /**
     * @param TelegramService $service
     * @param TelegramClient $client
     */
    public function __construct(TelegramService $service, TelegramClient $client)
    {
        $this->service = $service;
        $this->client = $client;
    }

    /**
     * @throws JsonException
     */
    public function getDataFromTg(Request $request): void
    {
        $readMessageArray = $this->service->readMessage($request->all());

        $this->client->sendMessage($readMessageArray);
    }
}