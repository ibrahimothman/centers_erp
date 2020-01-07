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
        if (!is_dir(public_path($dir))) {
            mkdir(public_path($dir));
        }

        // loop through images, move it to courses dir then save it into db
        $basename = Str::random();
        $original = $basename . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($dir), $original);
        return $original;
    }

    public static function deleteImages($dir, $images)
    {
        foreach ($images as $image) {
            File::delete([
                public_path($dir."/".$image->url)
            ]);
        }
    }
}
