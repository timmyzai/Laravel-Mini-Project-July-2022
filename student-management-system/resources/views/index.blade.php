@extends('layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Students List</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('student.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Create Task
        </a>
    </div>
    <div class="clearfix"></div>
</div>

@foreach ($students as $student)
<div class="card">
    <div class="card-header">
        {{ $student->name}}

        <span class="badge rounded-pill bg-warning text-dark">
            Created at: {{ $student->created_at }}
        </span>
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>{{ $student->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{ $student->phone_number }}</td>
                        </tr>
                    </tbody>
                </table>
                <small>Last Updated - {{ $student->updated_at->diffForHumans() }}</small>
                <br><br>
            </div>
            <div class="float-end">
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">
                    Edit
                </a>
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-danger">
                    Delete
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach

@endsection