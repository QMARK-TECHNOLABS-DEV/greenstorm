<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Stage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','category_reviewers'];
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
    public function judges_juries()
    {
        return $this->belongsToMany(User::class, 'stage_reviewers', 'stage_id', 'user_id');
    }
    public function scopeFilterByReviewer($query, $reviewer)
    {
        return $query->where('reviewer_id', $reviewer);
    }
    public function photos()
    {
        return $this->belongsToMany(Photograph::class, 'elimination', 'stage_id', 'photo_id')
            ->withPivot('reviewer_id', 'eliminate')
            ->withTimestamps();
    }

    // public function validation_photos()
    // {
    //     return $this->belongsTo(Photograph::class, 'validation', 'stage_id', 'photo_id')
    //         ->withTimestamps();
    // }
    public function photosForReviewer($perPage=24, $page=1)
    {
        return $this->belongsToMany(Photograph::class, 'elimination', 'stage_id', 'photo_id')
            ->wherePivot('reviewer_id', Auth::user()->id)
            ->wherePivot('eliminate', null)
            ->withPivot('reviewer_id', 'eliminate')
            ->withTimestamps()
            ->paginate($perPage, ['*'], 'page', $page);
    }
    // public function photosForReviewerInValidation($validated=false)
    // {
    //     $query = $this->belongsToMany(Photograph::class, 'validation', 'stage_id', 'photo_id')
    //         ->wherePivot('reviewer_id', Auth::user()->id)
    //         ->withPivot('reviewer_id', 'grade')
    //         ->withTimestamps();
    //     $gradeOperator = $validated ? '>' : '=';
    //     $query->wherePivot('grade', $gradeOperator, 0);

    //     return $query;
    // }
    public function photosForReviewerInValidation($validated=false)
    {
        $query = $this->belongsToMany(Photograph::class, 'validation', 'stage_id', 'photo_id')
                        ->wherePivot('reviewer_id', Auth::user()->id)
                        ->withPivot('reviewer_id', 'grade')
                        ->withTimestamps();
        // $gradeOperator = $validated ? '>' : '=';
        // $query->wherePivot('grade', $gradeOperator, 0);
        return $query;
    }

    public function eliminatedPhotosForReviewer($perPage=24, $page=1)
    {
        return $this->belongsToMany(Photograph::class, 'elimination', 'stage_id', 'photo_id')
            ->wherePivot('reviewer_id', Auth::user()->id)
            ->wherePivot('eliminate', true)
            ->withPivot('reviewer_id', 'eliminate')
            ->withTimestamps()
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function promotedPhotosForReviewer($perPage=24, $page=1)
    {
        return $this->belongsToMany(Photograph::class, 'elimination', 'stage_id', 'photo_id')
            ->wherePivot('reviewer_id', Auth::user()->id)
            ->wherePivot('eliminate', false)
            ->withPivot('reviewer_id', 'eliminate')
            ->withTimestamps()
            ->paginate($perPage, ['*'], 'page', $page);
    }
    // public function validations()
    // {
    //     return $this->belongsToMany(Photograph::class, 'validation', 'stage_id', 'photo_id')
    //         ->withPivot('reviewer_id', 'grade')
    //         ->withTimestamps();
    // }
    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
    public function photos_val()
    {
        if ($this->type === 'validation') {
            return $this->hasManyThrough(Photograph::class, Validation::class, 'stage_id', 'id', 'id', 'photo_id');
        }
        // Handle other types of stages if needed
    }
}
