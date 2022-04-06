<?php

namespace App\Updaters;

use App\Item;

class ItemUpdater
{
    protected $item;

    function __construct($item)
    {
        $this->item = $item;
    }

    // incrémenter une qualité
    protected function increaseQuality()
    {
        if ($this->item->quality < 50) {
            $this->item->quality = $this->item->quality + 1;
        }
    }

    // décrémenter une qualité
    protected function decreaseQuality()
    {
        if ($this->item->quality > 0) {
            $this->item->quality = $this->item->quality - 1;
        }
    }

    // Modifier une qualité
    public function updateQuality()
    {
        $this->decreaseQuality();
    }

    // Modifier la date
    public function updateSellIn()
    {
        $this->item->sell_in = $this->item->sell_in - 1;
    }

    // Modidier
    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
        if ($this->item->sell_in < 0) {
            $this->updateExpired();
        }
    }

    // Modification expirée
    protected function updateExpired()
    {
        $this->decreaseQuality();
    }

    public function __toString()
    {
        return "{$this->item}";
    }

    public static function resolve(Item $item): bool
    {
        return $item->name == "";
    }
}
