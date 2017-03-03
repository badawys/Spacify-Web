<?php

namespace App\Http\Controllers\Backend\Access\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Permission\ManagePermissionRequest;
use App\Repositories\Backend\Access\Permission\PermissionRepository;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class RoleTableController.
 */
class PermissionTableController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $permissions;

    /**
     * RoleTableController constructor.
     * @param PermissionRepository $permissions
     */
    public function __construct(PermissionRepository $permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @param ManagePermissionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePermissionRequest $request)
    {
        return Datatables::of($this->permissions->getForDataTable())
            ->addColumn('permissions', function ($permission) {
                return $permission;
            })
            ->addColumn('actions', function ($permission) {
                return $permission->action_buttons;
            })
            ->make(true);
    }
}
