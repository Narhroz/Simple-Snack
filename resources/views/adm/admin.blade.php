<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    @include('partials.sidebaradm')
    @include('partials.admcard')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Items</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nama Barang</td>
                        <td>Harga</td>
                        <td>Deskripsi</td>
                        <td>Stock</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $items)
                        <tr>
                            <td><span class="status delivered">{{ $items->Id }}</span></td>
                            <td>{{ $items->Nama_barang }}</td>
                            <td>Rp.{{ number_format($items->Harga, 2) }}</td>
                            <td>{{ $items->Deskripsi }}</td>
                            <td>{{ $items->stock }}</td>
                            <td><a href="/admin/edit/{{ $items->Id }}" class="btn">
                                    <ion-icon name="pencil"></ion-icon>
                                </a></td>
                            <td><a href="/admin/destroy/{{ $items->Id }}" class="btn">
                                    <ion-icon name="trash"></ion-icon>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="d-flex justify-content-end">
                    {{ $barang->links() }}
                </div>
            </table>
        </div>
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>Recent Customers</h2>
            </div>
            @foreach ($users as $row)
                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBox">
                                <img src="{{ asset('img/default.png') }}" alt="">
                            </div>
                        </td>
                        <td>
                            <h4>{{ $row->name }} <br><span>{{ $row->email }}</span></h4>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
    </div>
    </div>
</body>

</html>
