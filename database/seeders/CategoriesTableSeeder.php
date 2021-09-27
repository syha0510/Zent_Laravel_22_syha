<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            'Điện thoại','Máy tính','Phần cứng'
        ];
        DB::table('categories')->truncate();
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }
    }
}
