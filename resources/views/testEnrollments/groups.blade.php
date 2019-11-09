@extends('layouts.app')

@section('content')
    <h1>Groups</h1>
    @if(count($groups) > 0)
        @foreach($groups as $group)
            {{ Form::open([
                'action'=>['TestEnrollmentController@store'
                ,$studentId,$group->id], 
                'method' => 'POST']) }}

                {{Form::label('id',$group->id)}}
                
    
                {{Form::submit('create',['class' => 'btn btn-primary'])}}
            {{  Form::close() }}
        @endforeach
    @else
        <p>No groups found</p>
    @endif
@endsection