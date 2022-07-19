<?php

/**
 * @author      Helen Coilpillai
 * @since       PHP 7.4
 * @copyright   ProActive 2022
 *
 * @run: php artisan test --filter HighestAndLowestNumbersControllerTest
 *
 */

namespace tests\Unit\ControllerTest\Kata7;

use App\Http\Controllers\Kata7\HighestAndLowestNumbersController;
use App\Http\Requests\Kata7\HighestAndLowestNumbersRequest;
use App\Service\Kata7\HighestAndLowestNumbersService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class HighestAndLowestNumbersControllerTest extends TestCase
{
    private $redirectResponseMock;
    private $highestAndLowestNumbersControllerMock;
    private $highestAndLowestNumbersRequestMock;
    private $highestAndLowestNumberServiceMock;
    private $redirectorMock;

    public function setUp(): void
    {
        $this->redirectResponseMock = Mockery::mock(RedirectResponse::class);

        $this->highestAndLowestNumbersControllerMock = Mockery::mock(HighestAndLowestNumbersController::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->highestAndLowestNumbersRequestMock = Mockery::mock(HighestAndLowestNumbersRequest::class);

        $this->highestAndLowestNumberServiceMock = Mockery::mock(HighestAndLowestNumbersService::class);

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
     * @covers HighestAndLowestNumbersController::highestAndLowestNumbersFormSubmit()
     */
    public function testHighestAndLowestNumbersFormSubmitRedirectsWithMessage()
    {
        $inputNumbers = "1 4 7 78 99 23 444 -8";
        $highestAndLowestNumbers = "Highest: 444 Lowest: -8";

        $this->highestAndLowestNumbersRequestMock->shouldReceive('input')
            ->once()
            ->with('numbers')
            ->andReturn($inputNumbers);

        $this->highestAndLowestNumbersControllerMock->__construct($this->highestAndLowestNumberServiceMock);

        $this->highestAndLowestNumberServiceMock->shouldReceive('findHighestAndLowestNumbers')
            ->once()
            ->with($inputNumbers)
            ->andReturn($highestAndLowestNumbers);

        $this->highestAndLowestNumbersControllerMock->shouldReceive('getRedirectObject')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectorMock);

        $this->redirectorMock->shouldReceive('back')
            ->once()
            ->withNoArgs()
            ->andReturn($this->redirectResponseMock);

        $this->redirectResponseMock->shouldReceive('with')
            ->once()
            ->withArgs(['message', $highestAndLowestNumbers])
            ->andReturnSelf();

        $this->assertSame(
            $this->redirectResponseMock,
            $this->highestAndLowestNumbersControllerMock
                ->highestAndLowestNumbersFormSubmit($this->highestAndLowestNumbersRequestMock)
        );
    }
}
