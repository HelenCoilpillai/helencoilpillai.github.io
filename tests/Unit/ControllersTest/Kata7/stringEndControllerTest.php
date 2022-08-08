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
use App\Repository\Kata7\StringEndRepository;
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
    private $redirectorMock;
    private $stringEndRepositoryMock;

    public function setUp(): void
    {
        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->stringEndControllerMock = Mockery::mock(StringEndController::class)
            ->shouldAllowMockingProtectedMethods()
            ->makePartial();

        $this->stringEndRequestMock = Mockery::mock(StringEndRequest::class);

        $this->redirectorMock = Mockery::mock(Redirector::class);

        $this->stringEndRepositoryMock = Mockery::mock(StringEndRepository::class);
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
        $messageString = "The text matches the given text ending";
        $specialMessageString = "The 'String End' values have been saved!";
        $inputFields = ['text', 'text_ending'];
        $inputData = ['text' => 'testingTheStringEndService', 'text_ending' => 'ice'];

        $this->stringEndRequestMock->shouldReceive('only')
            ->once()
            ->with($inputFields)
            ->andReturn($inputData);

        $this->stringEndControllerMock->__construct($this->stringEndRepositoryMock);

        $this->stringEndControllerMock->shouldReceive('store')
            ->once()
            ->with($inputData)
            ->andReturnNull();

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

        $this->redirectResponseMock->shouldReceive('with')
            ->once()
            ->withArgs(["specialMessage", $specialMessageString])
            ->andReturnSelf();

        $this->assertSame(
            $this->redirectResponseMock,
            $this->stringEndControllerMock->stringEndFormSubmit($this->stringEndRequestMock)
        );
    }
}
