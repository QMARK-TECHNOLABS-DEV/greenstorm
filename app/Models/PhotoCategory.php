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
        return $this->hasMany(Photograph::class,'photo_category','id');
    }
    public function getPhotographsCountAttribute()
    {
        return $this->photographs()->count();
    }
    public function getUserPhotographsCountAttribute()
    {
        return $this->photographs()->where('user_id', Auth::id())->count();
    }
    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'competition_category', 'category_id', 'competition_id');
    }
    public static function hasReachedMaxUploadLimit()
    {
        // Get all categories
        $categories = self::all();

        // Initialize a variable to keep track of whether both categories have reached their limit
        $allCategoriesReachedLimit = true;

        // Check each category's upload limit
        foreach ($categories as $category) {
            $uploadCount = $category->userPhotographsCount;
            $maxUploadLimit = $category->max_upload_limit;

            if ($uploadCount < $maxUploadLimit) {
                // If any category hasn't reached its limit, set the flag to false and break out of the loop
                $allCategoriesReachedLimit = false;
                break;
            }
        }

        return $allCategoriesReachedLimit;
    }
}
