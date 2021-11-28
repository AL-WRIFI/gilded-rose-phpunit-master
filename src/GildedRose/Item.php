<?php

namespace GildedRose;

class Item
{
    public $sellIn;
    public $quality;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function updateQuality()
    {
        $this->quality -=1;          
        $this->sellIn -=1;
  
       if($this->sellIn <=0){
     
        $this->quality -=1; 
       }

    }
}
