<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="bg-dark py-3">
    <h3 class="text-white text-center">Student Management System</h3>
</div>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="row justify-content-between">
            <div class="col-md-2 d-flex justify-content-start">
                <a href="{{ route('main') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header bg-dark d-flex justify-content-between">
                    <h3 class="text-white">Average Marks per Student</h3>
                    <a href="{{ route('reports.studentAverages.csv') }}" class="btn btn-light">Export CSV</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Student Name</th>
                            <th>Average Marks</th>
                        </tr>
                        @foreach ($studentAverages as $average)
                        <tr>
                            <td>{{ $average['student']->name }}</td>
                            <td>{{ number_format($average['average_marks'], 2) }}</td>
                        </tr>
                        @endforeach
                       
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header bg-dark d-flex justify-content-between">
                    <h3 class="text-white">Average Marks per Course</h3>
                    <a href="{{ route('reports.courseAverages.csv') }}" class="btn btn-light">Export CSV</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Course Name</th>
                            <th>Average Marks</th>
                        </tr>
                        @foreach ($courseAverages as $average)
                        <tr>
                            <td>{{ $average['course']->name }}</td>
                            <td>{{ number_format($average['average_marks'], 2) }}</td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
