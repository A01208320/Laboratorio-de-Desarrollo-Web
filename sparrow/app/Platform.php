<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $guarded = [];

    public function titles()
    {
        return $this->hasMany(Titles::class);
    }
}
