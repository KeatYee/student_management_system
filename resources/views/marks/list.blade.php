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
                <div class="col-md-2">
                    <a href="{{ route('main') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <a href="{{ route('marks.create') }}" class="btn btn-dark">Create</a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif

            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Marks</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Marks</th>
                                <th>Created at</th>
                                <th width="60">Edit</th>
                                <th width="100">Delete</th>
                            </tr>
                            @if ($marks->isNotEmpty())
                            @foreach ($marks as $mark)
                            <tr>
                                <td>{{ $mark->id }}</td>
                                <td>{{ $mark->student->name }}</td>
                                <td>{{ $mark->course->name }}</td>
                                <td>{{ $mark->marks }}</td>
                                <td>{{ \Carbon\Carbon::parse($mark->created_at)->format('d M,Y') }}</td>
                                <td>
                                    <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-dark">Edit</a>
                                </td>
                                <td>
                                    <a href="#" onclick="deleteMark({{ $mark->id }})" class="btn btn-danger">Delete</a>
                                    <form id="delete-mark-form-{{ $mark->id }}" action="{{ route('marks.destroy', $mark->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>

<script>
    function deleteMark(id){
        if(confirm("Are you sure you want to delete mark?")){
            document.getElementById("delete-mark-form-"+ id).submit();
        }
    }
</script>
