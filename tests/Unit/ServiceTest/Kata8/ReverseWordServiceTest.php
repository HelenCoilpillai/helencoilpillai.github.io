<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter ReverseWordServiceTest
 *
 */

namespace tests\Unit\ServiceTest\Kata8;

use App\Service\Kata8\ReverseWordService;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class ReverseWordServiceTest extends TestCase
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
     * @covers \App\Service\Kata\ReverseWordService::reverseWords
     */
    public function testReverseWordsReturnsTheReversedString()
    {
        $textToBeReversed = "the wide mouth frog";
        $reversedText = "frog mouth wide the";

        $reverseWordService = new ReverseWordService();

        $this->assertSame($reversedText, $reverseWordService->reverseWords($textToBeReversed));

    }
}
