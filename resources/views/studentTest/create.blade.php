@extends('layouts.app')

@section('content')
    <h1>Tests</h1>
    @if(count($tests) > 0)
        @foreach($tests as $test)
            <h1>{{$test->name}}</h1>
            {{ Form::open([
                'action'=>['StudentTestController@store','test_id' => $test->id,
                'student_id' => $student->id], 
                'method' => 'POST']) }}
    
                {{Form::submit('enroll',['class' => 'btn btn-primary'])}}
            {{  Form::close() }}

            {{ Form::open([
                'action'=>['StudentTestController@unEnroll','test_id' => $test->id,
                'student_id' => $student->id], 
                'method' => 'POST']) }}

                {{Form::hidden('_method','DELETE')}}
    
                {{Form::submit('unEnroll',['class' => 'btn btn-primary'])}}
            {{  Form::close() }}

        @endforeach
    @else
        <p>No posts found</p>
    @endif


