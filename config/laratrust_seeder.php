<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'invoices' =>   'c,r,u,d,a',
            'sections' =>     'c,r,u,d',
            'products' =>   'c,r,u,d',
            'Reports' =>   'c,r,u,d',
            'settings' =>   'r,u',

        ],
        'admin' => [],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'a' => 'archive'
    ]
];
