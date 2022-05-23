<?php
namespace App;
use App\Menu;
use App\Restaurant;

class FindRestaurants{
    public static function restaurantsThatUseThisMenu ($menu) {
      

        return $matchedRestaurants = Restaurant::where('id', $menu->id)->get();

    }
}