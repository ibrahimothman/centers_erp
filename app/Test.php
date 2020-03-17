<?php

namespace App;

use App\QueryFilter\Id;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Test extends Model
{
    protected $guarded  = [];

    public static function allTests($center)
    {
        return app(Pipeline::class)
            ->send($center->tests())
            ->through([
                Id::class
            ])
            ->thenReturn()
            ->get();
    }

    public function center()
    {
        return $this->belongsTo(Center::class);

    }

    public function groups()
    {
        return $this->hasMany(TestGroup::class)->latest();

    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorical', 'categorical');
    }
    public function statement()
    {
        return $this->hasOne(TestStatement::class);
    }

}
