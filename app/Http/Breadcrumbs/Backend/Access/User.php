<?php

Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.backend.access.users.management'), route('user.index'));
});

Breadcrumbs::register('admin.access.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deactivated'), route('admin.access.user.deactivated'));
});

Breadcrumbs::register('admin.access.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.deleted'), route('admin.access.user.deleted'));
});

Breadcrumbs::register('user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.create'), route('user.create'));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.edit'), route('user.edit', $id));
});

Breadcrumbs::register('admin.access.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('menus.backend.access.users.change-password'), route('admin.access.user.change-password', $id));
});
