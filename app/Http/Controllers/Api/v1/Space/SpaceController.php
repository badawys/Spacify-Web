<?php

namespace App\Http\Controllers\Api\v1\Space;

use App\Http\Requests\Request;
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
     * @param $id
     */
    public function getSpace($id) {
        //TODO
    }

    /**
     *
     */
    public function getUserSpaces() {
        //TODO
    }

    /**
     *
     */
    public function getJoinedSpaces() {
        //TODO
    }

    /**
     * @param Request $request
     */
    public function createSpace(Request $request) {
        //TODO
    }

    /**
     * @param $id
     */
    public function updateSpace($id) {
        //TODO
    }

    /**
     * @param $id
     */
    public function deleteSpace($id) {
        //TODO
    }


}
