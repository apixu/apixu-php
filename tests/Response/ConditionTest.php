<?php declare(strict_types = 1);

namespace Apixu\Tests\Response;

use Apixu\Response\Condition;

class ConditionTest extends AbstractGettersTest
{
    /**
     * @dataProvider vars
     * @param array $vars
     */
    public function testGetters(array $vars)
    {
        $this->execute($vars, Condition::class);
    }

    public function vars() : array
    {
        $vars = [
            'code' => 33,
            'day' => 'day',
            'night' => 'night',
            'icon' => 1,
        ];

        return [
            [$vars],
        ];
    }
}
