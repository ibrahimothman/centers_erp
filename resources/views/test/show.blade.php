@extends('layouts.app')

@section('content')
    @if(!is_null($test))
        <a href="/Test" class="btn btn-default">Go Back</a>
        <h1>{{$test->name}}</h1>
        <br><br>
        
        <hr>
        <small>Description : {{$test->description}}</small>
        <hr>
        <hr>
        <small>Cost : {{$test->cost}} EGP</small>
        <hr>
        <hr>
        <small>Date : {{$test->test_date}}</small>
        <hr>
        <hr>
        <small>Retake : {{$test->retake==1? 'Yes':'No'}}</small>
        <hr>
        <a href="/Test/{{$test->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open([
            'action' => ['TestController@destroy', $test->id],
             'method' => 'POST', 
             'class' => 'pull-right'
             ])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

        <br><br>

        {!!Form::open([
            'action' => ['TestGroupController@getTestGroups',$test->id],
            'method' => 'GET'
            ])!!}
                    
            {{Form::submit('Groups', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}        
    @else
        <p>test not found</p>      
    @endif    
@endsection