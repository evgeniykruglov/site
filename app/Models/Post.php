<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    public function user() 
    {
	return $this->hasOne(User::class,'id','user_id');
    }
}
