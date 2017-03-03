<?php

namespace App\Http\Controllers\Backend\Access\Permissions;

use App\Http\Requests\Backend\Access\Permission\ManagePermissionRequest;
use App\Http\Requests\Backend\Access\Permission\StorePermissionRequest;
use App\Http\Requests\Backend\Access\Permission\UpdatePermissionRequest;
use App\Models\Access\Permission\Permission;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Permission\PermissionRepository;

/**
 * Class RoleController.
 */
class PermissionController extends Controller
{
    /*
     * @var PermissionRepository
     */
    protected $permissions;

    /**
     * @param PermissionRepository $permissions
     */
    public function __construct(PermissionRepository $permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * @param ManagePermissionRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePermissionRequest $request)
    {
        return view('backend.access.permissions.index');

    }

    /**
     * @param ManagePermissionRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(ManagePermissionRequest $request)
    {
        return view('backend.access.permissions.create')
            ->with('permission_count', $this->permissions->getCount());
    }

    /**
     * @param StorePermissionRequest $request
     * @return mixed
     */
    public function store(StorePermissionRequest $request)
    {
        $this->permissions->create($request->all());

        return redirect()->route('admin.access.permission.index')->withFlashSuccess(trans('alerts.backend.permissions.created'));
    }

    /**
     *
     * @param Permission $permission
     * @param ManagePermissionRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission, ManagePermissionRequest $request)
    {
        return view('backend.access.permissions.edit')
            ->with('permission',$permission);
    }

    /**
     * @param Permission $permission
     * @param UpdatePermissionRequest $request
     * @return mixed
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        $this->permissions->update($permission, $request->all());

        return redirect()->route('admin.access.permission.index')->withFlashSuccess(trans('alerts.backend.permissions.updated'));
    }

    /**
     * @param Permission $permission
     * @param ManagePermissionRequest $request
     * @return mixed
     */
    public function destroy(Permission $permission, ManagePermissionRequest $request)
    {
        $this->permissions->delete($permission);

        return redirect()->route('admin.access.permission.index')->withFlashSuccess(trans('alerts.backend.permissions.deleted'));
    }
}
