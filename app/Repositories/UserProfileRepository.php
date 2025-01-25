<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Str;
use App\Notifications\ProfileCompletionNotification;
class UserProfileRepository
{
    public function __construct()
    {
        //
    }
    public function updateProfile(User $user, array $data)
    {
        $user->name = $data['name'];
        // $user->last_name = $data['last_name'];
        // $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->secondary_contact_number = $data['secondary_contact_number'] ?? null;
        $user->dob = date('Y-m-d', strtotime($data['dob']));
        $user->city = $data['city'] ?? null;
        $user->age = $data['age'] ?? null;
        $user->gender = $data['gender'];
        $user->is_professional = $data['is_professional'] ?? null;
        $user->is_student = $data['is_student'] ?? 0;
        $user->dial_code = $data['dial_code'];
        $user->institution = $data['institution'];
        $user->dial_code_alt = $data['dial_code_alt'] ?? null;
        $user->facebook_link = $data['facebook_link'] ?? null;
        $user->instagram_link = $data['instagram_link'] ?? null;
        $user->country = $data['country'];
        $user->address = $data['address'] ?? null;
        $user->zipcode = $data['zipcode'] ?? null;
        $user->role = 'photographer';
        // $user->verification_token = Str::random(40);
        $user->save();
        $user->notify(new ProfileCompletionNotification($user));
        return $user;
    }
}
