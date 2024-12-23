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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 90%;
            height: 90%;
        }
        .card-body {
            padding: 20px;
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
        .card-desk {
            font-size: 14.5px;
            color: #555;
            margin-bottom: 3px;
            font-weight: '600';
            text-align: center
        }
        .btn-tamb {
            background-color: #e0004d;
            border: none;
            color: #fff;
            border: 1px solid #ccc;
            padding: 10px 117px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            margin-right: 5px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .btn-tamb:hover {
            background-color: transparent;
            border: 1px solid #e0004d;
            color: #e0004d;
            
            padding: 10px 117px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            margin-right: 5px;
            margin-top: 20px;
            margin-bottom: 15px;
        }
    </style>
</head>
<div class="bckg">
    <div class="container">
        <h3 class="mt-4" style="text-align: left; font-weight: bold; margin-bottom: 40px; font-size: 30px; color: #939185">Kategori Layanan Halodoc</h3>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success')}}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error')}}</div>
        @endif
        <!-- <nav class="navbar navbar-light">
            <form class="form-inline">
                <div class="input-group">
                    <input style="background-color: #f0f0f0; margin-bottom: 8px;" type="text" class="form-control" placeholder="Search" aria-label="nama_kategori" aria-describedby="basic-addon1">
                </div>
            </form>
        </nav> -->

        <div class="row">
            @forelse ($kategori as $kategoris)
                <div class="col-md-4">
                    <div class="card">
                        <!-- Example image from URL, replace with actual image URL from your data -->
                        <img class="card-img-top" src="{{ $kategoris->url }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kategoris->nama_kategori }}</h5>
                            <p class="card-desk">{{ $kategoris->deskripsi}}</p>
                            <!-- <p class="card-text">Spesialisasi: {{ $kategoris->url }}</p> -->
                            <a href="{{ route('layanan.index') }}" class="btn btn-tamb">Details</a>
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
