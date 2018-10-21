<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\Current;
use Apixu\Response\Forecast\Forecast;
use Apixu\Response\Forecast\ForecastWeather;
use Apixu\Response\Location;
use Apixu\Tests\Response\AbstractGettersTest;

class ForecastTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Forecast::class);
    }

    public function vars() : array
    {
        $vars = [
            'location' => new Location(),
            'current' => new Current(),
            'forecast' => new ForecastWeather(),
        ];

        return [
            [$vars],
        ];
    }
}
