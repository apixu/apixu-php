<?php declare(strict_types = 1);

namespace Apixu\Tests\Response\Forecast;

use Apixu\Response\Forecast\Astro;
use Apixu\Tests\Response\AbstractGettersTest;

class AstroTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Astro::class);
    }

    public function vars() : array
    {
        $vars = [
            'sunrise' => 'sr',
            'sunset' => 'ss',
            'moonrise' => 'mr',
            'moonset' => 'ms',
        ];

        $vars2 = [
            'sunrise' => null,
            'sunset' => null,
            'moonrise' => null,
            'moonset' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
