<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "larasoft.io",
            'email' => "hello@larasoft.io",
            'password' => bcrypt('12345678'),
        ]);
    }
}
