@extends('layouts/layout')

@section('content')
<div>
    <div class="float-start">
        <h4 class="pb-3">Add New Exam</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('exam.index') }}" class="btn btn-info">
            <i class="fa fa-arrow-left"></i> All Exam
        </a>
    </div>
    <div class="clearfix"></div>
</div>

<div class="card">
    <form class="p-3" action="{{ route('exam.store') }}" method="POST">
        <!-- csrf protection -->
        @csrf
        <div class="mb-3 row">
            <label for="student_name" class="col-sm-2 col-form-label">Student</label>
            <div class="col-sm-10">
                <select class="form-select" id="student_name" name="student_name">
                    @foreach ($students as $student)
                        <option value="{{ $student->name}}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="course_name" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">
                <select class="form-select" id="course_name" name="course_name">
                    @foreach ($courses as $course)
                        <option value="{{ $course->course_name}}">{{ $course->course_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="score" class="col-sm-2 col-form-label">Score</label>
            <div class="col-sm-10">
                <input type="text" pattern="[0-9]+" class="form-control" id="score" name="score" placeholder="Enter Score" required>
                <small id="passwordHelp" class="text-danger">
                    *Must be numbers.
                </small>
            </div>
        </div>

        <a href="{{ route('exam.index') }}" class="btn btn-secondary mr-2">
            <i class="fa fa-arrow-left"></i> Cancel
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check"></i> Save
        </button>
    </form>
</div>

@endsection