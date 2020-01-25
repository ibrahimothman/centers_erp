<?php

namespace App;

use App\QueryFilter\Id;
use App\QueryFilter\TestId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;

class TestGroup extends Model
{

    protected $guarded = [];

    public static function allGroups($test){
        return app(Pipeline::class)
            ->send($test->groups())
            ->through([
                TestId::class
            ])
            ->thenReturn()
            ->get();
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function enrollers()
    {
        return $this->belongsToMany(Student::class)->withPivot(['take','result'])->withTimestamps();
    }
}
