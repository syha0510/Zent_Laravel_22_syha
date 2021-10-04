<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    use HasFactory;
    protected $table= 'posts';
    public $tỉmestamps=true;
    const CREATED_AT='created_at';
    const UPDATED_AT='updated_at';
    const STATUS_HIDE = 0;
    const STATUS_SHOW = 1;

    public static $status_text = [
        self::STATUS_HIDE => 'Ẩn',
        self::STATUS_SHOW => 'Hiển Thị'
    ];

    protected $statusArr=[
        0=>'Ẩn',
        1=>'Hiển thị',
            
    ];
    protected $statusColor=[
        0=>'danger',
        1=>'success',
          
    ];

    public function getStatusTextAttribute(){
        return '<span style="padding:5px;font-size:15px;" class="badge badge-' . $this->statusColor[$this->status] .'">' . $this->statusArr[$this->status] . '<span>';   
     }


     public function user()
     {
         return $this->belongsTo( User::class );
     }

    // // public function getStatusTextAttribute(){
    // //     return self::$status_text[$this->status];
    // // }

    // // public function getStatusListAttribute(){
    // //     if($this->status==1){
    // //         return 'Hiển thị';
    // //     }
    // //     else{
    // //         return 'Ẩn';
    // //     }

    // }

    // public function setSlugAttribute($title)
    // {
    //     $this->attributes['slug'] = Str::slug($title);
    // }

    public function setTitleAttribute($title)
    {
        $this->attributes['title']=$title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function userUpdate()
    {
        return $this->belongsTo( User::class ,'user_updated_id'); 
    }

    public function category()
    {
        return $this->belongsTo( Category::class ,'category_id'); 
    }

    public function tags()
    {
        return $this->belongsToMany( Tag::class ); 
    }

    
}
