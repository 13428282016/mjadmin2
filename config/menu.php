<?php
/**
 * Created by PhpStorm.
 * User: wmj
 * Date: 2016/1/2
 * Time: 11:41
 */

return [

    'ucenter' => [
        'text' => '用户中心',
        'children' => [

            'profile' => ['href' => 'user/profile', 'text' => '基本信息'],
            'password' => ['href' => 'password/reset', 'text' => '修改密码'],

        ]

    ],
    'user' => [
        'text' => '用户管理',
        'children' => [

            'add' => ['href' => 'user/create', 'text' => '添加用户'],
            'list' => ['href' => 'user', 'text' => '用户列表']
        ]
    ],
    'role' => [
        'text' => '角色管理',
        'children' => [
            'add' => ['href' => 'role/create', 'text' => '添加角色'],
            'list' => ['href' => 'role', 'text' => '角色列表']
        ]
    ],
    'auth' => [
        'text' => '权限管理',
        'children' => [
            'add' => ['href' => 'authority/create', 'text' => '添加权限'],
            'list' => ['href' => 'authority', 'text' => '权限列表'],
            'add_group' => ['href' => 'auth-group/create', 'text' => '添加权限分组'],
            'list_group' => ['href' => 'auth-group', 'text' => '权限分组列表'],


        ]

    ]

];