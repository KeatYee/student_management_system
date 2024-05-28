<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark text-white py-5 text-center">
        <h1>Student Management System</h1>
        <p class="lead">Manage students, courses, exam marks, and reports with ease.</p>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">Manage student information.</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Go to Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">Manage course details.</p>
                        <a href="{{ route('courses.index') }}" class="btn btn-primary">Go to Courses</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Exam Marks</h5>
                        <p class="card-text">Manage exam marks.</p>
                        <a href="{{ route('marks.index') }}" class="btn btn-primary">Go to Exam Marks</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Reports</h5>
                        <p class="card-text">Generate and view reports.</p>
                        <a href="{{ route('reports.index') }}" class="btn btn-primary">Go to Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
