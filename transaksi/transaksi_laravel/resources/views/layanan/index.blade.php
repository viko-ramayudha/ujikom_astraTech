@extends('layouts.app')

@section('content')
<head>
    <!-- Style CSS di sini -->
    <style>
        .bckg {
            padding: 50px;
            padding-bottom: 190px;
            background-color: #FFEFEF;
        }
        .card {
            
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            overflow: hidden;
            width: 90%;
            height: 90%;
        }
        .card-body {
            padding: 20px 30px;
            align-self: center;
        }
       
        .card-img-top {
            margin-top: 15px;
            width: 50%;
            height: 160px;
            object-fit: cover;
            border-radius: 50%; /* membuat gambar bulat */
            align-self: center;
        }
        .card-title {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center
        }
        .card-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 3px;
            font-weight: '600';
            text-align: center
        }
        .btn-lay {
            background-color: #e0004d;
            border: none;
            color: #fff;
            padding: 10px 70px;
            
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            margin-right: 5px;
            margin-top: 20px;
            margin-bottom: 18px;
        }
        .btn-lay a {
            text-decoration: none;
            color: #fff;
        }
        .btn-lay:hover {
            background-color: transparent;
            border: 1px solid #e0004d;
            color: #e0004d;
            padding: 9px 69px;
            
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            margin-right: 5px;
            margin-top: 20px;
            margin-bottom: 18px;
        }
        .btn-lay a:hover {
            text-decoration: none;
            color: #e0004d;
        }
    </style>
</head>
<div class="bckg">
    <div class="container">
    <h3 class="mt-4" style="text-align: left; font-weight: bold; margin-bottom: 40px; font-size: 30px; color: #939185">Detail Layanan Halodoc</h3>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success')}}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error')}}</div>
        @endif
        <!-- <nav class="navbar navbar-light">
            <form class="form-inline">
                <div class="input-group">
                    <input style="background-color: #f0f0f0; margin-bottom: 8px;" type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>
        </nav> -->

        <div class="row">
            @forelse ($layanan as $layanans)
                <div class="col-md-4">
                    <div class="card">
                        <!-- Example image from URL, replace with actual image URL from your data -->
                        <img class="card-img-top" src="{{ $layanans->url }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $layanans->nama_layanan }}</h5>
                            <p class="card-text">Kategori: {{ $layanans->kategori->nama_kategori }}</p>
                            <p class="card-text">Spesialisasi: {{ $layanans->id_spesialisasi }}</p>
                            <p class="card-text">Harga: {{ $layanans->harga }}</p>
                            <button class="btn-lay">
                                <!-- <a href="{{ route('transaksi.create') }}" >Lanjut Transaksi</a> -->
                                <a href="{{ route('transaksi.create', ['id_layanan' => $layanans->id_layanan, 'harga' => $layanans->harga]) }}">Lanjut Transaksi</a>
                            </button>
                            
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p>No products found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
