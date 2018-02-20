<?php

use Illuminate\Database\Seeder;

//use App\User;

class UsersTableSeeder extends Seeder
{
    private $tableName = 'users';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'first_name' => 'Regie',
                'middle_initial' => '',
                'last_name' => 'Ebalobor',
                'email' => 'reg.ebalobor@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 2,
                'first_name' => 'Viktor',
                'middle_initial' => '',
                'last_name' => 'Dimalanta',
                'email' => 'tor.dimalanta@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 3,
                'first_name' => 'Juan Domingo',
                'middle_initial' => '',
                'last_name' => 'Rivera',
                'email' => 'jd.rivera@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 4,
                'first_name' => 'Kristine',
                'middle_initial' => '',
                'last_name' => 'Malaluan',
                'email' => 'kristine.durante@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 5,
                'first_name' => 'Jonar',
                'middle_initial' => '',
                'last_name' => 'Gregorio',
                'email' => 'jonar.gregorio@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 6,
                'first_name' => 'Mira',
                'middle_initial' => '',
                'last_name' => 'Perce',
                'email' => 'mira.perce@kaisa.com',
                'password' => bcrypt('secret')
            ],
            [
                'id' => 7,
                'first_name' => 'Jeff',
                'middle_initial' => '',
                'last_name' => 'Turla',
                'email' => 'jeff.turla@kaisa.com',
                'password' => bcrypt('secret')
            ]
        ];

        foreach ($users as $key => $value) {
            //User::create($value);
            DB::table($this->tableName)->insert([
            'id' => $value['id'],
            'first_name' => $value['first_name'],
            'middle_initial' => $value['middle_initial'],
            'last_name' => $value['last_name'],
            'email' => $value['email'],
            'password' => bcrypt('secret'),
        ]);
        }
    }
}
