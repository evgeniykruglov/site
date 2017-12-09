<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//public $table = 'comments';
	
    public function comments() 
    {
	return $this->hasMany(Comments::class);
    }
}
