<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Exports\exportScoreByCourse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\exportScoreByStudent;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoreByCourses = Exam::get()->groupBy('course_name');
        $scoreByStudents = Exam::get()->groupBy('student_name');
        // return $scoreByCourses;
        return view('report/index', compact('scoreByCourses', 'scoreByStudents'));
    }

    public function exportScoreByCourse()
    {
        return Excel::download(new exportScoreByCourse, 'average_score_by_course.csv');
    }

    public function exportScoreByStudent()
    {
        return Excel::download(new exportScoreByStudent, 'average_score_by_student.csv');
    }
}
