<?php

namespace App;

use App\QueryFilter\Id;
use App\QueryFilter\SearchBy;
use App\QueryFilter\Sort;
use App\Rules\UniquePerCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class Test extends Model
{
    protected $guarded  = [];

    public static function allTests($center)
    {
        return app(Pipeline::class)
            ->send($center->tests()->with('groups.enrollers'))
            ->through([
                Id::class,
                SearchBy::class,
                Sort::class
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
        return $this->hasMany(TestGroup::class)->with('times');

    }



    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorical', 'categorical');
    }
    public function statement()
    {
        return $this->hasOne(TestStatement::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($test){

            // delete test groups times
            $test->groups->each(function ($group){
                $group->times()->detach();
            });



        });
    }

    public static function rules(Request $request)
    {
        if($request->isMethod('post')){
            return[
                'name' => ['required', new UniquePerCenter(Test::class, '')],
                'code' => ['required', new UniquePerCenter(Test::class, '')],
                'description' => 'required',
                'cost' => 'required|integer',
                'cost_course' => 'required|integer',
                'result' => 'required|integer',
            ];
        }

        else{
            $test_id = $request->route('test')->id;
            return[
                'name' => ['required', new UniquePerCenter(Test::class,$test_id )],
                'code' => ['required', new UniquePerCenter(Test::class,$test_id )],
                'description' => 'required',
                'cost' => 'required|integer',
                'cost_course' => 'required|integer',
            ];
        }
    }

}
