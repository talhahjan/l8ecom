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
use Illuminate\Support\facades\Validator;
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
             'provider'=>$profile->provider,
             'provider_id'=>$profile->profiver_id,
             'fullname'=>$profile->first_name.' '.$profile->last_name,
             'first_name'=>$profile->first_name,
             'last_name'=>$profile->last_name,
             'email'=>$user->email,
             'role'=>'customer',
             'avatar'=>is_link($userInfo->profile->avatar) ? $userInfo->profile->avatar: asset($userInfo->profile->avatar),
             'country'=>$profile->country,
            'state'=>$profile->state,
             'city'=>$profile->city
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
       'provider'=>$userInfo->profile->provider,
       'provider_id'=>$userInfo->profile->profiver_id,
        'fullname'=>$userInfo->profile->first_name.' '.$user->profile->last_name,
        'first_name'=>$userInfo->profile->first_name,
        'last_name'=>$userInfo->profile->last_name,
        'email'=>$userInfo->email,
        'role'=>$userInfo->role->name,
        'avatar'=>is_link($userInfo->profile->avatar) ? $userInfo->profile->avatar: asset($userInfo->profile->avatar),
        'country'=>$userInfo->country,
       'state'=>$userInfo->state,
        'city'=>$userInfo->city
       ],
         'token'=>$token,
         'message'=>'Register Successfully'
        ]);
      }
      }
      
      function fetchProduct(Request  $request){
      $product=Product::with('thumbnails','categories')->where('slug', $request->slug)->first();
      if(!$product)
      return response()->json([ 
        'response'=>[  
        'status'=>404,
      'message'=>'Page Not Found'
      ],

      ]);
       $sections=Section::with('categories')->where('status', 1)->get();
    

       
       return response()->json([ 
      'response'=>[  
       'status'=>201,
       'message'=>'ok'
    ],
'data'=>
['product'=>$product,
'sections'=>$sections,]

     ]);
     }
 


    function fetchCategory(Request $request){
         
$categories = category::with(['products' => function($query){
  $query->with(['thumbnails','categories'=> function($query){
    $query->with('section');
  }]); //you may use any condition here or manual select operation
}])->where('slug', $request->category)->first();

if(!$categories)
return  response()->json([
'response'=>[  
  'status'=>404,
  'message'=>'Oops: Page Not Found'
],]);

$obj=['sections'=>ApiController::fetchSections()];
$pbj['products']=array();
$init=0;
foreach($categories->products as $product){
  $init++;
  $obj['products'][$init-1]=$product;
}
$obj['result']['total']=$init;

return response()->json([ 
  'response'=>[ 
  'status'=>201,
  'message'=>'ok'
],
'data'=>
$obj
 ]);
}

  
function fetchSection(Request $request){
         
$section=Section::all();
  $sections = Section::with(['categories' => function($query){
    $query->with(['products'=> function($query){
      $query->with(['thumbnails','categories'=> function($query){
        $query->with('section');
      }]);
    }]); //you may use any condition here or manual select operation
  }])->where('slug', $request->section)->first();
  if(!$sections)
  return  response()->json([
  'response'=>[  
    'status'=>404,
    'message'=>'Oops: Page Not Found'
  ],]);
  
$obj=['sections'=>$section];
  $obj['products']=[];
  $init=0;
 


foreach($sections->categories as $category){
  //count categgories
foreach($category->products as $product){
  //play with products
$init++;
  $obj['products'][$init-1]=$product;
}

}
$obj['result']['total']=count($obj['products']);


  return response()->json([ 
    'response'=>[ 
    'status'=>201,
    'message'=>'ok'
  ],
  'data'=>
  $obj
   ]);
  }
  
    













  private function getlatestProduct(){
    $products=Product::with(['thumbnails','categories'=> function($query){
      $query->with('section');
    }])->orderBy('created_at', 'DESC')->take(10)->get();
    
    return $products;
    
    }
    
    
    
    
    private function getfeaturedProduct(){
      $products=Product::with(['thumbnails','categories'=> function($query){
        $query->with('section');
      }])->where('featured',1)->orderBy('created_at', 'DESC')->take(10)->get();
      
      return $products;
      
      }
    



     function fetchSections(){
     $sections=SECTION::with('categories')->get();
     $obj['sections']=$sections;
     $obj['latest']=$this->getlatestProduct();
     $obj['featured']=$this->getfeaturedProduct();
     $obj['brandsWithLogoes']=$this->BrandsWithLogoes();
    return $obj;
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
    
function getUserInfo(){
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

}
