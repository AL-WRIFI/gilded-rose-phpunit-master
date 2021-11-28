<?php

namespace GildedRose;

class GildedRose
{

    public static $lookup = [
        'Aged Brie' =>AgedBrie::class,
        'Backstage passes to a TAFKAL80ETC concert'=>Backstage::class,
        'Sulfuras, Hand of Ragnaros'=>Sulfuras::class,
    ];
    

    public static function type($name, $quality, $sellIn)
    {
        if(array_key_exists($name, self::$lookup))
        {
            return new self::$lookup[$name]($quality, $sellIn);
        }
        return new Item($quality, $sellIn);
    }

   
}
