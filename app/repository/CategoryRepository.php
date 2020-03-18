<?php


namespace App\repository;


use App\Center;

class CategoryRepository
{

    public static $__instance;
    private function __construct(){}

    public static function getInstance()
    {
        if(is_null(self::$__instance)) self::$__instance = new CategoryRepository();
        return self::$__instance;
    }

    public function allCategories()
    {
        $center = Center::findOrFail(Session('center_id'));
        $categories = $center->categories()->with('children')->where('parent_id', null)->get();
        return $categories;
    }

}
