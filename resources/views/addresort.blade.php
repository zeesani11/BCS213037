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
        }

    
        .main {
            position: relative;
            z-index: 1;
        }

        .gallery-image {
            width: 303px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    @include('layouts.adminheader')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6" style="margin-top: -658px;">
                <h2 class="text-center mb-4 text-light" style="font-weight: bolder;font-size: 44px;background: #525275;">Upload New ReSort</h2>
                <form action="{{ route('store.resort')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="photo" class="form-label text-light">Upload File</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label text-light">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label text-light">Price</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-block" value="Upload">
                    </div>
                </form>
            </div>
        </div><br>
        <div class="row" style="margin-top: -263px;">
            @foreach($resorts as $resort)
                @if($resort)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/'.$resort->file_name) }}" alt="" class="card-img-top gallery-image">
                            <div class="card-body">
                            <h5 class="card-title">Price: {{ $resort->price }}</h5>
                            <h5 class="card-title">Address: {{ $resort->address }}</h5>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('delete.resort',$resort->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        </div>
    </div>
</body>
</html>