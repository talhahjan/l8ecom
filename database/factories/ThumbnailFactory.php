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
    public function definition()
    {
$categories=['shoes','fashion'];


        $url = "https://api.lorem.space/image/".$categories[rand(0,1)]."?w=400&h=500";
        $file = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);

$saveAs= 'uploads/products/thumbnails/'.Str::slug($this->faker->unique->sentence(3)).'.jpg';
                file_put_contents($saveAs, $file) ;               
        return [
       'path'=> $saveAs,
        ];
    }
}
