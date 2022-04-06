<?php

namespace App\Updaters;

use App\Item;

class BackstageUpdater extends ItemUpdater
{
    public function updateQuality()
    {
        // Quality +1 
        $this->increaseQuality();
        if ($this->item->sell_in < 11) {
            $this->increaseQuality();
        }
        if ($this->item->sell_in < 6) {
            $this->increaseQuality();
        }
    }

    protected function updateExpired()
    {
        $this->item->quality = 0;
    }

    public static function resolve(Item $item): bool
    {
        return $item->name == "Backstage passes to a TAFKAL80ETC concert";
    }
}
