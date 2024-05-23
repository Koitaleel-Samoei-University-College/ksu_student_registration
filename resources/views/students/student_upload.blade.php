@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="bi bi-file-earmark-excel"></i> {{ __('Import Student List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form action="{{ route('students_import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                <div class="custom-file text-left">
                                    <label class="form-label" for="customFile">Choose file</label>
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="customFile" >
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-cloud-upload"></i> Import data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
