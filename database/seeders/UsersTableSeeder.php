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
        DB::table('users_info')->truncate();

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

        for ($i=1; $i <=5 ; $i++) { 
            DB::table('users_info')->insert([
                'user_id'=> $i,
                'address' => 'Hanoi',
                'phone'=>'087979765'
            ]);
        }
        
        
        
        
       
    }
    
}
