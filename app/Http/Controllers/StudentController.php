<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    //This method will show students page
    public function index(){
        $students = Student::orderBy('created_at','DESC')->get();
        return view('students.list',[
            'students' => $students
        ]);
    }

    //This method will show create student page
    public function create(){
        return view('students.create');
    }

    //This method will store a student in db
    public function store(Request $request){
        $rules=[
            'name' => 'required|min:5',
            'gender' => 'required|in:male,female'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('students.create')->withInput()->withErrors($validator);

        }

        //insert student in db
        $student = new Student();
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.index')->with('success','Student added successfully.');
    }

    //This method will show edit students page
    public function edit($id){
        $student = Student::findOrFail($id);

        return view('students.edit',[
            'student' => $student
        ]);
        
    }

    //This method will update a student
    public function update($id, Request $request){
        $student = Student::findOrFail($id);
        $rules=[
            'name' => 'required|min:5',
            'gender' => 'required|in:male,female'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('students.edit', $student->id)->withInput()->withErrors($validator);

        }

        //update the student in db
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.index')->with('success','Student updated successfully.');
   
    }

    //This method will delete a student
    public function destroy($id){
        $student = Student::findOrFail($id);

        //delete student from db
        $student->delete();

        return redirect()->route('students.index')->with('success','Student deleted successfully.');
    }


}
