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

    /*
     * @param $dir public path you want to save images inside
     * @param $images set of images you want to upload
     * @param $creator images' owner ex:(course,test or student)
     * */
    public static function saveImage($dir, $image)
    {
        // create courses dir if not existed
//        $path = base_path().'/public_html'.$dir;
        $path = public_path($dir);
        if (!is_dir($path)) {
            mkdir($path,0777,true);
        }

        // loop through images, move it to courses dir then save it into db
        $basename = Str::random();
        $original = $basename . '.' . $image->getClientOriginalExtension();

        $image->move($path, $original);
        return $original;
    }

    public static function deleteImage($dir, $image)
    {
        File::delete([
            public_path($dir."/".$image->url)
        ]);

    }
}
