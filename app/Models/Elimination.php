<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elimination extends Model
{
    use HasFactory;
    protected $table="elimination";

    public function category()
    {
        return $this->belongsTo(PhotoCategory::class, 'category_id', 'id');
    }
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id', 'id');
    }
}
