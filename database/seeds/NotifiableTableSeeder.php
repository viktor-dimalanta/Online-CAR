<?php

use Illuminate\Database\Seeder;

class NotifiableTableSeeder extends Seeder
{
    private $tableName = 'notifiables';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'notification_id' => "",
                'notifiable_id' => "",
                'notifiable_type' => ""
            ]
        ];
        /*
        foreach($seeds as $key => $value) {
            DB::table($this->tableName)->insert(
                [
                    'title' => $value['title'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
            );
        }
        */
    }
}
