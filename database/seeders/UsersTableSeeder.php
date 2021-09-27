<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        for ($i=1; $i <=5 ; $i++) { 
            DB::table('users')->insert(
                [
                    'name'=>"Admin $i",
                    'email'=>"admin$i@gmail.com",
                    'password'=>bcrypt("123456"),
                    'status'=>'1'

                ]
                );
        }

        
       
    }
    
}
