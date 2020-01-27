<?php


namespace App;


interface Imagable
{

    public function saveImage($image);
    public function deleteImage($image);
    public function getDir();

}
