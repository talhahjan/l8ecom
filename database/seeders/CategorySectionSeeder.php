<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Section;
use App\Models\Category;
class CategorySectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionTitle='Mens';
        $section=Section::create([
            'title'=>$sectionTitle,
            'slug'=>Str::Slug($sectionTitle),
        ]);
       $categoryTitle='Shoes';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);

        $categoryTitle='Slipers';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);


        $categoryTitle='Canvas';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);


        $categoryTitle='Office Shoes';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);

        $categoryTitle='Casual';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);

        $categoryTitle='Flip-flops';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);


        $categoryTitle='Sliders';
        $category = Category::create([
            'title' => $categoryTitle,
            'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
             'section_id'=>$section->id,
        ]);
    
     // Section ladies Started

       $sectionTitle='Womens';
$section=Section::create([
    'title'=>$sectionTitle,
    'slug'=>Str::Slug($sectionTitle),
]);
$categoryTitle='Shoes';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);

$categoryTitle='Pumps';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);



$categoryTitle='Kulapuri';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);


$categoryTitle='Kusas';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);


$categoryTitle='Sandals';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);



$categoryTitle='Casual';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);


$categoryTitle='Wedges';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);


$categoryTitle='Bridals';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);


$categoryTitle='Highy Heels';
$category = Category::create([
    'title' => $categoryTitle,
    'slug'=>Str::Slug($sectionTitle.' '.$categoryTitle),
     'section_id'=>$section->id,
]);



    }

}
