<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    use HasFactory;
    protected $table = 'user_votes';
    protected $fillable = ['user_id', 'photo_id'];

    public function photograph()
    {
        return $this->belongsTo(Photograph::class, 'photo_id', 'id');
    }
}
