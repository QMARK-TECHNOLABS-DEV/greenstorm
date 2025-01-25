<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;
    protected $table = 'validation';
    protected $fillable = [
        'photo_id',
        'stage_id',
        'reviewer_id',
        'grade',
    ];
    // public function photo()
    // {
    //     return $this->belongsTo(Photograph::class, 'photo_id','id');
    // }
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function photograph()
    {
        return $this->belongsTo(Photograph::class, 'photo_id', 'id');
    }

    public function reviewer(Type $var = null)
    {
        return $this->belongsTo(User::class, 'reviewer_id', 'id');
    }
}
