<?php

namespace App\Exports;

use App\Models\Exam;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportScoreByStudent implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Student Name',
            'Total Courses',
            'Courses',
            'Average Score'
        ];
    }

    public function collection()
    {
        $scoreByStudents = Exam::get()->groupBy('student_name');
        $collection = [];

        foreach ($scoreByStudents as $scoreByStudent) {
            $courses = "";
            foreach ($scoreByStudent as $x) {
                $courses = $courses == "" ? $x["course_name"] : $courses . "," . $x["course_name"];
            }
            array_push($collection, [
                "course_name" => $scoreByStudent[0]['student_name'],
                "total_students" => count($scoreByStudent),
                "courses" =>  $courses,
                "average_score" => round($scoreByStudent->avg('score'), 2),
            ]);
        }

        return collect([$collection]);
    }
}
