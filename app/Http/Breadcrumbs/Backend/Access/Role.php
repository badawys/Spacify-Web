<?php

Breadcrumbs::register('role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.roles.management'), route('role.index'));
});

Breadcrumbs::register('role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.create'), route('role.create'));
});

Breadcrumbs::register('role.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('role.index');
    $breadcrumbs->push(trans('menus.backend.access.roles.edit'), route('role.edit', $id));
});
