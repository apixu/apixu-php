<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\Forecast\ForecastWeather;
use Apixu\Tests\Response\AbstractGettersTest;
use Serializer\Collection;

class ForecastWeatherTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, ForecastWeather::class);
    }

    public function vars() : array
    {
        $vars = [
            'forecastDay' => new Collection([]),
        ];

        return [
            [$vars],
        ];
    }
}
