<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class Image extends Model
{
    //
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }

    public abstract function getDir();

    /*
     * @param $dir public path you want to save images inside
     * @param $images set of images you want to upload
     * @param $creator images' owner ex:(course,test or student)
     * */
    public  function saveImage($image)
    {
        // create courses dir if not existed
//        $path = base_path().'/public_html'.$this->getDir();
        $path = public_path($this->getDir());
        if (!is_dir($path)) {
            mkdir($path,0777,true);
        }

        // loop through images, move it to courses dir then save it into db
        $basename = Str::random();
        $original = $basename . '.' . $image->getClientOriginalExtension();

        $image->move($path, $original);
        return $original;
    }

    public function deleteImage()
    {
        $url = explode('/', $this->getImageUrl())[5];
//        dd($url);
        File::delete([
            public_path($this->getDir()."/".$url)
        ]);

    }

    public abstract function getImageUrl();

}
