<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Reno Paslah', 'email' => 'reno.nilam@gmail.com', 'password' => Hash::make('12345678'), 'status' => '1'],
            ['id' => 2, 'name' => 'Alexander', 'email' => 'alex@gmail.com', 'password' => Hash::make('12345678'), 'status' => '1'],
        ]);
        
        // Role
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'administrator', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'employee', 'guard_name' => 'web'],
        ]);

        // User has role
        DB::table('model_has_roles')->insert([
            ['role_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => '1',],
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => '2',],
        ]);
    }
}
