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
        <div class="heading">Edit products</div>
        <form action="/admin/update/{{ $data->Id }}" method="post">
            @csrf
                <div class="card-details">
                    <div class="card-box">
                        <span class="details">Nama barang</span>
                        <input type="text" placeholder="Items" name="Nama_barang" value="{{ $data->Nama_barang }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Harga barang</span>
                        <input type="number" placeholder="Price" name="Harga" value="{{ $data->Harga }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Deskripsi barang</span>
                        <input type="text" placeholder="Description" name="Deskripsi" value="{{ $data->Deskripsi }}">
                    </div>
                    <div class="card-box">
                        <span class="details">Stock barang</span>
                        <select name="stock" id="stock" value="{{ $data->stock }}" class="form-control">
                            <option value="Ada">Ada</option>
                            <option value="Habis">Habis</option>
                        </select>
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