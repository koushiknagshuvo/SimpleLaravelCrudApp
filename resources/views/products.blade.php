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

            <a href="{{ route('add.product') }}" class="btn btn-primary my-4">Create</a>
        </div>
        <table class="table">
            @if (Session::has('msg'))
                <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row"> {{ $key + 1 }}</th>
                        <td><img style="width:100px" src="{{ asset('image/products/' . $product->image) }}"
                                alt="" srcset="">
                        </td>
                        <td>{{ $product->name }}</td>

                        <td>
                            <div>
                                <a href="{{ route('edit.product', $product->id) }}" class="btn btn-success ">Edit</a>
                                <a href="{{ route('delete.product', $product->id) }}"
                                    onclick=" return confirm('Are you Sure to Delete ? ')" class="btn btn-danger">
                                    Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
