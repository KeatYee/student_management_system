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
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('marks.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Mark</h3>

                    </div>
                    <form action="{{ route('marks.update',$mark->id) }}" method="post">
                        @method('put')
                        @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="course" class="@error('course') is-invalid @enderror form-label h5">Select Course</label>
                            <select class="form-select form-select-lg" name="course_id" id="course">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $mark->course_id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="student" class="@error('student') is-invalid @enderror form-label h5">Select Student</label>
                            <select class="form-select form-select-lg" name="student_id" id="student">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}" {{ $student->id == $mark->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="marks" class="form-label h5">Marks</label>
                            <input type="number" placeholder="Marks" class="@error('marks') is-invalid @enderror form-control form-control-lg"
                            name="marks" id="marks" min="0" value="{{old('marks',$mark->marks)}}">
                                @error('marks')
                                    <p class="invalid-feedback">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Update</button>
                        </div>

                    </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

  

</body>
</html>