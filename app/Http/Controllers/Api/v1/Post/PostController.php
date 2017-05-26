<?php

namespace App\Http\Controllers\Api\v1\Post;

use App\Http\Requests\Api\v1\Post\CreatePostRequest;
use App\Repositories\Api\Post\PostRepository;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;


    /**
     * SpaceController constructor.
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPost($id) {
        return $this->posts->find($id);
    }


    /**
     * @param CreatePostRequest $request
     * @return mixed
     */
    public function createPost(CreatePostRequest $request) {
        return $this->posts->create($request);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id) {
        return $this->posts->deletePost($id);
    }
}
