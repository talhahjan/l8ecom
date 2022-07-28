<?php






namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UserController extends Controller
{
    public function profile(){
    $userId=auth()->user()['id'];
    $userInfo=User::where('id', $userId)->with('profile')->first();
    return response()->json($userInfo);

    }



    public function updateProfile(Request $request){
    
  $userId=auth()->user()['id'];
  $updateProfile=Profile::where('user_id',$userId)->update([
    'first_name'=>$request->first_name,
    'last_name'=>$request->last_name,
     'phone'=>$request->mobile,
    'country'=>$request->country,
    'state'=>$request->state,
    'address'=>$request->address,
  ]);


if($updateProfile)
    return response()->json([
        'status'=>201,
        'statusText'=>'Error Updating Profile'
    ]);


return response()->json([
    'status'=>200,
    'statusText'=>'ok'
]);



    }




    public function favorites(){
        $userId=auth()->user()['id'];
     
  $cart=User::with('favorites')->where('id', $userId)->first();
   return response()->json(
   $cart->favorites
    );
      }
  
      
      public function Cart(Request $request){
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




}
