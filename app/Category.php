<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
         * The jokes that belong to the category.
         */
        public function jokes()
        {
            return $this->belongsToMany(Joke::class, 'joke_categories');
        }
}
