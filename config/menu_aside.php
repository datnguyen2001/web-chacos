<?php

return [
    'admin' => [
        [
            'name' => 'dashboard',
            'title' => 'Dashboard',
            'icon' => 'bi bi-grid',
            'route' => 'admin.index',
            'submenu' => [],
            'number' => 1
        ],
        [
            'name' => 'coupon',
            'title' => 'Coupon',
            'icon' => 'bi bi-graph-down-arrow',
            'route' => 'admin.coupon.index',
            'submenu' => [],
            'number' => 2
        ],
    ],
];
