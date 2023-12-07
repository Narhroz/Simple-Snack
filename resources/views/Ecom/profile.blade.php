<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/addf.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="heading">Edit profile</div>
        <form action="/update/{{ $data->id }}" method="post">
            @csrf
                <div class="card-details">
                    <div class="card-box">
                        <span class="details">Nama</span>
                        <input type="text" placeholder="Nama" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Email" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Phone</span>
                        <input type="text" placeholder="Phone Number" name="phone" value="{{ $data->phone }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Address</span>
                        <input type="text" placeholder="Address" name="address" value="{{ $data->address }}">
                    </div>
                </div>
            <div class="button">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>
</html>