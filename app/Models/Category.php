<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table= 'categories';
    use HasFactory;
    use SoftDeletes;


    public function setNameAttribute($name)
    {
        $this->attributes['name']=$name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
