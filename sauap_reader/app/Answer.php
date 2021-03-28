<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    /**
     * Question of the answer
     */
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
