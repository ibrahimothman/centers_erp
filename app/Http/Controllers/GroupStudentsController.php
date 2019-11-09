<?php

namespace App\Http\Controllers;

use App\Course;
use App\GroupStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Courses;
    private $groups;
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $this->Courses = DB::table('courses')->get();


        $this->groups = DB::table('groups')
            ->get();
        return view('courses/registerGroupStudent')
            ->with("Courses",$this->Courses)
            ->with("groups",$this->groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'studentName'=>'required',
            'group'=>'required',
        ]);

        $groupStudent=new GroupStudent();
        $groupStudent->student_id=request('studentName');
        $groupStudent->group_id=request('group');
        //$groupStudent->save();

        return redirect('groupStudents/create')
            ->with('message','group students registered successfully '.$request->course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function search(Request $request)
    {
        $search = $request->get('term');
        $groups = DB::table('students')
            ->where('nameEn','LIKE','%'.$search.'%')
            ->get();
        return response()->json($groups);

    }
}
