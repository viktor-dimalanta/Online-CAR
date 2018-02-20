<?php

use Illuminate\Database\Seeder;

class ClassificationsTableSeeder extends Seeder
{
    private $tableName = 'classifications';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'title' => "Complaint"
            ],
            [
                'title' => "Accident"
            ],
            [
                'title' => "Security Report"
            ],
            [
                'title' => "Non-conformance"
            ]
        ];

        foreach($seeds as $key => $value) {
            DB::table($this->tableName)->insert(
                [
                    'title' => $value['title'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
        }
    }
}
