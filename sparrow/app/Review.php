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
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
