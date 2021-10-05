<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset(./css/style.css) }}" type="text/css"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Hello, world!</title>
</head>



<body>


    <h1>Laravel Crud System View Data</h1>
    <div class="container">
        <a href="{{ url('/add') }}" class="btn btn-primary"> Add Data</a>
    </div>

    <div class="container">
       @if(Session:: has('status'))
       <p class=" alert alert-primary mt-3 p-2  ">{{ Session::get('status') }}</p>
       @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach($showData as $key => $value)
                <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->discription }}</td>
                    <td>
                      <a href="{{ url('/editData/'.$value->id) }}" class="btn btn-primary">Edit</a>

                      <a href="{{ url('/dalateData/'.$value->id) }}" onclick=" return confirm('Are you sure you want to')" class="btn btn-danger">Delete</a>


                    </td>



                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $showData->links() }}
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script>
      function confirmFun(){
        confirm("Are you sure you want to delete this data");
      }
    </script>

</body>
</html>
