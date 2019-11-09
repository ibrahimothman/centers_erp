<?php

use App\TestGroup;
use Illuminate\Database\Seeder;

class TestGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TestGroup::class, 3)->create();
    }
}
