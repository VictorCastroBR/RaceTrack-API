<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    protected $fillable = ['name', 'nickname', 'birth', 'active'];

    public function races()
    {
        return $this->belongsToMany(Race::class, 'race_pilots', 'pilot_id');
    }
}
