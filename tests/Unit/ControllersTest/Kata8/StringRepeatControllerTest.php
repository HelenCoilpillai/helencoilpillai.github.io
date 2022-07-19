<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter StringRepeatControllerTest
 *
 */

namespace tests\Unit\ControllerTest\Kata8;

use App\Http\Controllers\Kata8\StringRepeatController;
use App\Http\Requests\Kata8\StringRepeatRequest;
use App\Service\Kata8\StringRepeatService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;


class StringRepeatControllerTest extends TestCase
{
    private $redirectResponseMock;
    private $redirectorMock;
    private $stringRepeatControllerMock;
    private $stringRepeatRequestMock;
    private $stringRepeatServiceMock;

    public function setUp(): void
    {
        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->redirectorMock = Mockery::mock(Redirector::class);

        $this->stringRepeatControllerMock = Mockery::mock(StringRepeatController::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->stringRepeatRequestMock = Mockery::mock(StringRepeatRequest::class);

        $this->stringRepeatServiceMock = Mockery::mock(StringRepeatService::class);

    }

    public function tearDown(): void
    {
        Mockery::close();

        if (app() instanceof MockInterface) {
            \Illuminate\Container\Container::setInstance(null);
        }
    }

    /**
     * @covers StringRepeatController::stringRepeatFormSubmit()
     */
    public function testStringRepeatFormSubmitRedirectsWithSpecialMessage()
    {
        $textToRepeat = "string repeat kata";
        $repeatTimes = 7;
        $repeatedText = "string repeat katastring repeat katastring repeat katastring repeat katastring repeat katastring repeat katastring repeat kata";
        $formattedRepeatedString = "Repeated text: string repeat katastring repeat katastring repeat katastring repeat katastring repeat katastring<br>repeat katastring repeat kata";


        $this->stringRepeatRequestMock->shouldReceive('input')
            ->once()
            ->with('textToRepeat')
            ->andReturn($textToRepeat);

        $this->stringRepeatRequestMock->shouldReceive('input')
            ->once()
            ->with('repeatTimes')
            ->andReturn($repeatTimes);

        $this->stringRepeatControllerMock->__construct($this->stringRepeatServiceMock);

        $this->stringRepeatServiceMock->shouldReceive('repeatString')
            ->once()
            ->withArgs([$textToRepeat, $repeatTimes])
            ->andReturn($repeatedText);

        $this->stringRepeatControllerMock->shouldReceive('getRedirectObject')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectorMock);

        $this->redirectorMock->shouldReceive('back')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectResponseMock);

        $this->redirectResponseMock->shouldReceive("with")
            ->once()
            ->withArgs(["specialMessage", $formattedRepeatedString])
            ->andReturnSelf();

        $this->assertSame(
            $this->redirectResponseMock,
            $this->stringRepeatControllerMock->stringRepeatFormSubmit($this->stringRepeatRequestMock)
        );
    }

}
