@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Exam List</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('exam.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Add Exam
        </a>
    </div>
    <div class="clearfix"></div>
</div>

@foreach ($exams as $exam)
<div class="card">
    <div class="card-header">
        {{ $exam->course_name }}
    </div>
    <div class="card-body">
        <div class="card-text">
            <div class="float-start">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Student Name</th>
                            <td>{{ $exam->student_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Exam</th>
                            <td>{{ $exam->score }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="float-end">
                <a href="{{ route('exam.edit', $exam->id) }}" class="btn btn-success">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <form action="{{ route('exam.destroy', $exam->id) }}" style="display: inline" method="POST">
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

@if (count($exams) === 0)
<div class="alert alert-danger p-2">
    No Exam Found.
</div>
@endif

@endsection