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

        return
            Session('job_id') == 0
            || Job::findOrFail(Session('job_id'))->roles[$scope]['create'] == 'true';
    }

    public static function show($scope)
    {
        return Session('job_id') == 0
            || Job::findOrFail(Session('job_id'))->roles[$scope]['read'] == 'true';
    }

    public static function update($scope)
    {
        return Session('job_id') == 0
            || Job::findOrFail(Session('job_id'))->roles[$scope]['update'] == 'true';
    }

    public static function delete($scope)
    {
        return Session('job_id') == 0
            || Job::findOrFail(Session('job_id'))->roles[$scope]['delete'] == 'true';
    }

}
