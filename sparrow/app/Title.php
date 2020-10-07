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

    static public function getAllTitles()
    {
        return Title::join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select(
                'titles.id',
                'titles.name',
                'titles.state',
                'titles.edition',
                'platforms.name AS platform_name',
            );
    }

    static public function filterTitles($value)
    {
        $value = '%' . $value . '%';
        return Title::where('titles.name', 'LIKE', $value)
            ->orWhere('platforms.name', 'LIKE', $value)
            ->orWhere('edition', 'LIKE', $value)
            ->orWhere('state', 'LIKE', $value)
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select(
                'titles.id',
                'titles.name',
                'titles.state',
                'titles.edition',
                'platforms.name AS platform_name',
            );
    }
}
