<?php

namespace App\Events\Backend\Access\Permission;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated.
 */
class PermissionCreated extends Event
{
    use SerializesModels;

    /**
     * @var
     */
    public $permission;

    /**
     * @param $permission
     */
    public function __construct($permission)
    {
        $this->permission = $permission;
    }
}
