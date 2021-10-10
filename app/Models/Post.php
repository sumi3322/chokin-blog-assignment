<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','user_id','status','category_id','category','user'];

    public function comments(){
        return $this->hasMany(PostComment::class);
    }
}
