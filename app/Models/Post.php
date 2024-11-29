<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //images 
    public function images(){
        return $this->hasMany(PostImage::class);
    }

    //city
    public function city(){
        return $this->belongsTo(City::class);
    }

    //category
    public function category(){
        return $this->belongsTo(Category::class);
    }


}
