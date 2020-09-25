<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];

    public function movie() {
        return $this->hasMany(Movie::class);
    }
}
