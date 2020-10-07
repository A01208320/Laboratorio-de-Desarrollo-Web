<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function titles()
    {
        return $this->hasMany(Titles::class);
    }
}
