<?php

namespace KataStarter\Test;

class YatzyScoreResolver
{
    public function __construct()
    {
    }

    public function get(string $category, array $dices)
    {
        sort($dices);
        $occurences = \array_count_values($dices);

        if ($category === 'yatzy') {
            return \count(\array_unique($dices)) === 1 ? 50 : 0;
        }
        if ($category === 'ones') {
            return $this->getOneTwoThreeFourFiveSix($dices, 1);
        }
        if ($category === 'twos') {
            return $this->getOneTwoThreeFourFiveSix($dices, 2);
        }
        if ($category === 'threes') {
            return $this->getOneTwoThreeFourFiveSix($dices, 3);
        }
        if ($category === 'fours') {
            return $this->getOneTwoThreeFourFiveSix($dices, 4);
        }
        if ($category === 'fives') {
            return $this->getOneTwoThreeFourFiveSix($dices, 5);
        }
        if ($category === 'sixs') {
            return $this->getOneTwoThreeFourFiveSix($dices, 6);
        }
        if ($category === 'small_straight' && $dices !== [1,2,3,4,5]) {
            return 0;
        }
        if ($category === 'large_straight' && $dices !== [2,3,4,5,6]) {
            return 0;
        }
        if ($category === 'full_house') {
            sort($occurences);
            if ($occurences !== [2,3]) {
                return 0;
            }
        }
        if ($category === 'four_kind') {
            return $this->threeFourKind($occurences, 4);
        }
        if ($category === 'three_kind') {
            return $this->threeFourKind($occurences, 3);
        }
        if ($category === 'two_pairs') {
            $doubles = $this->getDoubles($occurences);

            if (\count($doubles) !== 2) {
                return 0;
            }

            $diceValues = \array_keys($doubles);
            $diceValuesAsInt = \array_map(fn ($k) => \intval($k), $diceValues);

            return \array_sum($diceValuesAsInt) * 2;
        }
        if ($category === 'pair') {
            $doubles = $this->getDoubles($occurences);

            if (\count($doubles) === 0) {
                return 0;
            }

            $diceValues = \array_keys($occurences);
            $diceValuesAsInt = \array_map(fn ($k) => \intval($k), $diceValues);

            \sort($diceValuesAsInt);
            $biggestDiceValues = \array_reverse($diceValuesAsInt);

            return $biggestDiceValues[0] * 2;
        }


        return \array_sum($dices);
    }

    private function getOneTwoThreeFourFiveSix(array $dices, $number): int
    {
        return \array_sum(\array_filter($dices, fn($dice) => $dice === $number));
    }

    private function threeFourKind(array $occurences, $c): int|float
    {
        $f = \array_filter($occurences, fn($occurence) => $occurence === $c);
        if (\count($f) === 0) {
            return 0;
        }

        return \intval(\array_keys($f)[0]) * $c;
    }

    private function getDoubles(array $occurences): array
    {
        return \array_filter($occurences, fn($occurence) => $occurence >= 2);
    }
}
