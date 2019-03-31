<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\Current;
use Apixu\Response\CurrentCondition;

class CurrentTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Current::class);
    }

    public function vars() : array
    {
        $vars = [
            'lastUpdatedEpoch' => 8,
            'lastUpdated' => new \DateTime(),
            'tempCelsius' => 35.0,
            'tempFahrenheit' => 58.0,
            'day' => false,
            'condition' => new CurrentCondition(),
            'windMPH' => 8.1,
            'windKPH' => 48.5,
            'windDegree' => 48,
            'windDirection' => 'nw',
            'pressureMB' => 97.0,
            'pressureIN' => 17.0,
            'precipMM' => 63.0,
            'precipIN' => 83.0,
            'humidity' => 79,
            'cloud' => 91,
            'feelsLikeCelsius' => 74.0,
            'feelsLikeFahrenheit' => 93.0,
            'visKM' => 84.0,
            'visMiles' => 37.0,
            'uV' => 2.0,
            'gustMph' => 16.1,
            'gustKph' => 25.9,
        ];

        $vars2 = [
            'lastUpdatedEpoch' => null,
            'lastUpdated' => null,
            'tempCelsius' => null,
            'tempFahrenheit' => null,
            'day' => null,
            'condition' => new CurrentCondition(),
            'windMPH' => null,
            'windKPH' => null,
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
            'visKM' => null,
            'visMiles' => null,
            'uV' => null,
            'gustMph' => null,
            'gustKph' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
