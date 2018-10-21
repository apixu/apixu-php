<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\Forecast\ForecastWeather;
use Apixu\Response\History;
use Apixu\Response\Location;

class HistoryTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, History::class);
    }

    public function vars() : array
    {
        $vars = [
            'location' => new Location(),
            'forecast' => new ForecastWeather(),
        ];

        return [
            [$vars],
        ];
    }
}
