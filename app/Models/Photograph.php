<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Photograph extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="photographs";
    protected $fillable = [
        'id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function photographer()
    {
        return $this->belongsTo(Photographer::class,'user_id','user_id');
    }

    public static function getTotalPhotoCountForCompetition($competitionId)
    {
        return self::where('competition_id', $competitionId)->count();
    }
    public function voting()
    {
        return $this->hasMany(Voting::class, 'photo_id');
    }
    public function votes()
    {
        return $this->hasMany(UserVote::class, 'photo_id');
    }
    public function userVoted($user_id)
    {
        return $this->votes()->where('user_id', $user_id)->exists();
    }
    public function elimination()
    {
        return $this->hasOne(Elimination::class, 'photo_id');
    }
    public function photocategory()
    {
        return $this->belongsTo(PhotoCategory::class,'photo_category','id');
    }
    // public function scopeOfType($query, $type)
    // {
    //     return $query->where('type', $type);
    // }
    public function scopeByUserType($query, $userType)
    {
        return $query->whereHas('photographer', function ($query) use ($userType) {
            $query->where('photographer_category', $userType);
        });
    }
    public function scopeFilterByCategory($query, $category)
    {
        return $query->where('photo_category', $category);
    }
    public static function generateUniqueId()
    {
        $currentYear = date('Y');
        $matchingRecords = self::withTrashed()
        ->where('photo_unique_id', 'like', "GGPF-{$currentYear}-%")
        ->get();
        $sortedRecords = $matchingRecords->sortByDesc(function ($record) {
            $numericPart = preg_replace('/[^0-9]/', '', $record->photo_unique_id);
            return (int)$numericPart;
        });
        if(!empty($sortedRecords->first()))
        {
        $id = $sortedRecords->first()->photo_unique_id;
        }
        else
        {
            $id = 1;
        }
        if ($id) {
            preg_match('/(\d+)$/', $id, $matches);
            if (isset($matches[1])) {
                $lastNumber = (int)$matches[1];
                $increment = $lastNumber + 1;
            } else {
                $increment = 101;
            }
        } else {
            $increment = 101;
        }
        $formattedIncrement = str_pad($increment, 3, '0', STR_PAD_LEFT);
        return "GGPF-{$currentYear}-{$formattedIncrement}";
    }
    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'elimination', 'photo_id', 'stage_id')
            ->withPivot('reviewer_id', 'eliminate')
            ->withTimestamps();
    }
    public function validations()
    {
        return $this->belongsToMany(Stage::class, 'validation', 'photo_id', 'stage_id')
            ->withPivot('reviewer_id', 'grade')
            ->withTimestamps();
    }
    public function averageScore()
    {
        return $this->hasMany(Validation::class, 'photo_id')
            ->selectRaw('photo_id, AVG(grade) as avg_score')
            ->groupBy('photo_id');
    }
    public function validations_admin()
    {
        return $this->hasMany(Validation::class,'photo_id' ,'id');
    }
    // public function validations_admin_desc()
    // {
    //     return $this->hasMany(Validation::class, 'photo_id', 'id')
    //     ->select('photo_id', \DB::raw('COALESCE(SUM(grade), 0) as total_grade'));
    // }
    // public function user_vote()
    // {
    //     return $this->hasMany(Validation::class,'photo_id' ,'id');
    // }

    public function userVotes()
    {
        return $this->hasMany(UserVote::class, 'photo_id', 'id');
    }

}
