<?php

namespace KataStarter\Test;

use PHPUnit\Framework\TestCase;

class YatzyScoreTest extends TestCase
{
    /**
     * @dataProvider getChanceTestCases
     */
    public function it_gets_chance($category, $expected, $dices)
    {
        $sut = new YatzyScoreResolver();
        $actual = $sut->get($category, $dices);
        $this->assertEquals($expected, $actual);
    }

    public function getChanceTestCases()
    {
        return [
            'chance_0' => ['chance', 14, [1,1,3,3,6]],
            'chance_1' => ['chance', 21, [4,5,5,6,1]],
            'yatzy_ok' => ['yatzy', 50, [1,1,1,1,1]],
            'yatzy_nok' => ['yatzy', 0, [1,1,1,2,1]],
            'ones' => ['ones', 0, [3,3,3,4,5]],
            'twos' => ['twos', 4, [2,3,2,5,1]],
            'fours' => ['fours', 8, [1,1,2,4,4]],
            'small_straight' => ['small_straight', 15, [1,2,3,4,5]],
            'small_straight_nok' => ['small_straight', 0, [1,1,3,4,5]],
            'large_straight' => ['large_straight', 20, [2,3,4,5,6]],
            'large_straight_nok' => ['large_straight', 0, [1,3,4,5,6]],
            'full_house_nok' => ['full_house', 0, [4,3,5,5,5]],
            'full_house_ok' => ['full_house', 8, [1,1,2,2,2]],
            'four_kind_nok' => ['four_kind', 0, [2,2,2,5,5]],
            'four_kind_ok' => ['four_kind', 8, [2,2,2,2,5]],
            'three_king_nok' => ['three_kind', 0, [3,3,2,2,1]],
            'two_pairs_nok' => ['two_pairs', 0, [1,2,3,4,5]],
            'two_pairs_ok' => ['two_pairs', 8, [1,1,2,3,3]],
            'two_pairs_nok2' => ['two_pairs', 6, [1,1,2,2,2]],
            'pair_nok' => ['pair', 0, [1,2,3,4,5]],
            'pair_ok' => ['pair', 8, [3,3,3,4,4]],
            'pair_ok2' => ['pair', 6, [3,3,3,3,1]],
        ];
    }
}
