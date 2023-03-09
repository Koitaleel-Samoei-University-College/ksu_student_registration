@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <ul class="list-group">
                    <a href="{{route('file-import')}}" class="list-group-item"><i class="bi bi-cloud-upload"></i> Upload KUCCPS LIST</a>
                    <li class="list-group-item"> <i class="bi bi-file-earmark-pdf"></i> Admission Letters</li>
                    <a href="{{route('students')}}" class="list-group-item"><i class="bi bi-card-list"></i> Student List</a>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="bi bi-people"></i> {{ __('Students List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Index Number</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Program</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$student->indexNumber}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->program}}</td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="mt-2">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
