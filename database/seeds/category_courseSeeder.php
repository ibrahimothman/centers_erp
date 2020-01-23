<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++){
            DB::table('category_course')->insert(
                [
                    'category_id' =>  \App\Category::select('id')->orderByRaw("RAND()")->first()->id,
                    'course_id' =>  \App\Course::select('id')->orderByRaw("RAND()")->first()->id,

                ]
            );
        }
    }
}
