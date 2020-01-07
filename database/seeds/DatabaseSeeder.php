<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
//        $this->call(StudentsTableSeeder::class);
        $this->call(CenterTableSeeder::class);
        $this->call(InstructorTableSeeder::class);
//        $this->call(TestTableSeeder::class);
//        $this->call(TestGroupTableSeeder::class);

    }
}
