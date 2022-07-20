<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Exam_mark;
use Illuminate\Http\Request;

class ExamMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_marks = Exam_mark::orderBy('score')->get();
        $students = Student::get();
        $courses = Course::get();
        return view('exam_mark/index', compact('exam_marks', 'students', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $courses = Course::get();
        return view('exam_mark/create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required',
            'student_name' => 'required',
            'course_name' => 'required'
        ]);

        $exam_mark = new Exam_mark();
        $exam_mark->student_name = $request->student_name;
        $exam_mark->course_name = $request->course_name;
        $exam_mark->score = $request->score;
        $exam_mark->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam_mark = Exam_mark::findOrFail($id);
        $students = Student::get();
        $courses = Course::get();

        return view('exam_mark/edit', compact('exam_mark', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'score' => 'required',
            'student_name' => 'required',
            'course_name' => 'required'
        ]);

        $exam_mark = Exam_mark::findOrFail($id);
        $exam_mark->student_name = $request->student_name;
        $exam_mark->course_name = $request->course_name;
        $exam_mark->score = $request->score;
        $exam_mark->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam_mark = Exam_mark::findOrFail($id);
        $exam_mark->delete();
        return redirect()->route('index');
    }
}
