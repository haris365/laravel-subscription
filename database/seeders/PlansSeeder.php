<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        if(DB::table('plans')->count() == 0){

            DB::table('plans')->insert([

                [
                    'title' => "Monthly",
                    'slug' => "monthly",
                    'stripe_id' => "price_1LidLALvZJGqEMWYCxSgnqlj",
                    
                ],
                [
                    'title' => "Yearly",
                    'slug' => "yearly",
                    'stripe_id' => "price_1LidLALvZJGqEMWYqzvU9OYm",
                    
                ],               
            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
