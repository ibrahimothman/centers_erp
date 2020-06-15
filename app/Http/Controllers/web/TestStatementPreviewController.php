<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\TestStatement;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class testStatementPreviewController extends Controller
{


    public function show(TestStatement $testStatement)
    {
        $statement= TestStatement::findOrFail($testStatement);

        $statement->body=$this->parseStatement($statement->body);

        return view('statement/statementPreview')
            ->with('statement',$statement);
    }




    public function parseStatement($statement){
        if (strpos($statement, '@اسم الطالب') !== false) {
            $statement=str_replace('@اسم الطالب','احمد خالد',$statement);
        }

        if (strpos($statement, '@اسم المركز') !== false) {
            $statement=str_replace('@اسم المركز','جيليكوم',$statement);
        }
        if (strpos($statement, '@اسم المدير') !== false) {
            $manger=Auth::user()->center->manager_name;
            $statement=str_replace('@اسم المدير',$manger,$statement);
        }if (strpos($statement, '@التاريخ') !== false) {
            $date=date('d-m-y');
            $statement=str_replace('@التاريخ',$date,$statement);
        }

        return $statement;
    }
}
