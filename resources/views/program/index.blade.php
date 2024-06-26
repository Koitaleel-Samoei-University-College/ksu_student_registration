@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Program') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mt-2 mb-3">
                        <a href="{{route('programs.create')}}" class="btn btn-primary btn-sm">Add Program</a>
                        </div>

                        <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>School Name</th>
                                <th>Program Name</th>
                                <th>Program Code</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($programs as $program)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$program->school_name}}</td>
                                <td>{{$program->program_name}}</td>
                                <td>{{$program->program_code}}</td>
                                <td><a href="{{route('programs.edit', $program->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

