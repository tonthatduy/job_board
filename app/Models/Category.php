<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // relationship
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
