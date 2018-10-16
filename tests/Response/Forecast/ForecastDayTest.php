<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\Forecast\Astro;
use Apixu\Response\Forecast\Day;
use Apixu\Response\Forecast\ForecastDay;
use Apixu\Tests\Response\AbstractGettersTest;
use Serializer\Collection;

class ForecastDayTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, ForecastDay::class);
    }

    public function vars() : array
    {
        $vars = [
            'date' => new \DateTime(),
            'dateEpoch' => time(),
            'day' => new Day(),
            'astro' => new Astro(),
            'hour' => new Collection([]),
        ];

        $vars2 = [
            'date' => null,
            'dateEpoch' => null,
            'day' => new Day(),
            'astro' => new Astro(),
            'hour' => new Collection([]),
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
