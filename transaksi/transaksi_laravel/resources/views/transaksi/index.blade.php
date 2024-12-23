
@extends('layouts.app')

<!-- @section('content') menandakan tampilan dari section 
transaksis tersebut, dalam hal ini adalah menampilkan daftar produk dalam bentuk tabel -->

@section('content')
<head>
    <style>

        .bckg {
            padding: 50px;
            padding-bottom: 190px;
            size: cover;
            background-color: #FFEFEF;
        }
        p {
            float: right;
        }
        .btn-tamb {
            background-color: #e0004d;
            border: none;
            color: #fff;
            border: 1px solid #ccc;
            padding: 10px 14px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .updt {
            border-color: #ffc107;
            border: 1px solid #ffc107;
            color: #ffc107;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            font-size: 13px;
            padding: 7px 13px;
            margin-left: -70px;
            margin-right: 5px;
        }
        .updt:hover {
            background-color: #ffc107;
            border: none;
            color: #fff;
            border: 1px solid #ffc107;
            padding: 7px 13px;
        }
        .del {
            background-color: #0052e0;
            border: none;
            color: #fff;
            border: 1px solid #ccc;
            padding: 7px 14px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            margin-right: -70px;
        }
        .del:hover {
            background-color: transparent;
            border: 1px solid #0052e0;
            color: #0052e0;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            font-size: 13px;
            padding: 7px 14px;
        }
    </style>
</head>
<div class="bckg">
<div class="container" style="margin-top: 15px;">
    <h3 class="mt-4" style="text-align: center; font-weight: bold; margin-bottom: 30px; color: #939185; font-size: 30px;">List Transaksi Pasien Halodoc</h3>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error')}}</div>
        @endif
        <nav class="navbar navbar-light">
            <!-- <form class="form-inline">
                <div class="input-group">
                    <input style="background-color: #f0f0f0; margin-bottom: 8px;" type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form> -->
            <!-- <p>
                <a class="btn-tamb" href="{{ route('transaksi.create')}}">+ New Transaksi</a>
            </p> -->
        </nav>
    </div>
    <table class="table table-striped table-bordered" style="box-shadow: 0 2px 5px rgba(0, 0.5, 0, 0.6); border-radius: 10px; ">
        <thead style="background-color: #005BAA;">
            <tr>
                <th style="background-color: #e0004d; color: #fff; padding-top: 13px; padding-bottom: 13px; text-align: center;">ID Transaksi</th>
                
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">Nama Layanan</th>
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">Nama Pasien</th>
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">ID Dokter</th>
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">Tanggal Transaksi</th>
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">Tanggal Konsultasi</th>
                <th style="background-color: #e0004d; color: #fff; padding: 13px; text-align: center;">Total Harga</th>
                <!-- <th style="background-color: #e0004d; color: #fff; padding: 13px; padding-right: 55px; padding-left: 55px; text-align: center;">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $transaksis)
                <tr>
                    <td style="text-align: center;">{{ $transaksis->id_trx}}</td>
                    <td style="text-align: center;">{{ $transaksis->layanan->nama_layanan}}</td>
                    <!-- pasien -->
                    <!-- <td style="text-align: center;">{{ $transaksis->id_user}}</td> -->
                    <td style="text-align: center;">{{ $transaksis->username}}</td>
                    <!-- dokter -->
                    <td style="text-align: center;">{{ $transaksis->id_userr}}</td>
                    <td style="text-align: center;">{{ $transaksis->tgl_trx}}</td>
                    <td style="text-align: center;">{{ $transaksis->tgl_janjian}}</td>
                    <td style="text-align: center;">{{ $transaksis->total_hrg}}</td>
                    
                    <!-- <td style="text-align: center; padding-top: 8px;">
                        <a href="{{ route('transaksi.edit', ['id' => $transaksis->id_trx]) }}">
                            <button class="updt" >Update</button>
                        </a>
                        <a href="#" onclick="event.preventDefault();
                            if (confirm('Apakah anda yakin ingin menghapus produk ini?')) {
                                document.getElementById('delete-row-{{ $transaksis->id_trx }}').submit();
                            }">
                            <button class="del" >Delete</button>
                        </a>
                        <form id="delete-row-{{ $transaksis->id_trx }}" action="{{ route('transaksi.destroy', ['id'=>$transaksis->id_trx])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                        
                    </td> -->
                </tr>
            @empty
                <tr>
                    <td colspan="4"></td>
                        Empty
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    </div>
@endsection