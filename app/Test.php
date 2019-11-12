<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded  = [];

    public function center()
    {
        return $this->belongsTo(Center::class);

    }

    public function groups()
    {
        return $this->hasMany(TestGroup::class)->latest();

    }

    public function statement()
    {
        return $this->hasOne(TestStatement::class);
    }

}
