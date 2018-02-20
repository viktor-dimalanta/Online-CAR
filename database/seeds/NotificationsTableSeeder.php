<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    private $tableName = 'notifications';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'id' => 1,
                'title' => "New CAR pending for acceptance" // assignee
            ],
            [
                'id' => 2,
                'title' => "CAR has been accepted and ready for response" // originator
            ],
            [
                'id' => 3,
                'title' => "CAR’s solutions has been provided" // originator
            ],
            [
                'id' => 4,
                'title' => "CAR’s solutions has approved by originator" // assignee
            ],
            [
                'id' => 5,
                'title' => "CAR’s is ready for acceptance" // admin
            ],
            [
                'id' => 6,
                'title' => "CAR’s is ready for effectiveness checking" // super admin
            ],
            [
                'id' => 20,
                'title' => "Disapproved - CAR has been rejected" // originator & admin
            ],
            [
                'id' => 21,
                'title' => "Reject - CAR has been rejected by the admin" // originator & assignee
            ],
            [
                'id' => 22,
                'title' => "Disapproved - CAR’s solution needs to revise" // assignee
            ]
        ];

        foreach($seeds as $key => $value) {
            DB::table($this->tableName)->insert(
                [
                    'id' => $value['id'],
                    'title' => $value['title'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
        }
    }
}
