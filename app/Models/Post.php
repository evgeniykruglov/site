<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class Post extends Model
{
    public function user() 
    {
	return $this->hasOne(User::class,'id','user_id');
    }
}
