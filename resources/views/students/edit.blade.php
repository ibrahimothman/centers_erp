
<link href="{{asset('css/form.css')}}" rel="stylesheet" type="text/css"/>

<div class="form-style-5">
    <span style="font-family: 'Courier New';font-size: 20px;font-weight: bold">Edit student </span> <br><br><br>
@extends('layouts.app')
    @section('content')
{{ Form::open([
    'action' =>['StudentController@update',$student->id],
     'method' => 'POST']) }}


    <div class = "form_group">
        {{From::label('title','name in arabic')}}
        {{Form::text('nameAr',$student->nameAr)}}
    </div>

    <div class = "form_group">
        {{From::label('title','name in English')}}
        {{Form::text('nameEn',$student->nameEn)}}
    </div>

    <div class = "form_group">
        {{From::label('title','Email')}}
        {{Form::text('email',$student->email)}}
    </div>

    <div class = "form_group">
        {{From::label('title','password')}}
        {{Form::password('password')}}

    </div>

    <div class = "form_group">
        {{From::label('title','phone number')}}
        {{Form::text('phoneNumber',$student->phoneNumber)}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('UPDATE',['class' => 'btn btn-primary'])}}
{{  Form::close() }}

@endsection
