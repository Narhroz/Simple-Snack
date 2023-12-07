<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/addf.css') }}" rel="stylesheet" type="text/css" >
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="heading">Add new products</div>
        <form action="/admin/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-details">
                <div class="card-box">
                    <span class="details">Nama barang</span>
                    <input class="form-control form-control-sm" type="text" placeholder="Items" name="Nama_barang">
                </div>
                <div class="card-box">
                    <span class="details">Harga barang</span>
                    <input class="form-control form-control-sm" type="number" placeholder="Price" name="Harga">
                </div>
                <div class="card-box">
                    <span class="details">Deskripsi barang</span>
                    <input class="form-control form-control-sm" type="text" placeholder="Description" name="Deskripsi">
                </div>
                <div class="card-box">
                    <span class="details">Foto barang</span>
                    <input type="file" class="form-control-file" placeholder="Photo" name="image">
                </div>
                <div class="card-box">
                    <span class="details">Stock barang</span>
                    <select name="stock" id="stock" class="form-control">
                        <option value="ada">Ada</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>
</body>
</html>