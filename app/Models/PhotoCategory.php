<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PhotoCategory extends Model
{
    use HasFactory;

    public function photographs()
    {
        return $this->hasMany(Photograph::class, 'photo_category', 'id');
    }

    public function getPhotographsCountAttribute()
    {
        return $this->photographs()->count();
    }

    public function getUserPhotographsCountAttribute()
    {
        return 0; // Disable counting user uploads
    }

    public function competitions()
    {
        return $this->belongsToMany(
            Competition::class,
            'competition_category',
            'category_id',
            'competition_id'
        );
    }

    public static function hasReachedMaxUploadLimit()
    {
        return false; // Allow unlimited uploads
    }
}
