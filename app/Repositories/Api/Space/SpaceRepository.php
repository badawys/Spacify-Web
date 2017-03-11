<?php

namespace App\Repositories\Api\Space;

use App\Exceptions\GeneralException;
use App\Models\Space\Space;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


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
        return Space::nearby($lag, $lat)->paginate(15);
    }


    /**
     * @param array $input
     * @throws GeneralException
     */
    public function create(array $input)
    {
        $space = self::MODEL;
        $space = new $space();
        $space->name = $input['name'];
        $space->type = $input['type'];
        $space->lng = $input['lng'];
        $space->lat = $input['lat'];
        if (isset($input['photo']))
            $space->photo = $input['photo'];
        $space->user_id = auth()->id();
        if(isset($input['description']))
            $space->description = $input['description'];

        DB::transaction(function () use ($space) {
            parent::save($space);
        });

        return $space;
    }

    /**
     * @param Model $model
     * @param array $input
     * @return bool
     */
    public function update(Model $model, array $input)
    {
        $updated = parent::update($model, $input);
        return $updated;
    }

    /**
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model)
    {
        $deleted = parent::delete($model);
        return $deleted;
    }

}
