<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'period',
        'prizes_described',
        'vote_date',
        'status',
        'is_published_for_vote',
        'vote_published_date',
        'vote_last_published_date',
        'vote_publish_count',
        'prize_announcement_date'
    ];
    public function categories()
    {
        return $this->belongsToMany(PhotoCategory::class, 'competition_category','competition_id', 'category_id');
    }
    public function stages()  {
        return $this->hasMany(Stage::class, 'competition_id')->latest('created_at');
    }
    public function stages_for_reviewers()  {
        return $this->hasMany(Stage::class, 'competition_id')->where('status',true)->latest('created_at');
    }
}
