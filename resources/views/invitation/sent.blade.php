@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Invitation to {{$invitation->email}} has successfully sent</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __("A fresh invitation link has been sent to $invitation->email .") }}
                            </div>
                        @endif

                        <a href="">{{ __('click here to resent the invitation') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
