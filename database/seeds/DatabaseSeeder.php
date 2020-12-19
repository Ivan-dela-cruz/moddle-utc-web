<?php

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
         $this->call(RolesSeeder::class);
         $this->call(LevelSeeder::class);
         $this->call(PeriodSeeder::class);
         $this->call(SubjectSeeder::class);
    }
}
