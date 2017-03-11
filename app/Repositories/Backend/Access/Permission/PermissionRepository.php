<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Events\Backend\Access\Permission\PermissionCreated;
use App\Events\Backend\Access\Permission\PermissionDeleted;
use App\Events\Backend\Access\Permission\PermissionUpdated;
use App\Exceptions\GeneralException;
use App\Repositories\Repository;
use App\Models\Access\Permission\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;


    /**
     * @param array $input
     * @throws GeneralException
     */
    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.access.permissions.already_exists'));
        }

        DB::transaction(function () use ($input) {
            $permission = self::MODEL;
            $permission = new $permission();
            $permission->name = $input['name'];
            $permission->display_name = $input['display_name'];
            $permission->sort = isset($input['sort']) && strlen($input['sort']) > 0 && is_numeric($input['sort']) ? (int) $input['sort'] : 0;

            parent::save($permission);

            event(new PermissionCreated($permission));
        });
    }

    /**
     * @param Model $model
     * @param array $input
     * @return bool
     */
    public function update(Model $model, array $input)
    {
        $updated = parent::update($model, $input);
        event(new PermissionUpdated($model));
        return $updated;
    }

    /**
     * @param Model $model
     * @return bool|null
     */
    public function delete(Model $model)
    {
        $deleted = parent::delete($model);
        event(new PermissionDeleted($model));
        return $deleted;
    }


    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->select([
                config('access.permissions_table').'.id',
                config('access.permissions_table').'.name',
                config('access.permissions_table').'.display_name',
                config('access.permissions_table').'.sort',
            ]);
    }
}
