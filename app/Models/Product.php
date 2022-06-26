<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $guarded = [];

    public function thumbnails()
    {
        return $this->hasMany('App\Models\Thumbnail');
    }


    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product');
    }




    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    

}
