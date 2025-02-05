<?php

return [
    [
        'icon' => 'nav-icon fas fa-tachometer-alt',
        'route' => 'dashboard.dashboard',
        'title' => 'Dashboard',
        'active' => 'dashboard.dashboard',

    ],
    [
        'icon' => 'far fa-circle nav-icon',
        'route' => 'dashboard.categories.index',
        'title' => 'Categories',
        'badge' => 'New',
        'active' => 'dashboard.categories.*',
        'ability' => 'categories.view',
    ],
    [
        'icon' => 'far fa-circle nav-icon',
        'route' => 'dashboard.products.index',
        'title' => 'Products',
        'active' => 'dashboard.products.*',
        'ability' => 'products.view',
    ],
    [
        'icon' => 'far fa-circle nav-icon',
        'route' => 'dashboard.categories.index',
        'title' => 'Orders',
        'active' => 'dashboard.orders.*',
        'ability' => 'orders.view',

    ]
    ,
    [
    'icon' => 'far fa-shield nav-icon',
    'route' => 'dashboard.roles.index',
    'title' => 'Roles',
    'active' => 'dashboard.roles.*',
     'ability' => 'roles.view',
    ]
    ,
    [
        'icon' => 'far fa-users nav-icon',
        'route' => 'dashboard.users.index',
        'title' => 'users',
        'active' => 'dashboard.users.*',
        'ability' => 'users.view',
    ]
    ,
    [
        'icon' => 'far fa-users nav-icon',
        'route' => 'dashboard.admins.index',
        'title' => 'admins',
        'active' => 'dashboard.admins.*',
        'ability' => 'admins.view',
    ]
];
