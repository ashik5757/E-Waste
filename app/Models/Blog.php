<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'details',
        'category',
    ];



    public function user() {
        return $this->belongsTo(User::class);
    }

    public function blog_image() {
        return $this->hasMany(Blog_Image::class);
    }

}
