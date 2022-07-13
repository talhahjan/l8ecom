<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Thumbnail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ThumbnailFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thumbnail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



private $images=null;


public function getImages(){
if($this->images)
return $this->images;


$images=file_get_contents('https://fakestoreapi.com/products');
$this->images=json_decode($images,true);
return $this->images;
    
}

    public function definition()
    {
    $this->getImages();

        return [
       'path'=> $this->images[rand(0,19)]['image'],
        ];
    }
}
