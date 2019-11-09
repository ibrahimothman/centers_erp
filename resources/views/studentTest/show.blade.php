@extends('layouts.app')

@section('content')
    <h1>Students enrolling in this test</h1>
    @if(count($students) > 0)
        @foreach($students as $student)
            <div class="well">
                <div class="row">
                
                    <div class="col-md-8 col-sm-8">
                        <small>{{$student->nameEn}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No students have enrolled in this test</p>
    @endif
@endsection