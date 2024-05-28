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
                <a href="{{route('courses.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Course</h3>

                    </div>
                    <form action="{{route('courses.store')}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label h5">Name</label>
                            <input type="text" value="{{old('name')}}" class="@error('name') is-invalid @enderror 
                            form-control form-control-lg" placeholder="Name" name="name">
                            @error('name')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Submit</button>
                        </div>

                    </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

  

</body>
</html>