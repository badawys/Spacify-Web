<?php

namespace App\Http\Controllers\Backend\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {

        return view('backend.posts.index');
    }
}
