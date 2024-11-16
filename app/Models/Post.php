<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'image_path', 'user_id'];


    public function user(){  //propertise
        return $this->belongsTo(user::class);
    }
    public function comments(){  //propertise
        return $this->hasMany(Comment::class);
    }
}
