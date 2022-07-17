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
            'logo'=>'/uploads/brands/logoes/aerosoft.jpg',
        ]);

        $brand = Brand::create([
            'title' => 'DWD',
            'logo'=>'/uploads/brands/logoes/dwd.jpeg',

        ]);

        $brand = Brand::create([
            'title' => 'Wofa Soft',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',

        ]);

        $brand = Brand::create([
            'title' => 'Bata',
            'logo'=>'/uploads/brands/logoes/bata.jpg',
        ]);


        $brand = Brand::create([
            'title' => 'Servis',
            'logo'=>'/uploads/brands/logoes/servis.png',
        ]);


        $brand = Brand::create([
            'title' => 'Wej',
            'logo'=>'/uploads/brands/logoes/wej.png',
        ]);

        $brand = Brand::create([
            'title' => 'Xara Soft',
            'logo'=>'/uploads/brands/logoes/xara-soft.png',
        ]);


        $brand = Brand::create([
            'title' => 'Star Soft',
            'logo'=>'/uploads/brands/logoes/star-soft.jpg',
        ]);


        $brand = Brand::create([
            'title' => 'Brightox',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);

        $brand = Brand::create([
            'title' => 'Urban Sole',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);
        $brand = Brand::create([
            'title' => 'Aerofit',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);
        $brand = Brand::create([
            'title' => 'Special Soft',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);
        $brand = Brand::create([
            'title' => 'True Soft',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);

        $brand = Brand::create([
            'title' => 'Zee Soft',
            // 'logo'=>'/uploads/brands/logoes/dwd.jpeg',
        ]);

        $brand = Brand::create([
            'title' => 'Cat',
            'logo'=>'/uploads/brands/logoes/cat.jpeg',
        ]);

        $brand = Brand::create([
            'title' => 'Clark',
            'logo'=>'/uploads/brands/logoes/clark.jpg',
        ]);


    }
}
