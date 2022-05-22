<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Services\Client\TelegramClient;
use App\Http\Services\Telegram\TelegramService;
use Illuminate\Http\Request;
use JsonException;
use Psr\Log\LoggerInterface;

class TelegramController extends Controller
{
    public LoggerInterface $logger;

    public TelegramService $service;

    public TelegramClient $client;

    /**
     * @param LoggerInterface $logger
     * @param TelegramService $service
     * @param TelegramClient $client
     */
    public function __construct(LoggerInterface $logger, TelegramService $service, TelegramClient $client)
    {
        $this->logger = $logger;
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