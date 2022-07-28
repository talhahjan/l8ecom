<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Section;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Auth;
class ApiController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


      
      function fetchProduct(Request  $request){
      $product=Product::with('thumbnails','categories')->where('slug', $request->slug)->firstOrFail(); 
      return response()->json($product);
     }
 


    function fetchCategory(Request $request){
define('SLUG', $request->category);
$products=Product::with(['thumbnails','categories'=> function($query){
  $query->with('section');
}])->whereHas('categories', function ($query) {
  $query->where('slug', SLUG);
})->paginate(10);

return response()->json(
$products
 );
}

    
  function fetchSection(Request $request){
  define('SLUG', $request->section);
$products=Product::with(['thumbnails','categories'=> function($query){
  $query->with('section');
}])->whereHas('categories', function ($query) {
  $query->whereHas('section', function($query){
    $query->where('slug',SLUG);
  });
})->paginate(10);
    
    return response()->json(
    $products
     );
    }
    
    

public function getLatestProduct(){
    $products=Product::with(['thumbnails','categories'=> function($query){
      $query->with('section');
    }])->orderBy('created_at', 'DESC')->take(10)->get();
    
    return $products;
    
    }
    
    


    public function getFeaturedProduct(){
      $products=Product::with(['thumbnails','categories'=> function($query){
        $query->with('section');
      }])->where('featured',1)->orderBy('created_at', 'DESC')->take(10)->get();
      
      return $products;
      
      }
    



     function fetchSections(){
     $sections=SECTION::with('categories')->get();
     
    return $sections;
    }

        



 function fetchBrands(Request $request){
 $data = Brand::get();
 return $data;
     }



     function BrandsWithLogoes($limit=10){

      $brands=Brand::whereNotNull('logo')->take($limit)->get();
      return $brands;
      }


          function search(Request $request){
            $data = Product::get();

   return $data;
     }
    



}
