<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Image extends Model
{
    use HasFactory;
    protected $table = 'blog_images';


    protected $fillable = [
        'blog_id',
        'image',
        'size',
        'mime',
    ];



    public function blog() {
        return $this->belongsTo(Blog::class);
    }


}