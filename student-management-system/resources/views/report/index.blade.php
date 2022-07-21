@extends('layouts/layout')

@section('content')

{{$scoreByCourses}}
<h4 class="pb-3">Average Score by Course Name</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Course Name</th>
            <th scope="col">Total Students</th>
            <th scope="col">Students</th>
            <th scope="col">Average Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scoreByCourses as $scoreByCourse)
        <tr>
            <td>{{$scoreByCourse[0]['course_name']}}</td>
            <td>{{ count($scoreByCourse)}}</td>
            <td>
            |   @foreach ($scoreByCourse as $x)
                {{$x["student_name"]}} |
                @endforeach
            </td>
            <td>{{ round($scoreByCourse->avg('score'),2); }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- {{$scoreByStudents}} -->

<h4 class="pb-3">Average Score by Student Name</h4>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Total Courses</th>
            <th scope="col">Courses</th>
            <th scope="col">Average Score</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scoreByStudents as $scoreByStudent)
        <tr>
            <td>{{$scoreByStudent[0]['student_name']}}</td>

            <td>{{ count($scoreByStudent)}}</td>
            <td>
            |   @foreach ($scoreByStudent as $x)
                {{$x["course_name"]}} |
                @endforeach
            </td>
            <td>{{ round($scoreByStudent->avg('score'),2); }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection