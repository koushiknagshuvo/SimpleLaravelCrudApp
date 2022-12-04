<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="h1 text-center my-4 ">
            CRUD APP - KOUSHIK
            <br>

            <a href="{{ route('all.product') }}" class="btn btn-primary my-4">Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('msg'))
                <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control my-2">
                </div>
                <div class="form-group my-4">
                    <label for="">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control my-2">
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
