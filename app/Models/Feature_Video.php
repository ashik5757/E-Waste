<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature_Video extends Model
{
    use HasFactory;

    protected $table = 'features_videos';


    protected $fillable = [
        'feature_id',
        'video',
        'size',
        'mime',
    ];



    public function feature() {
        return $this->belongsTo(Feature::class);
    }
}
