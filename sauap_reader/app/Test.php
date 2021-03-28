<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    /**
     * Return test questions
     */
    public function questions() {
        return $this->hasMany(Question::class);
    }

    /**
     * return sections sections
     */
    public function sections() {
        $this -> belongsToMany(Section::class);
    }
}
