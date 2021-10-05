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


    <h1>Laravel Crud System Edit</h1>
    <div class="container">
        <a href="{{ url('/') }}" class="btn btn-primary"> Show Data</a>
    </div>

    <div class="container">

        @if ($errors->any())
        <div class="alert alert-danger my-5">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Session:: has('status'))
        <p class=" alert alert-primary mt-3 p-2  ">{{ Session::get('status') }}</p>
        @endif

        <form action="{{ url('/updateData/'.$editView->id) }}" class=" " method="post">


            @csrf

            <div class="form-group">
                <label for=""> Enter Your name</label>
                <input type="text" class="form-control" name="name" value="{{$editView->name}}" placeholder="Enter your name">

                @error('name')
                <span class="text-danger"> {{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for=""> Discription</label>
                <input type="text" class="form-control" name="discription" value="{{$editView->discription}}" placeholder="Enter discription">
                {{-- <textarea type="text-area" class="form-control" name="discription" value="{{ $editView->discription }}" placeholder="Discription" rows="5"></textarea> --}}

                @error('discription')
                <span class="text-danger"> {{ $message }}</span>
                @enderror

            </div>
            <input type="submit" class="btn btn-primary" value="Submit">

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>

