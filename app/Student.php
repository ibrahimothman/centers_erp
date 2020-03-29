<?php

namespace App;

use App\helper\Constants;
use App\helper\ImageUploader;
use App\QueryFilter\Name;
use App\QueryFilter\Sort;
use App\Rules\DegreeRule;
use App\Rules\FacultyRule;
use App\Rules\UniquePerCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Student extends ImageUploader
{
    protected $guarded = [];

    public static function allStudents($center)
    {
        return app(Pipeline::class)
            ->send($center->students())
            ->through([
                Sort::class,
                Name::class
            ])
            ->thenReturn()
            ->get();

    }

    public function getImage($key)
    {
        $imagePath = ($this->$key) ? $this->$key : Constants::getInstructorPlaceholderImage();
        return  $imagePath;
    }

    public function setImageAttribute($image){
        $this->deleteImage($this->image);
        $original = $this->saveImage($image);
        return $this->attributes['image'] = url($this->getDir()."/".$original);

    }
    public function setIdImageAttribute($idImage){
        // first delete prev one
        $this->deleteImage($this->idImage);
        $original = $this->saveImage($idImage);
        return $this->attributes['idImage'] = url($this->getDir()."/".$original);

    }



    public static function degreeOptions(){
        return [
          'طالب','خريج'
        ];
    }

    public static function facultyOptions(){
        return [
            'هندسه','تجاره'
        ];
    }

    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function centers()
    {
        return $this->belongsToMany(\App\Center::class)->withTimestamps();
    }

    public function testsEnrolling()
    {
        return $this->belongsToMany(TestGroup::class)->withPivot(['take','result'])->withTimestamps();
    }


    public function courses(){
        return $this->belongsToMany(CourseGroup::class)->withTimestamps();
    }

    public function diplomas()
    {
        return $this->belongsToMany(DiplomaGroup::class)->withTimestamps();
    }

    public function payments()
    {
        return $this->morphMany(Transaction::class, 'payer');
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($student){

            // detach the student from all centers
            foreach ($student->centers as $center){
                $center->students()->detach($student);
            }
            // delete student's address
            if($student->address) $student->address->delete();
            // delete student's image and id_image from /uploads/profiles
            if($student->image) (new self)->deleteImage($student->image);
            if($student->idImage) (new self)->deleteImage($student->idImage);

        });
    }

    public function getDir()
    {
        return '/uploads/profiles';
    }

    public static function rules(Request $request)
    {

        if($request->isMethod('post')){
            return [
                'nameAr' => ['required', new UniquePerCenter(Student::class, '', 'students', false)],
                'nameEn' => ['required', new UniquePerCenter(Student::class, '', 'students', false)],
                'email' => ['required', new UniquePerCenter(Student::class, '', 'students', false)],

                'idNumber' => ['required', 'digits:14', new UniquePerCenter(Student::class, '', 'students', false)],
                'image' => ' sometimes|image|file | max:10000',
                'idImage' => 'sometimes|image|file | max:10000',
                'phoneNumber' => ['required', 'regex:/(01)[0-9]{9}/', new UniquePerCenter(Student::class, '', 'students', false)],
//                'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
                'passportNumber' => 'sometimes',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'degree' => ['required',new DegreeRule],
                'faculty' => ['required',new FacultyRule],
                'skillCardNumber' => ['sometimes', new UniquePerCenter(Student::class, '', 'students', false)],
            ];
        }else{
            $student_id = $request->route('student')->id;
            return[
                'nameAr' => ['required', new UniquePerCenter(Student::class, $student_id, 'students', false)],
                'nameEn' => ['required', new UniquePerCenter(Student::class, $student_id, 'students', false)],
                'email' => ['required', new UniquePerCenter(Student::class, $student_id, 'students', false)],
                'idNumber' => ['required', 'digits:14', new UniquePerCenter(SStudent::class, $student_id, 'students', false)],
                'image' => ' sometimes|image|file | max:10000',
                'idImage' => 'sometimes|image|file | max:10000',
                'phoneNumber' => ['required', 'regex:/(01)[0-9]{9}/', new UniquePerCenter(Student::class, $student_id, 'students', false)],
//                'phoneNumberSec' => 'sometimes|regex:/(01)[0-9]{9}/',
                'passportNumber' => 'sometimes',
                'state' => 'sometimes',
                'city' => 'sometimes',
                'address' => 'sometimes',
                'degree' => ['sometimes',new DegreeRule],
                'faculty' => ['sometimes',new FacultyRule],
                'skillCardNumber' => ['sometimes', new UniquePerCenter(Student::class, $student_id, 'students', false)],
            ];
        }
    }

}
