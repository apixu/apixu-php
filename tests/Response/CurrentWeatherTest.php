<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\Current;
use Apixu\Response\CurrentWeather;
use Apixu\Response\Location;

class CurrentWeatherTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, CurrentWeather::class);
    }

    public function vars() : array
    {
        $vars = [
            'location' => new Location(),
            'current' => new Current()
        ];

        return [
            [$vars],
        ];
    }
}
