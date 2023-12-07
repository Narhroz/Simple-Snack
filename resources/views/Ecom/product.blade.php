@extends('layouts.product')
@section('product')
@foreach ($barang as $items)
    <div class="containerp">
        {{-- @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif --}}
        <div class="card">
            <img src="{{ asset('uploaded-images/'.$items->image) }}" alt="">
            <div class="content">
                <div class="review-container">
                    <div class="stars">
                        <span>Reviews</span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <h5 class="price">Rp.{{ $items->Harga }}</h5>
                <h4 class="Nama">{{ $items->Nama_barang }}</h4>
                <div class="description">
                    <p>{{ $items->Deskripsi }}</p>
                </div>
                <div class="button-container">
                    {{-- <div class="buy-button">
                        <a href="#"><p>Buy</p></a>
                    </div> --}}
                    <div class="card-button">
                        @if ($items->stock == 'Habis')
                            <button class="btn btn-danger btn-sm">Barang Habis</button>
                        @elseif ($items->stock == 'Ada')
                            <form action="{{ url('addcart',$items->Id) }}" method="post">
                                @csrf
                                <input type="number" name="Qty" value="1" min="1" class="form-control" style="width: 100px; background:white; color:black;">
                                <input type="submit" value="Add to cart">
                            </form>
                            <div class="cart-icon">
                                <ion-icon name="cart-outline"></ion-icon>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection