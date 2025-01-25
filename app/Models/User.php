<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\gsResetPasswordNotification;

class User extends  Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isJudge()
    {
        return $this->role === 'judge';
    }
    public function isPhotoGrapher()
    {
        return $this->role === 'photographer';
    }
    public function photographer()
    {
        return $this->hasOne(Photographer::class);
    }
    public function photographs()
    {
        return $this->hasMany(Photograph::class);
    }

    public function eliminationPhotos()
    {
        return $this->belongsToMany(Photograph::class, 'elimination', 'reviewer_id', 'photo_id')
            ->withPivot('stage_id', 'eliminate')
            ->withTimestamps();
    }

    public function validationPhotos()
    {
        return $this->belongsToMany(Photograph::class, 'validation', 'reviewer_id', 'photo_id')
            ->withPivot('stage_id', 'grade')
            ->withTimestamps();
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new gsResetPasswordNotification($token));
    }
}
