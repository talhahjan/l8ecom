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

    function register(Request $request){
//      dump($request->all());
$validator = Validator::make($request->all(),[
'first_name' => ['required', 'string', 'max:255'],
'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
'password' => ['required', 'string', 'min:8', 'confirmed'],
]);

if($validator->fails())
return response()->json([
  'status'=>201,
  'validation_errors'=>$validator->messages()
],201);




        $user =User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($user) {
           $profile= Profile::create([
          'user_id'=>$user->id,
          'first_name'=>$request->first_name,
          'last_name'=>$request->last_name
      ]);
        
            $token =$user->createToken('token-'.$user->email)->plainTextToken;
            return response()->json([
             'status'=>200,
             'status_message'=>'ok',
             'user'=>[
             'id'=>$user->id,
             'first_name'=>$profile->first_name,
             'last_name'=>$profile->last_name,
             'email'=>$user->email,
             'avatar'=>$profile->avatar,
            ],
              'token'=>$token,
              'message'=>'Register Successfully'
            ], 200);
        }
    }

    function login(Request $request){
$validator = Validator::make($request->all(),[
  'email' => ['required', 'string', 'email'],
  'password' => ['required', 'string'],
  ]);
  
  if($validator->fails())
  return response()->json([
    'status'=>201,
    'validation_errors'=>$validator->messages()
  ],201);




      
        if (!Auth::attempt($request->only('email','password'))) {
            return response([
            'message'=>'The Provided credentails are incorrect'
          ], 201);
        }
        else{
       
          $user=Auth::user();

       $userInfo=User::where('id', $user->id)->with('profile','role')->first();
       $token= $user->createToken('token')->plainTextToken;
       return response()->json([
       'status'=>200,
       'status_message'=>'ok',
        'user'=>[
        'id'=>$userInfo->id,
        'first_name'=>$userInfo->profile->first_name,
        'last_name'=>$userInfo->profile->last_name,
        'email'=>$userInfo->email,
        'avatar'=>asset($userInfo->profile->avatar),
       ],
        'status'=> 201,
        'token'=>$token,
         'message'=>'Login Successfully'
        ]);
      }
      }
      
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
    
    
    public function userFavorites(){
      $userId=auth()->user()['id'];
   
$cart=User::with('favorites')->where('id', $userId)->first();
 return response()->json(
 $cart->favorites
  );
    }

    
    public function userCart(Request $request){
      $userId=auth()->user()['id'];
   
      if($userId){
      return response()->json([
        'staus'=>202,
        'message'=>'Please login to view cart',
      ]);
    }

      $cart=User::find($userId)->with('cart')->first();
    
    return response()->json(
    $cart
    );
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
    
function getProfile(){
$userId=auth()->user()['id'];
$userInfo=User::where('id', $userId)->with('profile')->first();
  return $userInfo;
}


public function logout() {
auth()->user()->currentAccessToken()->delete();
  return response([
    'status'=>200,
  'message'=>'Successfuly Logged Out !!',
]);
}

function updateProfile(Request $request){
  
  
  $userId=auth()->user()['id'];


  $updateProfile=Profile::where('user_id',1)->update([
    'first_name'=>$request->first_name,
    'last_name'=>$request->last_name,
     'phone'=>$request->mobile,
    'country'=>$request->country,
    'state'=>$request->state,
    'address'=>$request->address,
  ]);

  return response()->json(
  $request
  );
  }
  


}
