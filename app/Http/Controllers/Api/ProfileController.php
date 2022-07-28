<?php






namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class ProfileController extends Controller
{
    public function index(){
    $userId=auth()->user()['id'];
    $userInfo=User::where('id', $userId)->with('profile')->first();
    return response()->json($userInfo);

    }



    public function update(Request $request){
    
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
}
