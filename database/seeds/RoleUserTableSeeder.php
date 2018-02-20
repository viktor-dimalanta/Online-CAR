<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'user_id' => 1, // Reg
                'role_id' => 4
            ],
            [
                'user_id' => 2, // Viktor
                'role_id' => 4
            ],
            [
                'user_id' => 3, // JD
                'role_id' => 4
            ],
            [
                'user_id' => 4, // Tin
                'role_id' => 2
            ],
            [
                'user_id' => 5, // Jonar
                'role_id' => 1
            ],
            [
                'user_id' => 5, // Jonar
                'role_id' => 3
            ],
            [
                'user_id' => 6, // Mira
                'role_id' => 3
            ],
            [
                'user_id' => 7, // Jeff
                'role_id' => 3
            ]
        ];

        foreach($seeds as $key => $value) {
            DB::table('role_user')->insert(
                [
                    'user_id' => $value['user_id'],
                    'role_id' => $value['role_id']
                ]
            );
        }
    }
}
