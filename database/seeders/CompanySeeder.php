<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'name' => 'flipkart',
            'email' => 'flipkart@gmail.com',
            'logo' =>'/',
            'website'=>'www.flipkart.com',
            
        ]);
    }
}
