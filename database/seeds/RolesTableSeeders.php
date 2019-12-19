<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class,4)->create();
    }
}
