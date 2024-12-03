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
            if ($item->name == self::ITEM_BRIE) {
                if ($item->quality < 50) {
                    $this->increaseQuality($item);
                    if ($item->name == self::ITEM_PASSES) {
                        if ($item->sellIn < 11) {
                            if ($item->quality < 50) {
                                $this->increaseQuality($item);
                            }
                        }
                        if ($item->sellIn < 6) {
                            if ($item->quality < 50) {
                                $this->increaseQuality($item);
                            }
                        }
                    }
                }
            } elseif ($item->name == self::ITEM_PASSES) {
                if ($item->quality < 50) {
                    $this->increaseQuality($item);
                    if ($item->name == self::ITEM_PASSES) {
                        if ($item->sellIn < 11) {
                            if ($item->quality < 50) {
                                $this->increaseQuality($item);
                            }
                        }
                        if ($item->sellIn < 6) {
                            if ($item->quality < 50) {
                                $this->increaseQuality($item);
                            }
                        }
                    }
                }
            } else {
                if ($item->quality > 0) {
                    if ($item->name != self::ITEM_SULFURAS) {
                        $this->decreaseQuality($item);
                    }
                }
            }

            if ($item->name != self::ITEM_SULFURAS) {
                $item->sellIn = $item->sellIn - 1;
            }

            if ($item->sellIn < 0) {
                if ($item->name == self::ITEM_BRIE) {
                    if ($item->quality < 50) {
                        $this->increaseQuality($item);
                    }
                } else {
                    if ($item->name == self::ITEM_PASSES) {
                        $this->resetQuality($item);
                    } else {
                        if ($item->quality > 0 && $item->name != self::ITEM_SULFURAS) {
                            $this->decreaseQuality($item);
                        }
                    }
                }
            }
        }
    }

    private function decreaseQuality(Item $item): void
    {
        $item->quality = $item->quality - 1;
    }

    private function increaseQuality(Item $item): void
    {
        $item->quality = $item->quality + 1;
    }

    private function resetQuality(Item $item): void
    {
        $item->quality = $item->quality - $item->quality;
    }
}
