<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=[
            'Iphone','IOS', 'Android','Samsung'
        ];
            DB::table('tags')->truncate();
        foreach($tags as $tag){
            DB::table('tags')->insert([
                'name'=>$tag,
                'slug'=>Str::slug($tag),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }

    }
}
