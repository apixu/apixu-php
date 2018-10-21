<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\CurrentCondition;
use Apixu\Response\Forecast\Day;
use Apixu\Tests\Response\AbstractGettersTest;

class DayTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Day::class);
    }

    public function vars() : array
    {
        $vars = [
            'maxTempCelsius' => 20.0,
            'maxTempFahrenheit' => 98.0,
            'minTempCelsius' => 25.0,
            'minTempFahrenheit' => 19.0,
            'avgTempCelsius' => 70.0,
            'avgTempFahrenheit' => 88.0,
            'maxWindMPH' => 56.0,
            'maxWindKMH' => 54.0,
            'totalPrecipMM' => 56.0,
            'totalPrecipIN' => 87.0,
            'avgVisKM' => 9.0,
            'avgVisMiles' => 65.0,
            'avgHumidity' => 85.0,
            'condition' => new CurrentCondition(),
            'uV' => 25.0,
        ];

        $vars2 = [
            'maxTempCelsius' => null,
            'maxTempFahrenheit' => null,
            'minTempCelsius' => null,
            'minTempFahrenheit' => null,
            'avgTempCelsius' => null,
            'avgTempFahrenheit' => null,
            'maxWindMPH' => null,
            'maxWindKMH' => null,
            'totalPrecipMM' => null,
            'totalPrecipIN' => null,
            'avgVisKM' => null,
            'avgVisMiles' => null,
            'avgHumidity' => null,
            'condition' => new CurrentCondition(),
            'uV' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
