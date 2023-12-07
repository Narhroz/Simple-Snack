<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/addf.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="container">
        <div class="heading">Edit products</div>
        <form action="/new/{{ $data->id }}" method="post">
            @csrf
                <div class="card-details">
                    <div class="card-box">
                        <span class="details">Nama penerima</span>
                        <input type="text" placeholder="Nama" name="name" value="{{ $data->name}}">
                    </div>
                    <div class="card-box">
                        <span class="details">No Telp</span>
                        <input type="text" placeholder="Phone" name="phone" value="{{ $data->phone }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Alamat</span>
                        <input type="text" placeholder="Address" name="address" value="{{ $data->address }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Quantity</span>
                        <input type="number" min="1" placeholder="Qty" name="Qty" value="{{ $data->Qty }}">
                    </div>
                    {{-- <div class="card-box">
                        <span class="details">Foto barang</span>
                        <input type="file" placeholder="Photo" name="image" value="{{ $data->asset('uploaded-images/'.$items->image) }}">
                    </div> --}}
                </div>
            <div class="button">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>
</html>