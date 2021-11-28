<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const STATUS_CONTINUE = 0;
    const STATUS_END = 1;
    const STATUS_ERROR = 2;


    public static $status_text = [
        self::STATUS_CONTINUE => 'Đang bán',
        self::STATUS_END => 'Hết hàng',
        self::STATUS_ERROR => 'Dừng bán',
    ];

    public function getSalePriceFormatAttribute()
    {
        return  number_format($this->sale_price,0,'','.').' đ ';
    }

    public function getStatusTextAttribute()
    {
        return self::$status_text[$this->status];
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function category()
    {
        return $this->hasOne(CategoryProduct::class,'id','category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function scopeStatus($query, $request)
    {
        if ($request->has('status')) 
        {
            if($request->get('status') == -1){
                $query->orderBy('created_at','desc');
            }else{
                $query->where('status', $request->status)->orderBy('created_at','desc');
            }
           
        }

    return $query;
    }
    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) 
        {
            if($request->get('category') == -1){
                $query->orderBy('created_at','desc');
            }else{
                $query->where('category_id', $request->category)->orderBy('created_at','desc');
            }
           
        }

    return $query;
    }
    public function scopeBrand($query, $request)
    {
        if ($request->has('brand')) 
        {
            if($request->get('brand') == -1){
                $query->orderBy('created_at','desc');
            }else{
                $query->where('brand_id', $request->brand)->orderBy('created_at','desc');
            }
           
        }

    return $query;
    }
}
