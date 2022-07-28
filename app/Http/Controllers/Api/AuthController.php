<?php






namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Auth;

class AuthController extends Controller
{



 public function login(Request $request){
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


 public function logout(Request $request){
    auth()->user()->currentAccessToken()->delete();
    return response([
      'status'=>200,
    'message'=>'Successfuly Logged Out !!',
  ]);
 }


public function register(Request $request){
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
 
}
