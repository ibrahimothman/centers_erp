@extends('layouts.app')

@section('content')
            
        <hr>
        <small>data : {{$testGroup->group_date}}</small>
        <hr>
        <hr>
        <small>chairs : {{$testGroup->available_chairs}}</small>
        <hr>
        <hr>
        <small>hall : {{$testGroup->hall_number}}</small>
        <hr>
        
        <a href="/test_group/{{$testGroup->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open([
            'action' => ['TestGroupController@destroy', $testGroup->id],
             'method' => 'POST', 
             'class' => 'pull-right'
             ])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}

        <br><br>

          
@endsection