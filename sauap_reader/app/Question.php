<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";

    /**
     * Get answers 
     */
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    /**
     * Return related test
     */
    public function test() {
        return $this->belongsTo(Test::class);
    }
}
