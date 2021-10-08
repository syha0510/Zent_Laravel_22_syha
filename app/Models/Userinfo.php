<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    
    use HasFactory;
    protected $table='users_info';
    protected $fillable = [
      'user_id',
      'address',
      'phone',
    ];

    public function user()
    {
      return $this->belongsTo( User::class );  
    }


}
