<?php

namespace App;

class ItemClassifier
{
    public function categorize($item)
    {
        $updaters = scandir(__DIR__ . "/Updaters");
        foreach ($updaters as $updater) {
            if ($updater::resolve($item) === true) {
                $myItem = $updater;
            };
        }
        return $myItem;
    }
}

  // if ($item->name == 'Sulfuras, Hand of Ragnaros'){
        //     $myItem = new SulfurasUpdater($item);
        // } else {
        //     if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
        //         $myItem = new BackstageUpdater($item);
        //     } else {
        //         if ($item->name == 'Aged Brie') {
        //             $myItem = new AgedBrieUpdater($item);
        //         } else {
        //             if ($item->name == 'Conjured Mana Cake') {
        //                 $myItem = new ConjuredItemUpdater($item);
        //             } else {
        //                 $myItem = new ItemUpdater($item);
        //             }
        //         }
        //     }
        // }
        // return $myItem;