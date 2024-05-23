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
                            <a href="{{route('programs.index')}}" class="btn btn-warning btn-sm">Programs</a>
                        </div>

                            <form method="POST" action="{{ route('programs.update', $program->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="school_name">School Name:</label>
                                    <input type="text" name="school_name" id="school_name" class="form-control" value="{{ old('school_name', $program->school_name) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="program_name">Program Name:</label>
                                    <input type="text" name="program_name" id="program_name" class="form-control" value="{{ old('school_name', $program->program_name) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="program_code">Program Code:</label>
                                    <input type="text" name="program_code" id="program_code" class="form-control" value="{{ old('school_name', $program->program_code) }}">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Program</button>
                                </div>
                            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
