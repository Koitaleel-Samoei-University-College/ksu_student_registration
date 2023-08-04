@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('layouts.sidebar')
        <div class="col-md-8">
            <div class="card  border-success">
                <div class="card-header bg-transparent border-success">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h3>Download Statistics</h3>
                        <table class="table table-responsive table-bordered ">
                            <thead class="table-primary">
                            <tr>
                                <th>Program</th>
                                <th>Students Number</th>
                                <th>Male Students</th>
                                <th>Female Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($downloadCounts as $downloadCount)
                                <tr>
                                    <td>{{ $downloadCount->program }}</td>
                                    <td>{{ $downloadCount->student_count }}</td>
                                    <td>{{ $downloadCount->male_count }}</td>
                                    <td>{{ $downloadCount->female_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
