<?php

namespace GildedRose\Tests;

use GildedRose\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function test_aged_brie_type_before_sell_in_date_updates_normally()
    {
        $item = GildedRose::type('Aged Brie', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 9);
    }

    public function test_aged_brie_type_on_sell_in_date_updates_normally()
    {
        $item = GildedRose::type('Aged Brie', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -1);
    }

    public function test_aged_brie_type_after_sell_in_date_updates_normally()
    {
        $item = GildedRose::type('Aged Brie', 10, -5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -6);
    }

    public function test_aged_brie_type_before_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }

    public function test_aged_brie_type_on_sell_in_date_near_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 49, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -1);
    }

    public function test_aged_brie_type_on_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -1);
    }

    public function test_aged_brie_type_after_sell_in_date_with_maximum_quality()
    {
        $item = GildedRose::type('Aged Brie', 50, -10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -11);
    }

    public function test_backstage_pass_before_sell_on_date_updates_normally()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, 9);
    }

    public function test_backstage_pass_more_than_ten_days_before_sell_on_date_updates_normally()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 11);
        $item->updateQuality();

        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 10);
    }

    public function test_backstage_pass_updates_by_three_with_five_days_left_to_sell()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sellIn, 4);
    }

    public function test_backstage_pass_drops_to_zero_after_sell_in_date()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -1);
    }

    public function test_backstage_pass_close_to_sell_in_date_with_max_quality()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 9);
    }

    public function test_backstage_pass_very_close_to_sell_in_date_with_max_quality()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, 5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }

    public function test_backstage_pass_quality_zero_after_sell_date()
    {
        $item = GildedRose::type('Backstage passes to a TAFKAL80ETC concert', 50, -5);
        $item->updateQuality();

        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -6);
    }

    public function test_sulfuras_before_sell_in_date()
    {
        $item = GildedRose::type('Sulfuras, Hand of Ragnaros', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 10);
    }

    public function test_sulfuras_on_sell_in_date()
    {
        $item = GildedRose::type('Sulfuras, Hand of Ragnaros', 10, 0);
        $item->updateQuality();

        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 0);
    }

    public function test_sulfuras_after_sell_in_date()
    {
        $item = GildedRose::type('Sulfuras, Hand of Ragnaros', 10, -1);
        $item->updateQuality();

        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, -1);
    }

    public function test_elixir_before_sell_in_date_updates_normally()
    {
        $item = GildedRose::type('Elixir of the Mongoose', 10, 10);
        $item->updateQuality();

        $this->assertEquals($item->quality, 9);
        $this->assertEquals($item->sellIn, 9);
    }

    public function test_dexterity_vest_before_sell_in_date_updates_normally()
    {
        $item = GildedRose::type('+5 Dexterity Vest', 10, 10);
        $item->updateQuality();
        $this->assertEquals($item->quality, 9);
        $this->assertEquals($item->sellIn, 9);
    }
    public function test_dexterity_vest_on_sell_in_date_quality_degrades_twice_as_fast()
    {
        $item = GildedRose::type('+5 Dexterity Vest', 10, 0);
        $item->updateQuality();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, -1);
    }
    
    public function test_dexterity_vest_after_sell_in_date_quality_degrades_twice_as_fast()
    {
        $item = GildedRose::type('+5 Dexterity Vest', 10, -1);
        $item->updateQuality();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, -2);
    }

    // public function test_conjured_before_sell_in_date_updates_normally()
    // {
    //     $item = GildedRose::type('Conjured', 10, 10);
    //     $item->updateQuality();
    //     $this->assertEquals($item->quality, 8);
    //     $this->assertEquals($item->sellIn, 9);
    // }
    // public function test_conjured_does_not_degrade_passed_zero()
    // {
    //     $item = GildedRose::type('Conjured', 0, 10);
    //     $item->updateQuality();
    //     $this->assertEquals($item->quality, 0);
    //     $this->assertEquals($item->sellIn, 9);
    // }
    // public function test_conjured_after_sell_in_date_degrades_twice_as_fast()
    // {
    //     $item = GildedRose::type('Conjured', 10, 0);
    //     $item->updateQuality();
    //     $this->assertEquals($item->quality, 6);
    //     $this->assertEquals($item->sellIn, -1);
    // }
}
