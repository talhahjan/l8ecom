<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function categories(){
        return $this->hasMany('App\Models\Category');
    }
    


    
    function getRouteKeyName(){
        return 'slug';
    }
}
