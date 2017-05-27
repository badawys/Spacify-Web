<?php

namespace App\Http\Controllers\Api\v1\Feed;

use App\Http\Controllers\Controller;
use App\Models\Post\Post;

class FeedController extends Controller
{
    public function getFeed () {
        return Post::with(['user'  => function ($query) {
                $query->select('id', 'name', 'photo');
            }])
            ->with(['space'  => function ($query) {
                $query->select('id', 'name');
            }])
            ->orderBy('id', 'desc')
            ->paginate(15);
    }
}
