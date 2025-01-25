<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'photographer_category',
        'is_verified',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
