
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

                        <form method="POST" action="{{route('programs.store')}}">
                            @csrf
                            <div class="mt-3">
                                <label>School</label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror" value="{{ old('school_name') }}" name="school_name" required >
                                @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label>Program Name</label>
                                <input type="text" class="form-control @error('program_name') is-invalid @enderror" value="{{ old('program_name') }}" name="program_name" required>
                                @error('program_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3 mb-2">
                                <label>Program Code</label>
                                <input type="text" class="form-control @error('program_code') is-invalid @enderror" value="{{ old('program_code') }}" name="program_code" required>
                                @error('program_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <dib class="mt-3 mb-3">
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </dib>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

