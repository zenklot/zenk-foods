<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_user' => 'Gozenx',
            'email' => 'gozenx77@gmail.com',
            'password' => '123123',
            'jenis_kelamin' => 'L',
            'no_hp' => '08988681558',
        ]);
        // User::factory(5)->create();
        Menu::factory(20)->create();
        $this->call([CreateAdminUserSeeder::class]);
    }
}
