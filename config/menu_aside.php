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
            'name' => 'category',
            'title' => 'Category',
            'icon' => 'bi bi-view-list',
            'route' => 'admin.category.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'coupon',
            'title' => 'Coupon',
            'icon' => 'bi bi-graph-down-arrow',
            'route' => 'admin.coupon.index',
            'submenu' => [],
            'number' => 3
        ],
    ],
];
