<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    private $tableName = 'statuses';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'title' => "Unit Head’s Acceptance",
                'code' => 'UNIT_HEAD_ACCEPT',
                'style' => 'bg-danger'
            ],
            [
                'title' => "Unit Head’s Response",
                'code' => 'UNIT_HEAD_RESP',
                'style' => 'bg-warning'
            ],
            [
                'title' => "Originator’s acceptance of the solutions",
                'code' => 'ORIGINATOR_ACCEPT',
                'style' => 'bg-info'
            ],
            [
                'title' => "Unit Head’s Execution",
                'code' => 'UNIT_HEAD_EXEC',
                'style' => 'bg-success'
            ],
            [
                'title' => "Admin’s Acceptance",
                'code' => 'ADMIN_ACCEPT',
                'style' => 'bg-success'
            ],
            [
                'title' => "Management Representative’s Effectiveness Check",
                'code' => 'ADMIN_ACCEPT',
                'style' => 'bg-success'
            ],
            [
                'title' => "Unit Head’s Reject",
                'code' => 'UNIT_HEAD_REJECT',
                'style' => 'bg-danger'
            ],
            [
                'title' => 'Originator’s Reject',
                'code' => 'ORIGINATOR_REJECT',
                'style' => 'bg-danger'
            ],
            [
                'title' => 'Admin’s Reject',
                'code' => 'ADMIN_REJECT',
                'style' => 'bg-danger'
            ],
            [
                'title' => 'Management Reject',
                'code' => 'SUPERADMIN_REJECT',
                'style' => 'bg-danger'
            ],
            [
                'title' => 'Draft',
                'code' => 'DRAFT',
                'style' => 'bg-secondary'
            ]
            [
                'title' => 'Originator Revise',
                'code' => 'ORIG_REVISE',
                'style' => 'bg-secondary'
            ]
        ];

        foreach($seeds as $key => $value) {
            DB::table($this->tableName)->insert(
                [
                    'title' => $value['title'],
                    'code' => $value['code'],
                    'style' => $value['style'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
            //Status::created($value);
        }
    }
}
