<?php

namespace App\Http\Controllers;

use App\StatementTemplate;
use App\Student;
use App\Test;
use App\TestStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestStatementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = auth()->user()->center->tests;
        return view('statement/editor',compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request()->ajax()){
           $test_id = request()->get('test_id');
           $body = request()->get('body');
        }
        Test::findOrFail($test_id)->statement()->create(['body' => $body]);
        return 'successfully added';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TestStatement $testStatement)
    {
        $this->authorize('view',$testStatement);
        return view('statement/statementPreview')
            ->with('statement',$testStatement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function previewStatement(TestStatement $statement, Student $student)
    {

        $statement->body = $this->parseStatement($statement, $student);
        return view('statement/statementPreview')
            ->with('statement',$statement);
    }

    private function parseStatement($statement, $student)
    {

        if (strpos($statement->body, '@اسم الطالب') !== false) {
            $statement->body=str_replace('@اسم الطالب',$student->nameAr,$statement->body);
        }

        if (strpos($statement->body, '@اسم المركز') !== false) {
            $statement->body=str_replace('@اسم المركز',$statement->test->center->name,$statement->body);
        }
        if (strpos($statement->body, '@اسم المدير') !== false) {
            $statement->body=str_replace('@اسم المدير',' محمد احمد',$statement->body);
        }if (strpos($statement->body, '@التاريخ') !== false) {
            $date=date('d-m-y');
            $statement->body=str_replace('@التاريخ',$date,$statement->body);
        }

        return $statement->body;

    }
}
