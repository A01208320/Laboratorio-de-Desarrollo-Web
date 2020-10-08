<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];
    protected $table = 'title_user';

    static public function getReviews(int $user_id)
    {
        return Review::where('user_id', $user_id)
            ->join('titles', 'title_user.title_id', '=', 'titles.id')
            ->join('users', 'title_user.user_id', '=', 'users.id')
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select('title_user.id', 'titles.name AS title_name', 'platforms.name AS platform_name', 'titles.edition', 'title_user.recommendation', 'title_user.comment', 'users.name AS user_name', 'users.email', 'title_user.created_at');
    }

    static public function getFilteredReviews(int $user_id, $value)
    {
        $value = '%' . $value . '%';
        $filteredReviews = Review::where('titles.name', 'LIKE', $value)
            ->orWhere('platforms.name', 'LIKE', $value)
            ->orWhere('edition', 'LIKE', $value)
            ->orWhere('recommendation', 'LIKE', $value)
            ->join('titles', 'title_user.title_id', '=', 'titles.id')
            ->join('users', 'title_user.user_id', '=', 'users.id')
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select('title_user.id')
            ->get();
        $query = Review::where('user_id', $user_id)
            ->whereIn('titles.id', $filteredReviews)
            ->join('titles', 'title_user.title_id', '=', 'titles.id')
            ->join('users', 'title_user.user_id', '=', 'users.id')
            ->join('platforms', 'titles.platform_id', '=', 'platforms.id')
            ->select('title_user.id', 'titles.name AS title_name', 'platforms.name AS platform_name', 'titles.edition', 'title_user.recommendation', 'title_user.comment', 'users.name AS user_name', 'users.email', 'title_user.created_at');
        return $query;
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
