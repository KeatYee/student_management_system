<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;

class CourseController extends Controller
{
    //This method will show courses page
    public function index(){
        $courses = Course::orderBy('created_at','DESC')->get();
        return view('courses.list',[
            'courses' => $courses
        ]);
      
    }

    //This method will show create course page
    public function create(){
        return view('courses.create');
    }

    //This method will store a course in db
    public function store(Request $request){
        $rules=[
            'name' => 'required|min:5'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('courses.create')->withInput()->withErrors($validator);

        }

        //insert course in db
        $course = new Course();
        $course->name = $request->name;
        $course->save();

        return redirect()->route('courses.index')->with('success','Course added successfully.');
    }

    //This method will show edit courses page
    public function edit($id){
        $course = Course::findOrFail($id);

        return view('courses.edit',[
            'course' => $course
        ]);
        
    }

    //This method will update a course
    public function update($id, Request $request){
        $course = Course::findOrFail($id);
        $rules=[
            'name' => 'required|min:5'
        ];
        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('courses.edit', $course->id)->withInput()->withErrors($validator);

        }

        //update the course in db
        $course->name = $request->name;
        $course->save();

        return redirect()->route('courses.index')->with('success','Course updated successfully.');
   
    }

    //This method will delete a course
    public function destroy($id){
        $course = Course::findOrFail($id);

        //delete course from db
        $course->delete();

        return redirect()->route('courses.index')->with('success','course deleted successfully.');
    }
}
