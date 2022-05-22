<?php

declare(strict_types=1);

namespace App\Http\Services\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Log\LoggerInterface;

class BaseClient
{
    protected LoggerInterface $logger;
    protected Client $client;

    public function __construct(Client $client, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = $client;
    }

    /**
     * @throws JsonException
     */
    public function post(string $link, array $body): void
    {
        try {
            $this->client->post($link, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($body, JSON_THROW_ON_ERROR),
                'timeout' => 5,
            ]);
        } catch (GuzzleException $exception) {
            $this->logger->error($exception->getMessage());
        }
    }
}