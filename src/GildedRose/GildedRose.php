<?php

namespace GildedRose;

class GildedRose
{

    public $name = '';
    public $quality = '';
    public $sellIn = '';
    
    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function type($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function updateQuality()
    {
           if($this->name == "Aged Brie" ){
            
            $this->quality +=1;
            $this->sellIn -=1; 
            
            if($this->sellIn <=0){
             
                $this->quality +=1;  
             }

             if($this->quality >50){
             
                $this->quality=50;
             }

             return;
           }elseif($this->name == "Backstage passes to a TAFKAL80ETC concert"){
            
            $this->quality +=1;
               
            if($this->sellIn <=10){
               
                $this->quality +=1;  
             }

            if($this->sellIn <=5){
               
                $this->quality +=1;  
             }

            if($this->quality >50){
               
                $this->quality=50;
             } 


            if($this->sellIn <=0){
               
                $this->quality =0;  
             }

             $this->sellIn -=1;
             
             return;

           }elseif($this->name == "Sulfuras, Hand of Ragnaros"){
               
            return;

           }else{

            $this->quality -=1;          
            $this->sellIn -=1;
            
            if($this->sellIn <=0){
               
                $this->quality -=1;  
             }
              
             return;
           }
    }
}
