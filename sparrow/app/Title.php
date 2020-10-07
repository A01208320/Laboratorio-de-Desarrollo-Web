<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();;
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
