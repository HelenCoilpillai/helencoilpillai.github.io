<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter HighestAndLowestNumbersServiceTest
 *
 */

namespace testsUnit\ServiceTest\Kata7;

use App\Service\Kata7\HighestAndLowestNumbersService;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class HighestAndLowestNumbersServiceTest extends TestCase
{

    public function setUp(): void
    {

    }

    public function tearDown(): void
    {
        Mockery::close();

        if (app() instanceof MockInterface) {
            \Illuminate\Container\Container::setInstance(null);
        }
    }

    /**
     * @covers \App\Service\Kata7\HighestAndLowestNumbersService::findHighestAndLowestNumbers
     */
    public function testFindHighestAndLowestNumbersReturnsString()
    {
        $inputNumbers = "1 4 7 78 99 23 444 -8";
        $highestAndLowestNumbers = "Highest: 444 Lowest: -8";
        $highestAndLowestNumbersService = new HighestAndLowestNumbersService();

        $this->assertSame($highestAndLowestNumbers, $highestAndLowestNumbersService->findHighestAndLowestNumbers($inputNumbers));
    }

}
