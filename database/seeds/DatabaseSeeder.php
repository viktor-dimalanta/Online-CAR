<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClassificationsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SourcesTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // Pivot seeder
        $this->call(RoleUserTableSeeder::class);
        $this->call(NotifiableTableSeeder::class);
        //$this->call(NotificationUserTableSeeder::class); // Deleted

    }
}
