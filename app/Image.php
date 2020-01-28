<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Image extends Model
{
    //
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }



}
