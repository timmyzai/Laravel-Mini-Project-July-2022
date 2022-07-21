<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam_mark;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoreByCourses = Exam_mark::get()->groupBy('course_name');
        $scoreByStudents = Exam_mark::get()->groupBy('student_name');
        
        return view('report/index', compact('scoreByCourses', 'scoreByStudents'));
    }
}
