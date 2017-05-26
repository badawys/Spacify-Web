<?php
namespace App\Repositories\Api\Post;
use App\Http\Requests\Api\v1\Post\CreatePostRequest;
use App\Models\Post\Post;
use App\Repositories\Repository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class UserRepository.
 */
class PostRepository extends Repository
{
    const MODEL = Post::class;

    /**
     * @param CreatePostRequest $request
     * @return mixed
     */
    public function create(CreatePostRequest $request)
    {
        $input = $request->all();

        $post = self::MODEL;
        $post = new $post();
        $post->type = $input['type'];
        $post->space_id = $input['space'];
        $post->data = $input['data'];
        $post->user_id = auth()->id();

        DB::transaction(function () use ($post) {
            parent::save($post);
        });

        return $post;
    }

    /**
     * @param $id
     * @return Response
     */
    public function deletePost($id)
    {
        $post = $this->find($id);

        if ($post) {
            DB::transaction(function () use ($post) {
                parent::delete($post);
            });
            return response('',204);
        }

        throw new NotFoundHttpException('post not found!');
    }
}