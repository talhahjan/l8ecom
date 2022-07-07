<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->unique()->sentence(3);
       
     
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description'=>$this->faker->paragraph,
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'discount_price'=>$this->faker->numberBetween($min = 100, $max = 500),
            'discount'=>$this->faker->numberBetween($min = 0, $max = 1),
            'color'=> $this->faker->randomElement(['Black', 'Brown','Dark Brown', 'Blue',' Navy Blue','Purple', 'Pink', 'Dark Pink','White','Gray','Green','Red','Orange','Fown','Mustard']),
            'brand_id'=>$this->faker->numberBetween($min = 1, $max = 10),
            'stock' => '[["35","2"],["36","2"],["37","2"],["38","2"],["39","2"]]',
            'size_range' =>'39-44',
            'origin'=> $this->faker->randomElement(['Pakistan', 'China','Vietname', 'USA',' India']),
            'article'=>$this->faker->numberBetween($min = 100, $max = 1000),
            'warranty'=>'No Warranty',
            'features'=>'[["Good Looking","washable","Shock absorbent"," Designer","Light Weight"," Comfortable"]]',
            'materials'=>'["pu","leather","fabric"]',
            'discount'=>rand(0,1),
            'featured'=>rand(0,1),
            'discount_price'=>$this->faker->numberBetween($min=149, $max=499),
        ];
    }



}
