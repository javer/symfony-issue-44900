<?php

namespace App\Tests;

use App\Service\HttpService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class HttpServiceTest extends KernelTestCase
{
    private HttpService $httpService;

    protected function setUp(): void
    {
        $this->httpService = self::getContainer()->get(HttpService::class);
    }

    protected function tearDown(): void
    {
        self::getContainer()->get('services_resetter')->reset();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetSubject(int $num, string $expectedValue): void
    {
        self::assertEquals($expectedValue, $this->httpService->getSubject($num));
    }

    public function dataProvider(): iterable
    {
        for ($i = 0; $i < 1024; $i++) {
            yield [$i, 'Subject ' . $i];
        }
    }
}
