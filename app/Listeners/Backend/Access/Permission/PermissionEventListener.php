<?php

namespace App\Listeners\Backend\Access\Permission;

/**
 * Class PermissionEventListener.
 */
class PermissionEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Permission';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.permissions.created") '.$event->permission->name,
            $event->permission->id,
            'plus',
            'bg-green'
        );
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.permissions.updated") '.$event->permission->name,
            $event->permission->id,
            'save',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.permissions.deleted") '.$event->permission->name,
            $event->permission->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Access\Permission\PermissionCreated::class,
            'App\Listeners\Backend\Access\Permission\PermissionEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Access\Permission\PermissionUpdated::class,
            'App\Listeners\Backend\Access\Permission\PermissionEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Access\Permission\PermissionDeleted::class,
            'App\Listeners\Backend\Access\Permission\PermissionEventListener@onDeleted'
        );
    }
}
