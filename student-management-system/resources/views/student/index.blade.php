@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Students List</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('student.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Add Student
        </a>
    </div>
    <div class="clearfix"></div>
</div>

@foreach ($students as $student)
<div class="card">
    <div class="card-header">
        {{ $student->name }}

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
            </div>
            <div class="float-end">
                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <form action="{{ route('student.destroy', $student->id) }}" style="display: inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endforeach

@if (count($students) === 0)
<div class="alert alert-danger p-2">
    No Student Found.
</div>
@endif

@endsection