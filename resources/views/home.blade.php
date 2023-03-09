@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <a href="{{route('file-import')}}" class="list-group-item"><i class="bi bi-cloud-upload"></i> Upload KUCCPS LIST</a>
                <li class="list-group-item"> <i class="bi bi-file-earmark-pdf"></i> Admission Letters</li>
                <a href="{{route('students')}}" class="list-group-item"> <i class="bi bi-card-list"></i> Student List</a>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
