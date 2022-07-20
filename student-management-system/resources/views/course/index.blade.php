@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Courses List</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('course.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Add Course
        </a>
    </div>
    <div class="clearfix"></div>
</div>

@foreach ($courses as $course)
<div class="card">
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Course</th>
                            <td>{{ $course->course_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="float-end">
                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <form action="{{ route('course.destroy', $course->id) }}" style="display: inline" method="POST">
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

@if (count($courses) === 0)
<div class="alert alert-danger p-2">
    No Course Found.
</div>
@endif

@endsection