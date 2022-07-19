<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter ReverseWordsControllerTest
 *
 */

namespace tests\Unit\ControllersTest\Kata8;

use App\Http\Controllers\Kata8\ReverseWordsController;
use App\Http\Requests\Kata8\ReverseWordRequest;
use App\Service\Kata8\ReverseWordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class ReverseWordsControllerTest extends TestCase
{

    private $reverseWordsControllerMock;
    private $reverseWordRequestMock;
    private $redirectResponseMock;
    private $reverseWordServiceMock;
    private $redirectorMock;

    public function setUp(): void
    {
        $this->reverseWordsControllerMock = Mockery::mock(ReverseWordsController::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->reverseWordRequestMock = Mockery::mock(ReverseWordRequest::class);

        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->reverseWordServiceMock = Mockery::mock(ReverseWordService::class);

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
     * @covers ReverseWordsController::reverseWordsFormSubmit()
     */
    public function testReverseWordsFormSubmitRedirectWithMessage()
    {
        $textToBeReversed = "the wide mouth frog";
        $reversedText = "frog mouth wide the";

        $this->reverseWordsControllerMock->__construct($this->reverseWordServiceMock);

        $this->reverseWordRequestMock->shouldReceive('input')
            ->once()
            ->with('reverseWordsText')
            ->andReturn($textToBeReversed);

        $this->reverseWordServiceMock->shouldReceive('reverseWords')
            ->once()
            ->with($textToBeReversed)
            ->andReturn($reversedText);

        $this->reverseWordsControllerMock->shouldReceive('getRedirectObject')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectorMock);

        $this->redirectorMock->shouldReceive('back')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectResponseMock);

        $this->redirectResponseMock->shouldReceive('with')
            ->once()
            ->withArgs(['message', "This is the reversed text: {$reversedText}"])
            ->andReturnSelf();

        $this->assertSame(
            $this->redirectResponseMock,
            $this->reverseWordsControllerMock->reverseWordsFormSubmit($this->reverseWordRequestMock)
        );
    }
}
