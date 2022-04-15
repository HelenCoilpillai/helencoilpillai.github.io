<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter StringEndServiceTest
 *
 */

namespace testsUnit\ServiceTest\Kata7;

use App\Service\Kata7\StringEndService;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class StringEndServiceTest extends TestCase
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
     * @covers \App\Service\Kata7\StringEndService::checkIfStringMatchesTheGivenEnding
     */
    public function testCheckIfStringMatchesTheGivenEndingReturnsMessageWhenTextEndingDoesNotMatch()
    {
        $stringEndService = new StringEndService();
        $stringValue = "testingTheStringEndService";
        $stringEnding = "noMatch";

        $this->assertSame("The text does not match the given text ending",
            $stringEndService->checkIfStringMatchesTheGivenEnding($stringValue, $stringEnding));

    }

    /**
     * @covers \App\Service\Kata7\StringEndService::checkIfStringMatchesTheGivenEnding
     */
    public function testCheckIfStringMatchesTheGivenEndingReturnsMessageWhenTextEndingDoesMatch()
    {
        $stringEndService = new StringEndService();
        $stringValue = "testingTheStringEndService";
        $stringEnding = "ice";

        $this->assertSame("The text matches the given text ending",
            $stringEndService->checkIfStringMatchesTheGivenEnding($stringValue, $stringEnding));

    }
}
