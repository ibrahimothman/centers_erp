<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{

    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function enrollers()
    {
        return $this->belongsToMany(Student::class)->withPivot(['take','result'])->withTimestamps();
    }
}
