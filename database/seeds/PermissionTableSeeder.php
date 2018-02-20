<?php

use App\Permission;
use Illuminate\Database\Seeder;

/*
The Permission model has the same three attributes as the Role:

name — Unique name for the permission, used for looking up permission information in the application layer. For example: "create-post", "edit-user", "post-payment", "mailing-list-subscribe".
display_name — Human readable name for the permission. Not necessarily unique and optional. For example "Create Posts", "Edit Users", "Post Payments", "Subscribe to mailing list".
description — A more detailed explanation of the Permission.
*/
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-read',
                'display_name' => 'Display Role Listing',
                'description' => 'See listings of role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],

            [
                'name' => 'car-create',
                'display_name' => 'Create CAR',
                'description' => 'Create New CAR'
            ],
            [
                'name' => 'car-read',
                'display_name' => 'Display CAR Listing',
                'description' => 'See listings of CAR'
            ],
            [
                'name' => 'car-edit',
                'display_name' => 'Edit CAR',
                'description' => 'Edit CAR'
            ],
            [
                'name' => 'car-delete',
                'display_name' => 'Delete CAR',
                'description' => 'Delete CAR'
            ]
        ];

        foreach($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
