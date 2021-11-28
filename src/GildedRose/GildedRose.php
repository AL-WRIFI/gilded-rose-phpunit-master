<?php

namespace GildedRose;

class GildedRose
{

    public $name = '';
    public $quality = '';
    public $sellIn = '';


    public static $lookup = [
        'Aged Brie' =>AgedBrie::class,
        'Backstage passes to a TAFKAL80ETC concert'=>Backstage::class,
        'Sulfuras, Hand of Ragnaros'=>Sulfuras::class,
    ];
    
    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function type($name, $quality, $sellIn)
    {
        if(array_key_exists($name, self::$lookup))
        {
            return new self::$lookup[$name]($quality, $sellIn);
        }
        return new static($name, $quality, $sellIn);
    }

    public function updateQuality()
    {
          
        

        
        switch($this->name){
        default:
              $this->quality -=1;          
              $this->sellIn -=1;
        
             if($this->sellIn <=0){
           
              $this->quality -=1; 

               }
            
            break;

        }

    }
}
