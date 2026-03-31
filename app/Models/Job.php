<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'salary_from',
        'salary_to',
        'is_remote',
        'type',
        'apply_url',
        'company_id',
        'location_id',
        'level_id',
        'expired_at'
    ];

    protected $casts = ['is_remote' => 'boolean',
    ];


    // Relationship
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
