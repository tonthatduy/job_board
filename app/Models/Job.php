<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
