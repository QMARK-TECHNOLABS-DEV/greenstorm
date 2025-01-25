<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    use HasFactory;
    protected $table = 'voting';
    public function photograph()
    {
        return $this->belongsTo(Photograph::class,'photo_id','id');
    }
}
