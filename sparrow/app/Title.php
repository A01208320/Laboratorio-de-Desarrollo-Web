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

    static public function getApprovedTitles()
    {
        return Title::where('titles.state', 'LIKE', 1)
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select(
                'titles.id',
                'titles.name',
                'titles.state',
                'titles.edition',
                'platforms.name AS platform_name',
            );
    }

    static public function filterAllTitles($value)
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

    static public function filterApprovedTitles($value)
    {
        $value = '%' . $value . '%';
        $filteredTitles = Title::where('titles.name', 'LIKE', $value)
            ->orWhere('platforms.name', 'LIKE', $value)
            ->orWhere('edition', 'LIKE', $value)
            ->orWhere('state', 'LIKE', $value)
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select('titles.id')
            ->get();
        $query = Title::where('state', 1)
            ->whereIn('titles.id', $filteredTitles)
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select(
                'titles.id',
                'titles.name',
                'titles.state',
                'titles.edition',
                'platforms.name AS platform_name',
            );
        return $query;
    }
}
