<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'John',
            'email' => 'admin5@emis.edu.ge',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'remember_token' => Hash::make(Str::random(10))
        ]); */

        User::factory(2)->create();
       

    }
}
