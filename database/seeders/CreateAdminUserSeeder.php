<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $user = User::create([
        //     'nama_user' => 'Admin',
        //     'email' => 'gozenx77@gmail.com',
        //     'password' => '123123',
        //     'kota' => 'Ciamis'
        // ]);

        // $role = Role::create(['name' => 'admin']);
     
        $permissions = Permission::pluck('id','id');
        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
