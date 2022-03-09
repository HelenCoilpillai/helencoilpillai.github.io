<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter StringRepeatServiceTest
 *
 */

namespace tests\Unit\ServiceTest;

use App\Service\Kata\StringRepeatService;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class StringRepeatServiceTest extends TestCase
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
     * @covers \App\Service\Kata\StringRepeatService::repeatString
     */
    public function testRepeatStringReturnsTheRepeatedStringValue()
    {
        $repeatedText = "string repeat katastring repeat katastring repeat katastring repeat katastring repeat katastring repeat katastring repeat kata";
        $stringRepeatService = new StringRepeatService();

        $this->assertSame($repeatedText, $stringRepeatService->repeatString('string repeat kata', 7));
    }
}
