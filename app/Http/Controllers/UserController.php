<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'password' => 'required|string|min:8|confirmed',
            'slug' => 'required|unique:profiles|min:5|max:100',
            'phone' => '|numeric',
            'status' => 'required|numeric|max:1',
            'role' => 'required|numeric|max:3',
            'avatar' => 'mimes:jpeg,bmp,png',
        ]);



        if (isset($request->avatar)) {
            $extension = "." . $request->avatar->getClientOriginalExtension();
            $name = $request->slug;
            $name = $name . $extension;
            $path = $request->avatar->storeAs('users/avatars/', $name, 'local');
        }




        $user = User::create([
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role_id' => $request->role,
        ]);




        $user = Profile::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'slug' => $request->slug,
            'avatar' =>  isset($path) ?  'uploads/' . $path : 'assets/img/default-avatar.png',
            'user_id' => $user->id
        ]);




        if ($user && $user) {
            return back()->with('message', 'One  Account has been Added');
        } else {
            return back()->with('message', 'Error  Adding user Into The Database ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {

        if (isset($request->avatar)) {
            @unlink($user->profile->avatar);
            $extension = "." . $request->avatar->getClientOriginalExtension();
            $name = $request->slug;
            $newName = $name . $extension;
            $path = $request->avatar->storeAs('users/avatars/', $newName, 'local');
        }




        $updateUser = User::where("id", $user->id)->update([
            'role_id' => $request->role,
            'email' => $request->email,
            'password' => isset($request->password) ? bcrypt($request->password) : $user->password,

        ]);

        $updateProfile = Profile::where("id", $user->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'slug' => $request->slug,
            'phone' => $request->phone,
            'status' => $request->status,
            'address' => $request->address,
            'avatar' => isset($request->avatar) ? 'uploads/' . $path : $user->profile->avatar,
        ]);


        if ($updateUser && $updateProfile) {
            return back()->with('message', 'user User has been updated successfully');
        } else {
            return back()->with('message', 'error updating user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $res = Profile::where('user_id', $request->record_id)->update(['status' => $request->currentstatus == 1 ? 0 : 1]);
        $obj = array();
        $obj['msg'] = 'Error Updating Record';
        $obj['type'] = 'danger';

        if ($res) {

            $obj['msg'] = 'Record has been Updated successfully';
            $obj['type'] = 'success';
        }

        return $obj;
    }

    public function destroy(Request $request)
    {

        //  $res=User::where('id', $request->record_id)->delete();
        // $res2=Profile::where('id', $request->section_id)->delete();
        $res = true;
        $res2 = true;

        $obj = array();
        $obj['msg'] = 'Error deleting Record';
        $obj['type'] = 'danger';

        if ($res) {
            $obj['msg'] = 'Record has been deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }
}
