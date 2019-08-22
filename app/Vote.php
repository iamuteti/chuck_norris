<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
            'vote',
            'joke_id',
            'juror_id'
    ];
    public function joke()
        {
            return $this->belongsTo(Joke::class);
    }
    public function juror()
        {
            return $this->belongsTo(Juror::class);
    }
}
