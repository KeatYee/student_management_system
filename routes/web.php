<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/**Route::get('/', function () {
    return view('welcome');
});**/

Route::get('/', function () {
    return view('main');
})->name('main');

Route::controller(StudentController::class)->group(function(){
    Route::get('/students','index')->name('students.index');
    Route::get('/students/create', 'create')->name('students.create');
    Route::post('/students','store')->name('students.store');
    Route::get('/students/{student}/edit', 'edit')->name('students.edit');
    Route::put('/students/{student}','update')->name('students.update');
    Route::delete('/students/{student}','destroy')->name('students.destroy');
    
});

Route::controller(CourseController::class)->group(function(){
    Route::get('/courses','index')->name('courses.index');
    Route::get('/courses/create', 'create')->name('courses.create');
    Route::post('/courses','store')->name('courses.store');
    Route::get('/courses/{course}/edit', 'edit')->name('courses.edit');
    Route::put('/courses/{course}','update')->name('courses.update');
    Route::delete('/courses/{course}','destroy')->name('courses.destroy');
});

Route::controller(MarkController::class)->group(function(){
    Route::get('/marks','index')->name('marks.index');
    Route::get('/marks/create', 'create')->name('marks.create');
    Route::post('/marks','store')->name('marks.store');
    Route::get('/marks/{mark}/edit', 'edit')->name('marks.edit');
    Route::put('/marks/{mark}','update')->name('marks.update');
    Route::delete('/marks/{mark}','destroy')->name('marks.destroy');
});

Route::controller(ReportController::class)->group(function(){
    Route::get('/reports','index')->name('reports.index');
    Route::get('/reports/student-averages/csv', 'exportStudentAveragesCsv')->name('reports.studentAverages.csv');
    Route::get('/reports/course-averages/csv', 'exportCourseAveragesCsv')->name('reports.courseAverages.csv');
});