
@extends('layouts.app')

<!-- @section('content') menandakan tampilan dari section 
products tersebut, dalam hal ini adalah menampilkan daftar produk dalam bentuk tabel -->

@section('content')
<head>
    <style>
        p {
            float: right;
        }
        .btn-tamb {
            background-color: #ffc107;
            border: none;
            color: #fff;
            border: 1px solid green;
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
            background-color: #dc3545;
            border: none;
            color: #fff;
            border: 1px solid #dc3545;
            padding: 7px 14px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            margin-right: -70px;
        }
        .del:hover {
            background-color: transparent;
            border-color: #dc3545;
            border: 1px solid #dc3545;
            color: #dc3545;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
            font-size: 13px;
            padding: 7px 14px;
        }
    </style>
</head>
<div class="container" style="margin-top: 35px;">
    <h3 class="mt-4" style="text-align: center; font-weight: bold;">List Produk Koperasi Mahasiswa</h3>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error')}}</div>
        @endif
        <nav class="navbar navbar-light">
            <form class="form-inline">
                <div class="input-group">
                    <input style="background-color: #f0f0f0; margin-bottom: 8px;" type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>
            <p>
                <a class="btn-tamb" href="{{ route('products.create')}}">+ New Product</a>
            </p>
        </nav>
    </div>
    <table class="table table-striped table-bordered" style="box-shadow: 0 2px 5px rgba(0, 0.5, 0, 0.6); border-radius: 10px; ">
        <thead style="background-color: #005BAA;">
            <tr>
                <th style="background-color: #005BAA; color: #fff; padding-top: 13px; padding-bottom: 13px; text-align: center;">ID</th>
                <th style="background-color: #005BAA; color: #fff; padding: 13px; text-align: center;">Code</th>
                <th style="background-color: #005BAA; color: #fff; padding: 13px; text-align: center;">Name</th>
                <th style="background-color: #005BAA; color: #fff; padding: 13px; text-align: center;">Price</th>
                <th style="background-color: #005BAA; color: #fff; padding: 13px; text-align: center;">Stock</th>
                <th style="background-color: #005BAA; color: #fff; padding: 13px; padding-right: 25px; padding-left: 25px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td style="text-align: center;">{{ $product->id}}</td>
                    <td style="text-align: center;">{{ $product->kode}}</td>
                    <td style="text-align: center;">{{ $product->name}}</td>
                    <td style="text-align: center; padding-right: -50px; padding-left: -50px;">Rp. {{ $product->price}}</td>
                    <td style="text-align: center; padding-right: -50px; padding-left: -50px;">{{ $product->stock}}</td>
                    <td style="text-align: center; padding-top: 8px;">
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}">
                            <button class="updt" >Update</button>
                        </a>
                        <a href="#" onclick="event.preventDefault();
                            if (confirm('Apakah anda yakin ingin menghapus produk ini?')) {
                                document.getElementById('delete-row-{{ $product->id }}').submit();
                            }">
                            <button class="del" >Delete</button>
                        </a>
                        <form id="delete-row-{{ $product->id }}" action="{{ route('products.destroy', ['id'=>$product->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                        </form>
                        
                    </td>
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
@endsection