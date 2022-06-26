<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AdminUserProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $role = Role::create([
            'name' => 'superadmin',
            'description' => 'Super Admin Role',
        ]);
        $user = User::create([
            'email' => 'talhah.jan@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id,
        ]);
        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Khalid',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'avatar' => asset('uploads/users/avatars/superadmin.jpg'),
            'slug' => 'muhammad-khalid',
        ]);


        $role = Role::create([
            'name' => 'admin',
            'description' => 'Admin Role',
        ]);
        $user = User::create([
            'email' => 'admin@app.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id,

        ]);
        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Talhah',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'slug' => 'muhammad-talhah',
            'avatar' => asset('uploads/users/avatars/admin.jpg'),
        ]);



        $role = Role::create([
            'name' => 'dealer',
            'description' => 'Dealer Role',
        ]);
        $user = User::create([
            'email' => 'dealer@app.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id,

        ]);

        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Khalid',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'slug' => 'muhammad-khalid-dealer',
            'avatar' => asset('uploads/users/avatars/superadmin.jpg'),

        ]);


        $role = Role::create([
            'name' => 'customer',
            'description' => 'Customer Role',
        ]);
        $user = User::create([
            'email' => 'customer@app.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id,

        ]);

        $profile = Profile::create([
            'first_name' => 'Muhammad',
            'last_name' => 'Yusuf',
            'phone' => '+923212257340',
            'address' => 'Address Address Address Address Address Address Address Address ',
            'user_id' => $user->id,
            'slug' => 'muhammad-yusuf',
            'avatar' => asset('uploads/users/avatars/customer.jpg'),

        ]);




    }
}
