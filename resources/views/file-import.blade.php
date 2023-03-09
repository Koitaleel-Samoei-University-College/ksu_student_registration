@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <ul class="list-group">
                    <a href="{{route('file-import')}}" class="list-group-item"><i class="bi bi-cloud-upload"></i>  Upload KUCCPS LIST</a>
                    <li class="list-group-item">Admission Letters</li>
                    <a href="{{route('students')}}" class="list-group-item"> <i class="bi bi-card-list"></i> Student List</a>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('KUCCPS File Import') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                    <div class="custom-file text-left">
                                        <label class="form-label" for="customFile">Choose file</label>
                                        <input type="file" name="file" class="form-control" id="customFile">
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
