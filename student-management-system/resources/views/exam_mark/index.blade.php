@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Exam Mark List</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('exam_mark.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Add Exam Mark
        </a>
    </div>
    <div class="clearfix"></div>
</div>

@foreach ($exam_marks as $exam_mark)
<div class="card">
    <div class="card-header">
        {{ $exam_mark->course_name }}
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Student Name</th>
                            <td>{{ $exam_mark->student_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Exam_mark</th>
                            <td>{{ $exam_mark->score }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="float-end">
                <a href="{{ route('exam_mark.edit', $exam_mark->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <form action="{{ route('exam_mark.destroy', $exam_mark->id) }}" style="display: inline" method="POST">
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

@if (count($exam_marks) === 0)
<div class="alert alert-danger p-2">
    No Exam Mark Found.
</div>
@endif

@endsection