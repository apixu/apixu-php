<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\CurrentCondition;
use Apixu\Response\Forecast\Hour;
use Apixu\Tests\Response\AbstractGettersTest;

class HourTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Hour::class);
    }

    public function vars() : array
    {
        $vars = [
            'timeEpoch' => 15,
            'time' => new \DateTime(),
            'tempCelsius' => 9.0,
            'tempFahrenheit' => 37.0,
            'day' => true,
            'condition' => new CurrentCondition(),
            'windMPH' => 92.0,
            'windKMH' => 80.0,
            'windDegree' => 17,
            'windDirection' => 'nw',
            'pressureMB' => 81.0,
            'pressureIN' => 41.0,
            'precipMM' => 91.0,
            'precipIN' => 36.0,
            'humidity' => 3,
            'cloud' => 90,
            'feelsLikeCelsius' => 69.0,
            'feelsLikeFahrenheit' => 92.0,
            'windChillCelsius' => 16.0,
            'windChillFahrenheit' => 50.0,
            'heatIndexCelsius' => 43.0,
            'heatIndexFahrenheit' => 56.0,
            'dewPointCelsius' => 95.0,
            'dewPointFahrenheit' => 78.0,
            'willItRain' => true,
            'chanceOfRain' => '100%',
            'willItSnow' => false,
            'chanceOfSnow' => '0%',
            'visKM' => 17.0,
            'visMiles' => 42.0,
            'gustMph' => 15.7,
            'gustKph' => 25.2,
        ];

        $vars2 = [
            'timeEpoch' => null,
            'time' => null,
            'tempCelsius' => null,
            'tempFahrenheit' => null,
            'day' => null,
            'condition' => new CurrentCondition(),
            'windMPH' => null,
            'windKMH' => null,
            'windDegree' => null,
            'windDirection' => null,
            'pressureMB' => null,
            'pressureIN' => null,
            'precipMM' => null,
            'precipIN' => null,
            'humidity' => null,
            'cloud' => null,
            'feelsLikeCelsius' => null,
            'feelsLikeFahrenheit' => null,
            'windChillCelsius' => null,
            'windChillFahrenheit' => null,
            'heatIndexCelsius' => null,
            'heatIndexFahrenheit' => null,
            'dewPointCelsius' => null,
            'dewPointFahrenheit' => null,
            'willItRain' => null,
            'chanceOfRain' => null,
            'willItSnow' => null,
            'chanceOfSnow' => null,
            'visKM' => null,
            'visMiles' => null,
            'gustMph' => null,
            'gustKph' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
