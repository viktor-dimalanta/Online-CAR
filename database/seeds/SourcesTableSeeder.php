<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{
    protected $tableName = 'sources';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'title' => "Talent Management"
            ],
            [
                'title' => "Financial Services"
            ],
            [
                'title' => "Service Desk"
            ],
            [
                'title' => "Data Center, Cloud & Network"
            ],
            [
                'title' => "Apps Dev"
            ],
            [
                'title' => "Solutions Architecture"
            ],
            [
                'title' => "Ramcar Program Management"
            ],
            [
                'title' => "SAP Support"
            ],
            [
                'title' => "Netsuite Support"
            ],
            [
                'title' => "NetWeaver"
            ],
            [
                'title' => "SAP"
            ],
            [
                'title' => "Netsuite"
            ],
            [
                'title' => "Analytics"
            ],
            [
                'title' => "Project Management"
            ],
            [
                'title' => "Bids and Contracts Management"
            ],
            [
                'title' => "Sales"
            ],
            [
                'title' => "Academy"
            ],
            [
                'title' => "Marketing"
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
