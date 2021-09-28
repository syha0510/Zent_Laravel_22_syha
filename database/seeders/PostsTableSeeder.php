<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        for ($i=1; $i <=10 ; $i++) { 
            DB::table('posts')->insert(
                [
                    'title'=>"Hello $i",
                    'slug'=>"hello",
                    'content'=>"ok ",
                    'user_created_id'=>1,
                    'user_updated_id'=>1,
                    'category_id'=>1,
                    'created_at'=>Carbon::now(),
                    

                ]
                );
        }
    }
}
