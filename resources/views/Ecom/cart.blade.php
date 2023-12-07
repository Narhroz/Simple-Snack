<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleh.css">
</head>

<body>
    @include('partials.nav')
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama penerima</th>
                <th>No Telp penerima</th>
                <th>Alamat penerima</th>
                <th>Barang</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        @if ($cart)
            <div class="table-section">
                @foreach ($cart as $items)
                    @php
                        $jumlah1 += $items->price * $items->Qty;
                    @endphp
                    <form action="{{ url('checkout', $items->id) }}" method="post">
                        @csrf
                        <tbody>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->phone }}</td>
                                <td>{{ $items->address }}</td>
                                <td>{{ $items->product_title }}</td>
                                <td>{{ $items->Qty }}</td>
                                <td>Rp.{{ number_format($items->price, 2) }}</td>
                                <td><img src="{{ asset('uploaded-images/' . $items->image) }}" alt=""></td>
                                <td><a href="/check/{{ $items->id }}" class="btn">
                                        <ion-icon name="pencil"></ion-icon>
                                    </a>
                                    <a href="/destroy/{{ $items->id }}" class="btn">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                @endforeach
            </div>
        </table>
        @endif

    @if (!isset($check))
        <h4 style="text-align: center">Tidak ada barang di keranjang</h4>
        <div class="kontener">
            <input type="button" value="Checkout" class=" btn btn-warning " onclick="openError()">
            <a href="{{ url()->previous() }}"><input type="button" value="Back" class="btn btn-danger"></a>
            <div class="error" id="error">
                <img src="img/error.png" alt="">
                <h2>Error</h2>
                <p>Tidak ada barang di dalam cart</p>
                <a href="/product"><button type="button" onclick="closeError()">Go shop some</button></a>
            </div>
        </div>
    @endif

    @if ($check)
        <div class="kontener">
            <div class="total">
                <p>Grand Total : Rp.{{ number_format($jumlah1, 2) }}</p>
            </div>
            <div class="submit">
                <input type="button" value="Checkout" class=" btn btn-warning" onclick="openPopup()">
                <a href="{{ url()->previous() }}"><input type="button" value="Back" class="btn btn-danger"></a>
            </div>
            <div class="popup" id="popup">
                <img src="img/verif.png" alt="">
                <h2>Thank you!</h2>
                <p>Your order has been successfully submitted please contact +62 895-3428-84129 for confirmation and
                    payment</p>
                <button type="submit" onclick="closePopup()">OK</button>
            </div>
        </div>
    @endif
    </form>
    <script type="text/javascript">
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }
        let error = document.getElementById("error");

        function openError() {
            error.classList.add("open-error");
        }

        function closeError() {
            error.classList.remove("open-error");
        }
    </script>
</body>

</html>
