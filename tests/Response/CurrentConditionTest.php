<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\CurrentCondition;

class CurrentConditionTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, CurrentCondition::class);
    }

    public function vars() : array
    {
        $vars = [
            'text' => 'text',
            'icon' => 'ico',
            'code' => 33,
        ];

        $vars2 = [
            'text' => null,
            'icon' => null,
            'code' => null,
        ];

        return [
            [$vars],
            [$vars2],
        ];
    }
}
