@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Generated Admission Letters') }}</div>

                    <div class="card-body">


                        <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Admission Number</th>
                            <th>Student Name</th>
                            <th>Index Number</th>
                            <th></th>
                        </tr>
                        </thead>
                            <tbody>
                            @foreach($admissions as $admission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$admission->admission_number}}</td>
                                <td>{{$admission->name}}</td>
                                <td>{{$admission->indexNumber}}</td>
                                <td><a href="{{route('letter_download', $admission->student_id)}}" class="btn btn-success btn-sm">Download Letter </a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $admissions ->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
