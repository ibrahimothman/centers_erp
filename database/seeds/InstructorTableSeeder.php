<?php

use App\Instructor;
use Illuminate\Database\Seeder;

class InstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Instructor::class)->create();
    }
}
