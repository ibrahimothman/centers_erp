<?php


namespace App\helper;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class ImageUploader extends Model
{

    public abstract function getDir();

    private function getPath()
    {
        return public_path($this->getDir());
    }

    public function saveImage($image)
    {
        // create courses dir if not existed
        $path = $this->getPath();
        if (!is_dir($path)) {
            mkdir($path,0777,true);
        }

        // loop through images, move it to courses dir then save it into db
        $basename = Str::random();
        $original = $basename . '.' . $image->getClientOriginalExtension();

        $image->move($path, $original);
        return $original;
    }

    public function deleteImage($image)
    {
        if($image) {
            $url = explode('/', $image)[5];
            File::delete([
                public_path($this->getDir() . "/" . $url)
            ]);
        }

    }

}
