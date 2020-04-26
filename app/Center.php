<?php

namespace App;

use App\Events\NewCenterHasCreated;
use App\helper\ImageUploader;
use App\QueryFilter\GroupId;
use App\QueryFilter\Id;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Center extends ImageUploader
{
    protected $guarded = [];
    public static $ApiFields=['id','name'];


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
        return $this->belongsToMany(\App\Student::class)->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }

    public function diplomasIds()
    {
        return $this->diplomas->pluck('id');
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
