<?php

namespace App\Repositories\Api\Space;

use App\Http\Requests\Api\v1\Space\CreateSpaceRequest;
use App\Models\Access\User\User;
use App\Models\Space\Space;
use App\Repositories\Repository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Class UserRepository.
 */
class SpaceRepository extends Repository
{
    const MODEL = Space::class;

    /**
     * @param $lag
     * @param $lat
     * @return mixed
     */
    public function findNearby ($lag, $lat) {
       //nearby is a method in SpaceScope
        return Space::nearby($lag, $lat);
    }


    /**
     * @param CreateSpaceRequest $request
     * @return mixed
     */
    public function create(CreateSpaceRequest $request)
    {
        $input = $request->all();

        $space = self::MODEL;
        $space = new $space();
        $space->name = $input['name'];
        $space->type = $input['type'];
        $space->lng = $input['lng'];
        $space->lat = $input['lat'];
        $space->photo = config('defaults.space_pic');
        if($request->photo) {
            $photo = $request->file('photo')->store('space_pic');
            $space->photo = $photo;
        }
        $space->user_id = auth()->id();
        if(isset($input['description']))
            $space->description = $input['description'];

        DB::transaction(function () use ($space) {
            parent::save($space);
        });

        return $space;
    }

    /**
     * @param array $input
     * @return mixed
     */
    public function updateSpace(array $input)
    {
        $space = $this->find($input['id']);

        DB::transaction(function () use ($space, $input) {
            parent::update($space, $input);
        });

        return $space;
    }

    /**
     * @param $id
     * @return Response
     */
    public function deleteSpace($id)
    {
        $space = $this->find($id);

        if ($space) {
            DB::transaction(function () use ($space) {
                parent::delete($space);
            });
            return response('',204);
        }

        throw new NotFoundHttpException('Space not found!');
    }

    /**
     * @return mixed
     */
    public function getUserSpaces () {
        return User::find(auth()->id())->spaces();
    }

}
