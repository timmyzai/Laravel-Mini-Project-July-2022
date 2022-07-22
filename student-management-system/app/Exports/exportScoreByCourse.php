<?php

namespace App\Exports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportScoreByCourse implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Course Name',
            'Total Students',
            'Students',
            'Average Score'
        ];
    }

    public function collection()
    {
        $scoreByCourses = Exam::get()->groupBy('course_name');
        $collection = [];

        foreach ($scoreByCourses as $scoreByCourse) {
            $students = "";
            foreach ($scoreByCourse as $x) {
                $students = $students == "" ? $x["student_name"] : $students . "," . $x["student_name"];
            }
            array_push($collection, [
                "course_name" => $scoreByCourse[0]['course_name'],
                "total_students" => count($scoreByCourse),
                "students" =>  $students,
                "average_score" => round($scoreByCourse->avg('score'), 2),
            ]);
        }

        return collect([$collection]);
    }
}
