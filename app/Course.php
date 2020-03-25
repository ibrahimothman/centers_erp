<?php

namespace App;

use App\helper\ImageUploader;
use App\QueryFilter\CategoryId;
use App\QueryFilter\Id;
use App\QueryFilter\Limit;
use App\Rules\UniquePerCenter;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use mysql_xdevapi\Session;

class Course extends ImageUploader
{
    protected $hidden = array('pivot');
    public $timestamps = false;
    protected $guarded = [];

    public static function allCourses($center)
    {
        return app(Pipeline::class)
            ->send($center ? $center->courses() : Course::query())
            ->through([
                Id::class,
                CategoryId::class,

            ])
            ->thenReturn()->paginate(request('limit')? request('limit') : 10);
    }




    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function diplomas()
    {
        return $this->belongsToMany(Diploma::class)->withTimestamps();
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function groups()
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function categories(){
        return $this->morphToMany(Category::class, 'categorical', 'categorical');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function($course){
            if($course->images){
                foreach($course->images as $image){
                    (new self)->deleteImage($image);
                }
                $course->images()->delete();
            }
        });
    }


    public function uploadImages($images)
    {
        foreach ($images as $image) {
            $original = $this->saveImage($image);
//            echo $original;
            $this->images()->create([
                'url' => url("/uploads/courses/".$original)
            ]);
        }
    }

    public static function rules(Request $request)
    {
        if($request->isMethod('post')){
            return[
                'name'=>['required', new UniquePerCenter(Course::class, '')],
                'code'=>'required | unique:courses,code,NULL,id,center_id,' . Session('center_id'),
                'duration'=>'required',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'description'=>'required',
                'content'=>'required',
                'images'=>'required|array',
                'instructors'=>'required|array',
//                'categories'=>'required|array',
            ];
        }
        else{
            $course_id = $request->route('course')->id;
            return[
                'name'=>['required', new UniquePerCenter(Course::class, $course_id)],
                'code'=>'required',
                'duration'=>'required',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'description'=>'required',
                'content'=>'required',
                'images'=>'sometimes|array',
                'instructors'=>'required|array',
//                'categories'=>'required|array',
            ];
        }
    }

    public function getDir()
    {
        return '/uploads/courses';
    }
}
