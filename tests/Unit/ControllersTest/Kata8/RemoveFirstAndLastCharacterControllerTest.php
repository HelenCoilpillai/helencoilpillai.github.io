<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter RemoveFirstAndLastCharacterControllerTest
 *
 */

namespace tests\Unit\ControllerTest\Kata8;

use App\Http\Controllers\Kata8\RemoveFirstAndLastCharacterController;
use App\Http\Requests\Kata8\RemoveFirstAndLastCharacterRequest;
use App\Service\Kata8\RemoveFirstAndLastCharacterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class RemoveFirstAndLastCharacterControllerTest extends TestCase
{
    private $removeFirstAndLastCharacterControllerMock;
    private $removeFirstAndLastCharacterServiceMock;
    private $removeFirstAndLastCharacterRequestMock;
    private $redirectResponseMock;
    private $redirectorMock;

    public function setUp(): void
    {

        $this->removeFirstAndLastCharacterRequestMock = Mockery::mock(RemoveFirstAndLastCharacterRequest::class);

        $this->removeFirstAndLastCharacterControllerMock = Mockery::mock(RemoveFirstAndLastCharacterController::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->removeFirstAndLastCharacterServiceMock = Mockery::mock(RemoveFirstAndLastCharacterService::class);

        $this->redirectorMock = Mockery::mock(Redirector::class);
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
            ->andReturn($this->redirectorMock);

        $this->redirectorMock->shouldReceive("back")
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectResponseMock);

        $this->redirectResponseMock->shouldReceive("with")
            ->once()
            ->withArgs(["message", "The first & last characters have been removed: {$modifiedString}"])
            ->andReturnSelf();

        $this->assertSame(
            $this->redirectResponseMock,
            $this->removeFirstAndLastCharacterControllerMock
                ->removeFirstAndLastCharacterFormSubmit($this->removeFirstAndLastCharacterRequestMock)
        );
    }
}
