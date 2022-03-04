<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter RemoveFirstAndLastCharacterControllerTest
 *
 */

namespace tests\Unit\ControllerTest;

use App\Http\Controllers\RemoveFirstAndLastCharacterController;
use App\Http\Requests\RemoveFirstAndLastCharacterRequest;
use App\Service\Kata\RemoveFirstAndLastCharacterService;
use Illuminate\Http\RedirectResponse;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class RemoveFirstAndLastCharacterControllerTest extends TestCase
{
    private $removeFirstAndLastCharacterControllerMock;
    private $removeFirstAndLastCharacterServiceMock;
    private $removeFirstAndLastCharacterRequestMock;
    private $redirectMock;

    public function setUp(): void
    {

        $this->removeFirstAndLastCharacterRequestMock = Mockery::mock(RemoveFirstAndLastCharacterRequest::class);

        $this->removeFirstAndLastCharacterControllerMock = Mockery::mock(RemoveFirstAndLastCharacterController::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->redirectMock = Mockery::mock(RedirectResponse::class);

        $this->removeFirstAndLastCharacterServiceMock = Mockery::mock(RemoveFirstAndLastCharacterService::class);

    }

    public function tearDown(): void
    {
        Mockery::close();

        if (app() instanceof MockInterface) {
            \Illuminate\Container\Container::setInstance(null);
        }
    }

    /**
     * @covers RemoveFirstAndLastCharacterController::removeFirstAndLastCharacterFormSubmit()
     */
    public function testRemoveFirstAndLastCharacterFormSubmitRedirectsWithMessage()
    {
        $inputString = "Unit Testing";
        $modifiedString = "nit Testin";

        $this->removeFirstAndLastCharacterRequestMock->shouldReceive('input')
            ->once()
            ->with('input')
            ->andReturn($inputString);

        $this->removeFirstAndLastCharacterControllerMock->__construct($this->removeFirstAndLastCharacterServiceMock);

        $this->removeFirstAndLastCharacterServiceMock->shouldReceive("removeFirstAndLastCharacter")
            ->once()
            ->with($inputString)
            ->andReturn($modifiedString);

        $this->removeFirstAndLastCharacterControllerMock->shouldReceive("getRedirectObject")
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectMock);

        $this->redirectMock->shouldReceive("back")
            ->once()
            ->withNoArgs()
            ->andReturnSelf();

        $this->redirectMock->shouldReceive("with")
            ->once()
            ->withArgs(["message", "The first & last characters have been removed: {$modifiedString}"])
            ->andReturnSelf();

        $this->assertSame($this->redirectMock,
            $this->removeFirstAndLastCharacterControllerMock
                ->removeFirstAndLastCharacterFormSubmit($this->removeFirstAndLastCharacterRequestMock));
    }
}



