<?php

namespace App\Http\Controllers;

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
        $math = Exam_mark::where('course_name', 'Math');
        $total_math_score = $math->sum('score');
        $total_math_student = $math->count();

        return view('report/index', compact('total_math_score', 'total_math_student'));
    }
}
