<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Thumbnail;
use App\Models\Product;
use App\Models\Category;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           AdminUserProfile::class,
           BrandSeeder::class,
          CategorySectionSeeder::class,
              ]);

// The Perfect way to create fake data 
              Category::factory()->count(20)->
              has(Product::factory()->count(rand(50,100))->has(
                Thumbnail::factory()
                        ->count(rand(1,6))
                        ->state(function (array $attributes, Product $product) {
                            return ['product_id' => $product->id];
                        })
              ))->create();

                    }}
    