<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter stringEndControllerTest
 *
 */

namespace tests\Unit\ControllerTest\Kata7;

use App\Http\Controllers\Kata7\StringEndController;
use App\Http\Requests\Kata7\StringEndRequest;
use App\Service\Kata7\StringEndService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class stringEndControllerTest extends TestCase
{

    private $redirectResponseMock;
    private $stringEndControllerMock;
    private $stringEndRequestMock;
    private $stringEndServiceMock;
    private $redirectorMock;


    public function setUp(): void
    {
        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->stringEndControllerMock = Mockery::mock(StringEndController::class)
            ->shouldAllowMockingProtectedMethods()
            ->makePartial();

        $this->stringEndRequestMock = Mockery::mock(StringEndRequest::class);

        $this->stringEndServiceMock = Mockery::mock(StringEndService::class);

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
     * @covers \App\Http\Controllers\Kata7\StringEndController::stringEndFormSubmit
     */
    public function testStringEndFormSubmitRedirectsWithMessage()
    {
        $stringValue = "testingTheStringEndService";
        $stringEnding = "ice";
        $messageString = "The text matches the given text ending";

        $this->stringEndRequestMock->shouldReceive('input')
            ->once()
            ->with('text')
            ->andReturn($stringValue);

        $this->stringEndRequestMock->shouldReceive('input')
            ->once()
            ->with('textEnding')
            ->andReturn($stringEnding);

        $this->stringEndControllerMock->__construct($this->stringEndServiceMock);

        $this->stringEndServiceMock->shouldReceive('checkIfStringMatchesTheGivenEnding')
            ->once()
            ->withArgs([$stringValue, $stringEnding])
            ->andReturn($messageString);

        $this->stringEndControllerMock->shouldReceive('getRedirectObject')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectorMock);

        $this->redirectorMock->shouldReceive('back')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectResponseMock);

        $this->redirectResponseMock->shouldReceive('with')
            ->once()
            ->withArgs(["message", $messageString])
            ->andReturnSelf();

        $this->assertSame($this->redirectResponseMock,
            $this->stringEndControllerMock->stringEndFormSubmit($this->stringEndRequestMock));
    }
}
