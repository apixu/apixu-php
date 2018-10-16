<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\Location;

class LocationTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Location::class);
    }

    public function vars() : array
    {
        $vars = [
            'id' => 1,
            'name' => 'London',
            'region' => 'Region',
            'country' => 'UK',
            'lat' => 2.0,
            'lon' => 45.0,
            'timezone' => 'Eu/Buc',
            'localtimeEpoch' => time(),
            'localtime' => new \DateTime(),
        ];

        $vars2 = [
            'id' => null,
            'name' => 'London',
            'region' => 'Region',
            'country' => 'UK',
            'lat' => 2.0,
            'lon' => 45.0,
            'timezone' => null,
            'localtimeEpoch' => null,
            'localtime' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
