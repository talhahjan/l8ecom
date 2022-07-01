<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Thumbnail;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
       'path'=>$this->faker->imageUrl(400, 300, 'fashion',true, 'shoes', false),
        ];
    }
}
