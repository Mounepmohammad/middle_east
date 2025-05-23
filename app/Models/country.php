<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\region;
use App\Models\job_opportunity;
use App\Models\company;

class country extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_name',
        'ar_name',
        'flag',
        'state'
    ];

    public function scopeActive($query)
    {
        return $query->where('state', 'active');
    }

    public function regions()
    {
        return $this->hasMany(region::class,'country_id','id');

    }

    public function opportunities()
    {
        return $this->hasMany(job_opportunity::class, 'country_id', 'id');
    }

    public function companies()
    {
        return $this->hasMany(company::class, 'country_id', 'id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }
    public function ads()
    {
        return $this->hasMany(ads::class, 'country_id', 'id');
    }
}
