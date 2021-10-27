<?php

namespace Database\Seeders;

use App\Constants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Partenertex Admin",
            'email' => "admin@partenertex.com",
            'password' => Hash::make('admin123'),
            'role' => Constants::ROLE_ADMIN,
        ]);
    }
}
