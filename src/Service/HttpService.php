<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpService
{
    public function __construct(
        private HttpClientInterface $httpClient,
    )
    {
    }

    public function getSubject(int $num): string
    {
        return 'Subject ' . $num;
    }
}
