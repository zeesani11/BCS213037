<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url("{{ asset('images/home-background.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            padding-top: 50px; /* Ensure content doesn't overlap with navbar */
        }

        .gallery-image {
            height: 150px;
            object-fit: cover;
            border-radius: 10px 10px 0 0; /* Rounded corners on top */
        }

        .card {
            border-radius: 10px;
            overflow: hidden; /* Ensures rounded corners */
            transition: transform 0.3s ease; /* Smooth transition on hover */
        }

        .card:hover {
            transform: translateY(-5px); /* Lifts the card on hover */
        }
    </style>
</head>
<body>
    <div style="margin-top: -60px;">
    @include('layouts.userheader') 
    </div>
    @if(session('status'))
    <div class="alert alert-danger mt-3">
        {{ session('status') }}
    </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            @foreach($resorts as $resort)
                @if($resort)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/'.$resort->file_name) }}" alt="" class="card-img-top gallery-image">
                            <div class="card-body">
                                <h5 class="card-title">Price: {{ $resort->price }}</h5>
                                <p class="card-text">Address: {{ $resort->address }}</p>
                                <form action="{{ route('user.resort.order') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Order Resort</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-TmFYZqNvZt6V7HVFjp3Hv+X3+FSjIzJv1V+1jBCf5Zbh1GJw5+6t6dUxt0tkoKqD" crossorigin="anonymous"></script>
</body>
</html>
