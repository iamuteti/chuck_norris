<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juror extends Model
{
    protected $fillable = [
        'first_name',
        'last_name'
    ];
    public function votes()
        {
            return $this->hasMany(Vote::class);
    }
}
