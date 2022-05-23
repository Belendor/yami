<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    
    public function testaurantMenus()
    {
        return $this->hasMany('App\Menu', 'menu_id', 'id');
    }

}
