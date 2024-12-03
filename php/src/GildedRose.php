<?php

declare(strict_types=1);

namespace KataStarter;

final class GildedRose
{
    const ITEM_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const ITEM_BRIE = 'Aged Brie';
    const ITEM_PASSES = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name == self::ITEM_SULFURAS) {
                continue;
            }

            if ($item->name == self::ITEM_BRIE) {
                $this->increaseQuality($item);
            } elseif ($item->name == self::ITEM_PASSES) {
                $this->increaseQuality($item);
                if ($item->sellIn < 11) {
                    $this->increaseQuality($item);
                }
                if ($item->sellIn < 6) {
                    $this->increaseQuality($item);
                }
            } else {
                $this->decreaseQuality($item);
            }

            $this->decreaseSellIn($item);

            if ($item->sellIn < 0) {
                if ($item->name == self::ITEM_BRIE) {
                    $this->increaseQuality($item);
                } elseif ($item->name == self::ITEM_PASSES) {
                    $this->resetQuality($item);
                } else {
                    $this->decreaseQuality($item);
                }
            }
        }
    }

    private function decreaseQuality(Item $item): void
    {
        if ($item->quality > 0) {
            --$item->quality;
        }
    }

    private function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
    }

    private function resetQuality(Item $item): void
    {
        $item->quality = 0;
    }

    private function decreaseSellIn(Item $item): void
    {
        --$item->sellIn;
    }
}
