<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if($this->command->confirm("Do you refresh the database ?"))
        {
            $this->command->call('migrate:refresh');
            $this->command->info('database was refreshed :)');
        }

        $this->call([ProductSeeder::class]);
    }
}
