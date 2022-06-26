<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'title' => 'Aerosoft',
        ]);

        $brand = Brand::create([
            'title' => 'DWD',
        ]);

        $brand = Brand::create([
            'title' => 'Wofa Soft',
        ]);

        $brand = Brand::create([
            'title' => 'Bata',
        ]);


        $brand = Brand::create([
            'title' => 'Service',
        ]);

        $brand = Brand::create([
            'title' => 'Brightox',
        ]);

        $brand = Brand::create([
            'title' => 'Urban Sole',
        ]);
        $brand = Brand::create([
            'title' => 'Aerofit',
        ]);
        $brand = Brand::create([
            'title' => 'Special Soft',
        ]);
        $brand = Brand::create([
            'title' => 'True Soft',
        ]);

        $brand = Brand::create([
            'title' => 'Zee Soft',
        ]);

        $brand = Brand::create([
            'title' => 'CatterPiller',
        ]);

        $brand = Brand::create([
            'title' => 'Clark',
        ]);


    }
}
