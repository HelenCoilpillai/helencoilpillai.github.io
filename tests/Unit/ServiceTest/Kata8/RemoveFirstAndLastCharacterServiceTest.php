<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter RemoveFirstAndLastCharacterServiceTest
 */

namespace tests\Unit\ServiceTest\Kata8;

use App\Service\Kata8\RemoveFirstAndLastCharacterService;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class RemoveFirstAndLastCharacterServiceTest extends TestCase
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
     * @covers RemoveFirstAndLastCharacterService::removeFirstAndLastCharacter
     */
    public function testRemoveFirstAndLastCharacterEqualsGivenValueWhenTextLengthIsGreaterThanOne(): void
    {
        $removeFirstAndLastCharacterService = new RemoveFirstAndLastCharacterService();

        $this->assertEquals('nit Testin',
            $removeFirstAndLastCharacterService->removeFirstAndLastCharacter('Unit Testing'));
    }

    /**
     * @covers RemoveFirstAndLastCharacterService::removeFirstAndLastCharacter
     */
    public function testRemoveFirstAndLastCharacterReturnsEmptyWhenTextLengthIsLessThanOne(): void
    {
        $removeFirstAndLastCharacterService = new RemoveFirstAndLastCharacterService();

        $this->assertEmpty($removeFirstAndLastCharacterService->removeFirstAndLastCharacter('U'));
    }
}
