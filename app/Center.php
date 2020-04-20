<?php

namespace App;

use App\Events\NewCenterHasCreated;
use App\helper\ImageUploader;
use App\QueryFilter\Id;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Center extends ImageUploader
{
    protected $guarded = [];
    public static $ApiFields=['id','name'];
    // once center is created save it in session
    public static function allDiplomasEnrollments($center)
    {
        return app(Pipeline::class)
            ->send($center->diplomas()->with('groups.students'))
            ->through([
                Id::class
            ])
            ->thenReturn()->get();
    }

    public function setImageAttribute($image){
        $this->deleteImage($this->image);
        $original = $this->saveImage($image);
        return $this->attributes['image'] = url($this->getDir()."/".$original);

    }

    public function getRevenuesAttribute($revenues)
    {
        return json_decode($revenues, true);
    }

    public function getExpensesAttribute($expenses)
    {
        return json_decode($expenses, true);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function students()
    {
        return $this->belongsToMany(\App\Student::class)->latest()->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->latest();
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }



    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class)->latest();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function paymentModels()
    {
        return $this->hasMany(PaymentModel::class);
    }

    public function getDir()
    {
        // TODO: Implement getDir() method.
        return '/uploads/profiles';
    }
}
