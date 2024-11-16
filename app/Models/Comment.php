<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','user_id','content'];

    public function user(){  //propertise
        return $this->belongsTo(user::class);
    } 

    public function posts(){  //propertise
        return $this->belongsTo(Post::class);
    }
}
