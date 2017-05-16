<?php

namespace App\Http\Controllers\Api\v1\Space;

use App\Http\Requests\Api\v1\Space\CreateSpaceRequest;
use App\Http\Requests\Api\v1\Space\UpdateSpaceRequest;
use App\Repositories\Api\Space\SpaceRepository;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    /**
     * @var SpaceRepository
     */
    protected $spaces;


    /**
     * SpaceController constructor.
     * @param SpaceRepository $spaces
     */
    public function __construct(SpaceRepository $spaces)
    {
        $this->spaces = $spaces;
    }

    /**
     * @param $lag
     * @param $lat
     * @return mixed
     */
    public function findNearby ($lag, $lat) {
        return $this->spaces->findNearby($lag, $lat)->paginate(15);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSpace($id) {
        return $this->spaces->find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPosts($id) {
        return $this->spaces->getSpacePosts($id)->paginate(15);
    }

    /**
     *
     */
    public function getUserSpaces() {
        return $this->spaces->getUserSpaces()->paginate(15);
    }

    /**
     *
     */
    public function getJoinedSpaces() {
        //TODO
    }

    /**
     * @param CreateSpaceRequest $request
     * @return mixed
     */
    public function createSpace(CreateSpaceRequest $request) {
        return $this->spaces->create($request);
    }

    /**
     * @param UpdateSpaceRequest $request
     * @return mixed
     */
    public function updateSpace(UpdateSpaceRequest $request) {
        return $this->spaces->updateSpace($request->all());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSpace($id) {
        return $this->spaces->deleteSpace($id);
    }

}
