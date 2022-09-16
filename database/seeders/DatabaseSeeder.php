<?php

namespace Database\Seeders;

use Database\seeders\UsersSeeder;
use Database\seeders\PlansSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();
        $seeders = array ('PlansSeeder', 'UsersSeeder');

        foreach ($seeders as $seeder)
        { 
           $this->call($seeder);
        }
    }
}
