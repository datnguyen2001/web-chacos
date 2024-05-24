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
            'name' => 'homepage',
            'title' => 'Home Page',
            'icon' => 'bi bi-house-gear',
            'route' => 'admin.coupon.index',
            'submenu' => [
                [
                    'name' => 'banner',
                    'title' => 'Banner',
                    'icon' => 'bi bi-app-indicator',
                    'route' => 'admin.settings.banner'
                ],
                [
                    'name' => 'style',
                    'title' => 'Shop by style',
                    'icon' => 'bi bi-alexa',
                    'route' => 'admin.settings.shop.by.style'
                ],
                [
                    'name' => 'sale_along',
                    'title' => 'Sale along',
                    'icon' => 'bi bi-box-seam',
                    'route' => 'admin.settings.sale.along'
                ],
                [
                    'name' => 'favorites',
                    'title' => 'Favorites',
                    'icon' => 'bi bi-star-fill',
                    'route' => 'admin.settings.favorites'
                ],
                [
                    'name' => 'box-around',
                    'title' => 'Box around',
                    'icon' => 'bi bi-palette',
                    'route' => 'admin.settings.box.around'
                ],
                [
                    'name' => 'key-search',
                    'title' => 'Key search',
                    'icon' => 'bi bi-palette',
                    'route' => 'admin.settings.key-search'
                ],
            ],
            'number' => 2
        ],
        [
            'name' => 'category',
            'title' => 'Category',
            'icon' => 'bi bi-view-list',
            'route' => 'admin.category.index',
            'submenu' => [],
            'number' => 3
        ],
        [
            'name' => 'product',
            'title' => 'Product',
            'icon' => 'bi bi-view-list',
            'route' => 'admin.products.index',
            'submenu' => [],
            'number' => 4
        ],
        [
            'name' => 'coupon',
            'title' => 'Coupon',
            'icon' => 'bi bi-graph-down-arrow',
            'route' => 'admin.coupon.index',
            'submenu' => [],
            'number' => 5
        ],
        [
            'name' => 'information',
            'title' => 'Information Shop',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'name' => 'shipping',
                    'title' => 'Shipping Information',
                    'route' => 'admin.infor-shop.index',
                    'parameters' => ['type' => 0],
                ],
                [
                    'name' => 'return',
                    'title' => 'Returns Exchanges',
                    'route' => 'admin.infor-shop.index',
                    'parameters' => ['type' => 1],
                ],
                [
                    'name' => 'account',
                    'title' => 'Account',
                    'route' => 'admin.infor-shop.index',
                    'parameters' => ['type' => 2],
                ],
                [
                    'name' => 'faq',
                    'title' => 'FAQ',
                    'route' => 'admin.infor-shop.index',
                    'parameters' => ['type' => 3],
                ],
            ],
            'number' => 6
        ],
        [
            'name' => 'order',
            'title' => 'Order',
            'icon' => 'bi bi-bag-check',
            'route' => 'admin.order.index',
            'submenu' => [],
            'number' => 7
        ],
    ],
];
