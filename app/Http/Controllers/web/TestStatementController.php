<?php

namespace App\Http\Controllers\web;

use App\Center;
use App\Http\Controllers\Controller;

use App\StatementTemplate;
use App\Student;
use App\Test;
use App\TestStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class TestStatementController extends Controller
{

    public function create()
    {
        $this->authorize('create',Test::class);
        $tests = $this->center->tests;
        return view('statement/editor',compact('tests'));
    }

    public function store()
    {
        if(request()->ajax()){
           $body = request()->get('body');
        }
        Center::findOrFail(Session('center_id'))->update([
            'statement' => request('body')
        ]);

        return response()->json('successfully added', 200);
    }


    public function show(TestStatement $testStatement)
    {
        $this->authorize('view',Test::class);
        return view('statement/statementPreview')
            ->with('statement',$testStatement);
    }




    public function previewStatement(Student $student)
    {
        $statement = $this->center->statement;
        $statement['body'] = $this->parseStatement($statement, $this->center,$student);
//        dd($statement['body']);

        return view('statement/statementPreview')
            ->with('statement',$statement);
    }

    private function parseStatement($statement, $center, $student)
    {

        if (strpos($statement['body'], '@اسم الطالب') !== false) {
            $statement['body']=str_replace('@اسم الطالب',$student->nameAr,$statement['body']);
        }

        if (strpos($statement['body'], '@اسم المركز') !== false) {
            $statement['body']=str_replace('@اسم المركز',$this->center->name,$statement['body']);
        }
        if (strpos($statement['body'], '@اسم المدير') !== false) {
            $manger=$this->center->manager_name;

            $statement['body']=str_replace('@اسم المدير',$manger,$statement['body']);
        }if (strpos($statement['body'], '@التاريخ') !== false) {
            $date=date('d-m-y');
            $statement['body']=str_replace('@التاريخ',$date,$statement['body']);
        }

        return $statement['body'];

    }
}
