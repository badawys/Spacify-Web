<?php

namespace App\Repositories\Api\Space;

use App\Models\Space\Space;
use App\Repositories\Repository;


/**
 * Class UserRepository.
 */
class SpaceRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Space::class;

    /**
     * @param $lag
     * @param $lat
     */
    public function findNearby ($lag, $lat) {
        //TODO
    }


    public function createSpace(array $data) {
        //TODO
    }

    public function updateSpace($id, $input) {
        //TODO
    }

    public function deleteSpace($id) {
        //TODO
    }

}
