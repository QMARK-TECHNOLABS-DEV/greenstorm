<?php

namespace App\Repositories;
use App\Models\Photographer;
class PhotographerRepository
{
    public function __construct()
    {
        //
    }
    public function updatePhotographer(Photographer $photographer, array $data)
    {
        $photographer->is_verified = true;
        $photographer->save();
        return $photographer;
    }
}
