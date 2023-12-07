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
    <style>
        btn {
            text-decoration: none;
        }
    </style>
    @include('partials.sidebaradm')
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Recent Order</h2>
                {{-- <a href="{{ route('register') }}" class="btn">Add</a> --}}
            </div>
            <table class="">
                <thead class="justify-content-end">
                    <tr>
                        <th>UID</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Produk</th>
                        <th>Banyak</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="justify-content-end">
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $item->uid }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->produk }}</td>
                            <td>{{ $item->Qty }}</td>
                            <td>Rp.{{ number_format($item->total, 2) }}</td>
                            {{-- <td>
                                                <a href="/profile/{{ $item->id }}" class="btn"><ion-icon name="pencil"></ion-icon></a>
                                            </td> --}}
                            <td>
                                <a href="/admin/hapus/{{ $item->id }}" class="btn">
                                    <ion-icon name="trash"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="d-flex justify-content-end">
                    {{ $order->links() }}
                </div>
            </table>
        </div>
    </div>
</body>

</html>
