<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Course;
use App\Models\Mark;

class MarkController extends Controller
{
    //This method will show marks page
    public function index(){
        // Eager load student and course relationships
        $marks = Mark::with(['student', 'course'])->get();
        return view('marks.list', [
            'marks' => $marks
        ]);
    }

    //This method will show create mark page
    public function create(){

        //fetch courses and students from db
        $courses = Course::all();
        $students = Student::all();

        return view('marks.create', [
            'courses' => $courses,
            'students' => $students
        ]);
    }

    //This method will store a mark in db
    public function store(Request $request){
        $rules=[
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'marks' => 'required|numeric|min:0|max:100'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('marks.create')->withInput()->withErrors($validator);

        }

        //insert mark in db
        $mark = new Mark();
        $mark->course_id = $request->course_id;
        $mark->student_id = $request->student_id;
        $mark->marks = $request->marks;
        $mark->save();

        return redirect()->route('marks.index')->with('success','Mark added successfully.');
    }

    //This method will show edit marks page
    public function edit($id){
         //fetch courses and students from db
         $courses = Course::all();
         $students = Student::all();

        $mark = Mark::findOrFail($id);

        return view('marks.edit',[
            'mark' => $mark,
            'courses' => $courses,
            'students' => $students
        ]);
        
    }

    //This method will update a mark
    public function update($id, Request $request){
        $mark = Mark::findOrFail($id);
        $rules=[
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'marks' => 'required|numeric|min:0|max:100'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('marks.edit', $mark->id)->withInput()->withErrors($validator);

        }

        //update the mark in db
        $mark->course_id = $request->course_id;
        $mark->student_id = $request->student_id;
        $mark->marks = $request->marks;
        $mark->save();

        return redirect()->route('marks.index')->with('success','Mark updated successfully.');
   
    }

    //This method will delete a mark
    public function destroy($id){
        $mark = Mark::findOrFail($id);

        //delete mark from db
        $mark->delete();

        return redirect()->route('marks.index')->with('success','Mark deleted successfully.');
    }


}
