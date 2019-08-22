<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function joke()
        {
            return $this->belongsTo(Joke::class);
    }
    public function juror()
        {
            return $this->belongsTo(Juror::class);
    }
}
