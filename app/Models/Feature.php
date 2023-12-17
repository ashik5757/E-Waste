<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'details',
        'category',
        'thumbnail',
    ];



    public function user() {
        return $this->belongsTo(User::class);
    }

    public function feature_videos() {
        return $this->hasMany(Feature_Video::class);
    }
}
