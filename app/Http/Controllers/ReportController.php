<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    //This method will show reports page
    public function index(){
        // Retrieve all students and courses
        $students = Student::all();
        $courses = Course::all();

        // Calculate average marks per student
        $studentAverages = [];
        foreach ($students as $student) {
            $marks = Mark::where('student_id', $student->id)->get();
            $totalMarks = $marks->sum('marks');
            $count = $marks->count();
            $averageMarks = $count > 0 ? $totalMarks / $count : 0;
            $studentAverages[] = [
                'student' => $student,
                'average_marks' => $averageMarks,
            ];
        }

        // Calculate average marks per course
        $courseAverages = [];
        foreach ($courses as $course) {
            $marks = Mark::where('course_id', $course->id)->get();
            $totalMarks = $marks->sum('marks');
            $count = $marks->count();
            $averageMarks = $count > 0 ? $totalMarks / $count : 0;
            $courseAverages[] = [
                'course' => $course,
                'average_marks' => $averageMarks,
            ];
        }

        return view('reports.list', compact('studentAverages', 'courseAverages'));
    }

    //This method will export std aveg csv
    public function exportStudentAveragesCsv(){
        $students = Student::all();
        $studentAverages = [];
        foreach ($students as $student) {
            $marks = Mark::where('student_id', $student->id)->get();
            $totalMarks = $marks->sum('marks');
            $count = $marks->count();
            $averageMarks = $count > 0 ? $totalMarks / $count : 0;
            $studentAverages[] = [
                'student' => $student,
                'average_marks' => $averageMarks,
            ];
        }

        $csvData = "Student Name,Average Marks\n";
        foreach ($studentAverages as $average) {
            $csvData .= $average['student']->name . "," . number_format($average['average_marks'], 2) . "\n";
        }

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="student_averages.csv"',
        ]);
    }

    //This method will export course aveg csv
    public function exportCourseAveragesCsv(){
        $courses = Course::all();
        $courseAverages = [];
        foreach ($courses as $course) {
            $marks = Mark::where('course_id', $course->id)->get();
            $totalMarks = $marks->sum('marks');
            $count = $marks->count();
            $averageMarks = $count > 0 ? $totalMarks / $count : 0;
            $courseAverages[] = [
                'course' => $course,
                'average_marks' => $averageMarks,
            ];
        }

        $csvData = "Course Name,Average Marks\n";
        foreach ($courseAverages as $average) {
            $csvData .= $average['course']->name . "," . number_format($average['average_marks'], 2) . "\n";
        }

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="course_averages.csv"',
        ]);
    }
}
