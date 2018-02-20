<?php

use App\Role;
use Illuminate\Database\Seeder;

/*
The Role model has three main attributes:

name — Unique name for the Role, used for looking up role information in the application layer. For example: "admin", "owner", "employee".
display_name — Human readable name for the Role. Not necessarily unique and optional. For example: "User Administrator", "Project Owner", "Widget Co. Employee".
description — A more detailed explanation of what the Role does. Also optional.
*/
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Super admin',
                'description' => 'Root'
            ],
            [
                'name' => 'admin',
                'display_name' => 'User Administrator',
                'description' => 'User is allowed to manage and edit users, cars and other settings.'
            ],
            [
                'name' => 'assignee',
                'display_name' => 'Assignee/Unit Head',
                'description' => 'Assignee or the Unit Head'
            ],
            [
                'name' => 'originator',
                'display_name' => 'Originator',
                'description' => 'Originator'
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
