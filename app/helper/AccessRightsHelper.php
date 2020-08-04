<?php


namespace App\helper;


use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;
use mysql_xdevapi\Session;

class AccessRightsHelper
{

    use HandlesAuthorization;

    public static function create($scope)
    {

        return Session('job_id') == 0  || collect(Job::findOrFail(Session('job_id'))->roles)
            ->where('scope', $scope)->pluck('value')[0][0] == 1;
    }

    public static function show($scope)
    {
        return Session('job_id') == 0 ? true : collect(Job::findOrFail(Session('job_id'))->roles)
            ->where('scope', $scope)->pluck('value')[0][1] == 1;
    }

    public static function update($scope)
    {
        return Session('job_id') == 0 ? true : collect(Job::findOrFail(Session('job_id'))->roles)
            ->where('scope', $scope)->pluck('value')[0][2] == 1;
    }

    public static function delete($scope)
    {
        return Session('job_id') == 0 ? true : collect(Job::findOrFail(Session('job_id'))->roles)
            ->where('scope', $scope)->pluck('value')[0][3] == 1;
    }

}
