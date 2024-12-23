@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<style>
    body {
        /* background-image: url('https://i.pinimg.com/736x/7b/40/9d/7b409dec10981d318c52a45e74bd6d71.jpg'); */
        /* background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; */
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        position: relative;
        margin: 0;
        background-color: #FFEFEF;
    }

    .overlay {
        /* background: rgba(0, 0, 0, 0.5); */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .card {
        margin-top: 50px;
        border-radius: 3px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 20px;
        width: 700px;
        margin-bottom: 50px;
    }

    .card-bd {
        
        padding-left: 40px;
        padding-top: 20px;
        padding-right: 40px;
        padding-bottom: 40px;
    }

    .card-head {
        background-color: #e0004d;
        color: white;
        border-radius: 15px 15px 0 0;
        text-align: center;
        padding: 20px;
        font-size: 28px;
        font-weight: bold;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #e0004d;
    }

    .btn-simp{
        background-color: #e0004d;
        border-color: #059212;
        width: 100%;
        border: none;
        padding: 10px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: bold;
        color: #fff;
    }

    .btn-canc {
        margin-top: 20px;
        background-color: #ccc;
        border-color: #059212;
        width: 100%;
        border: none;
        padding: 10px;
        border-radius: 10px;
        font-size: 15px;
        font-weight: bold;
        color: #fff;
        margin-bottom: 10px;
    }

    .input-group-text {
        background-color: #e0004d;
        color: white;
    }

    .btn-primary:hover {
        background-color: #059212;
        border-color: #fff;
    }
</style>

<div class="overlay"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-head">Tambah Transaksi</div>

                <div class="card-bd">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <!-- <div class="mb-3">
                        <label for="id_trx" class="form-label">ID Transaksi</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </span>
                            <input type="text" class="form-control" id="id_trx" name="id_trx" value="{{ old('id_trx') }}" required placeholder="ID Transksi">
                        </div>
                        </div> -->
                        <div class="mb-3">
                        <label for="tgl_trx" class="form-label">Tanggal Transaksi</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </span>
                            <input type="datetime-local" class="form-control" id="tgl_trx" name="tgl_trx" value="{{ old('tgl_trx') }}" required placeholder="Pilih Tanggal Janjian">
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="id_layanan" class="form-label">Nama Layanan</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                            </span>
                            <select class="form-control" id="id_layanan" name="id_layanan" required>
                                <option value="" disabled>Pilih Layanan</option>
                                @foreach($layanan as $item)
                                    <option value="{{ $item->id_layanan }}" {{ $item->id_layanan == $id_layanan ? 'selected' : '' }} data-harga="{{ $item->harga }}">{{ $item->id_layanan }}. {{ $item->nama_layanan }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="id_layanan" class="form-label">Nama Layanan</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                </span>
                                <select class="form-control" id="id_layanan" name="id_layanan" required>
                                    <option value="" disabled selected>Pilih Id Layanan</option>
                                    @foreach($layanan as $item)
                                        <option value="{{ $item->id_layanan }}">{{ $item->id_layanan }}.{{ $item->nama_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="mb-3">
                            <label for="id_user" class="form-label">Id User</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                </span>
                                <select class="form-control" id="id_user" name="id_user" >
                                    <option value="" disabled selected>Pilih Id Anda</option>
                                    @foreach($user as $item)
                                        <option value="{{ $item->id_user }}">{{ $item->id_user }}.{{ $item->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pasien</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $username }}" readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                        <label for="id_userr" class="form-label">Nama Dokter</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                            </span>
                            <select class="form-control" id="id_userr" name="id_userr" required>
                            <option value="" disabled selected>Pilih Dokter</option>
                            @foreach($dokter as $item)
                                <option value="{{ $item->id_user }}">{{ $item->id_user }}.{{ $item->username }}</option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        
                        <div class="mb-3">
                        <label for="tgl_janjian" class="form-label">Tanggal & Waktu Janji Temu</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </span>
                            <input type="datetime-local" class="form-control" id="tgl_janjian" name="tgl_janjian" value="{{ old('tgl_janjian') }}" required placeholder="Pilih Tanggal Janjian">
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="total_hrg" class="form-label">Total Harga</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                </span>
                                <input type="text" class="form-control" id="total_hrg" name="total_hrg" value="{{ $harga }}" readonly>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="total_hrg" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" id="total_hrg" name="total_hrg" required placeholder="Masukkan Total Harga">
                        </div> -->

                        <a href="{{ route('transaksi.index') }}"><button class="btn-canc">
                            Cancel
                        </button></a>
                        <button type="submit" class="btn-simp">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const idLayananSelect = document.getElementById('id_layanan');
        const totalHrgInput = document.getElementById('total_hrg');

        idLayananSelect.addEventListener('change', function() {
            const selectedOption = idLayananSelect.options[idLayananSelect.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            totalHrgInput.value = harga;
        });
    });
</script>


<!-- 
<script>
    $(document).ready(function() {
        $('#id_layanan').change(function() {
            var selectedLayananId = $(this).val();
            if (selectedLayananId) {
                $.ajax({
                    url: '/api/layanan/' + selectedLayananId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $('#total_hrg').val(response.data.harga);
                        } else {
                            alert('Error fetching layanan harga');
                        }
                    }
                });
            } else {
                $('#total_hrg').val('');
            }
        });
    });
</script> -->
