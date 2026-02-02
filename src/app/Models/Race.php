<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = ['track_id', 'date', 'number_of_turns'];


    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function pilots ()
    {
        return $this->belongsToMany(Pilot::class, 'race_pilots', 'race_id');
    }
}
