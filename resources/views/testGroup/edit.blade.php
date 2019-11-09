@extends('layouts.app')

    @section('content')
        <h1>Edit The Group</h1>

        {{ Form::open([
                'action'=>['TestGroupController@update',$testGroup->id], 
                'method' => 'POST']) }}

                {{Form::label('titel','date')}}
                {{From::text('test_group_date',$testGroup->group_date)}}


                {{Form::label('titel','chairs')}}
                {{From::number('test_group_chairs',$testGroup->available_chairs)}}

                {{Form::label('titel','select hall')}}
                {{From::text('test_group_hall',$testGroup->hall_number)}}
    
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('update',['class' => 'btn btn-primary'])}}
            {{  Form::close() }}

    @endsection    