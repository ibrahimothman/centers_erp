
<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>

<div class="form-style-5">
    <span style="font-family: 'Courier New';font-size: 20px;font-weight: bold">create a student </span> <br><br><br>
@extends('layouts.app')
    @section('content')
{{ Form::open(
    ['action' =>'StudentController@store', 'method' => 'POST']) }}


    <div class = "form_group">
        {{From::label('title','name in arabic')}}
        {{Form::text('nameAr','',['class' => 'form-control','placeholder'=>'Your name in arabic'])}}
    </div>

    <div class = "form_group">
    	{{From::label('title','name in English')}}
    	{{Form::text('nameEn','',['class' => 'form-control','placeholder'=>'Your name in english'])}}
    </div>

    <div class = "form_group">
    	{{From::label('title','Email')}}
    	{{Form::text('email','',['class' => 'form-control','placeholder'=>'Your Email'])}}
    </div>

    <div class = "form_group">
    	{{From::label('title','password')}}
    	{{Form::password('password',['class' => 'form-control','placeholder'=>'Your password'])}}

    </div>

    <div class = "form_group">
    	{{From::label('title','phone number')}}
    	{{Form::text('phoneNumber' ,'',['class' => 'form-control','placeholder'=>'Your phone number'])}}
    </div>
    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
{{  Form::close() }}

@endsection
