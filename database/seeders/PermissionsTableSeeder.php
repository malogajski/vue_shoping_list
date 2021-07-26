<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'item_setting_access',
            ],
            [
                'id'    => 18,
                'title' => 'item_create',
            ],
            [
                'id'    => 19,
                'title' => 'item_edit',
            ],
            [
                'id'    => 20,
                'title' => 'item_show',
            ],
            [
                'id'    => 21,
                'title' => 'item_delete',
            ],
            [
                'id'    => 22,
                'title' => 'item_access',
            ],
            [
                'id'    => 23,
                'title' => 'store_create',
            ],
            [
                'id'    => 24,
                'title' => 'store_edit',
            ],
            [
                'id'    => 25,
                'title' => 'store_show',
            ],
            [
                'id'    => 26,
                'title' => 'store_delete',
            ],
            [
                'id'    => 27,
                'title' => 'store_access',
            ],
            [
                'id'    => 28,
                'title' => 'ordering_access',
            ],
            [
                'id'    => 29,
                'title' => 'order_create',
            ],
            [
                'id'    => 30,
                'title' => 'order_edit',
            ],
            [
                'id'    => 31,
                'title' => 'order_show',
            ],
            [
                'id'    => 32,
                'title' => 'order_delete',
            ],
            [
                'id'    => 33,
                'title' => 'order_access',
            ],
            [
                'id'    => 34,
                'title' => 'report_access',
            ],
            [
                'id'    => 35,
                'title' => 'main_report_create',
            ],
            [
                'id'    => 36,
                'title' => 'main_report_edit',
            ],
            [
                'id'    => 37,
                'title' => 'main_report_show',
            ],
            [
                'id'    => 38,
                'title' => 'main_report_delete',
            ],
            [
                'id'    => 39,
                'title' => 'main_report_access',
            ],
            [
                'id'    => 40,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 41,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 42,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 43,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 44,
                'title' => 'order_item_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
