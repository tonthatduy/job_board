<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'salary_from',
        'salary_to',
        'is_remote',
        'type',
        'status',
        'apply_url',
        'company_id',
        'location_id',
        'level_id',
        'expired_at',
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'expired_at' => 'datetime',
    ];

    protected $dates = ['delete_at'];

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
