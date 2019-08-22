<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $fillable = [
            'title',
            'category',
            'date'
    ];

/**
     * The categories that belong to the joke.
     */
    public function categories() {
            return $this->belongsToMany(Category::class, 'joke_categories');
    }

    public function votes() {
            return $this->hasMany(Vote::class);
    }
}
