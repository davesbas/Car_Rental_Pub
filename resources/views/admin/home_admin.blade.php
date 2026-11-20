@extends('admin.dashboard_admin')
@section('content')

<style>
    .gambar {
        height: 100px;
        border-radius: 100px;
        border: 1px solid black;
        background-image: none;
    }

    .gambarKelas {
        width: 300px;
    }
</style>
<div class="content">
    <div class="container-fluid px-4">
        <h1 style="padding-top: 20px;">Welcome, Admin</h1>
        <div class="row align-items-center mt-3">
            <!-- Colom 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="card p-0 mx-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <img class="gambar p-1 me-2" src="{{ asset('img/profileLogo.png') }}" alt="">
                            <div class="text-start mt-3">
                                <p class="m-0 fs-3">Jumlah User</p>
                                <h4>{{ $userCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Colom 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="card p-0 mx-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <img class="gambar p-3 me-2" src="{{ asset('img/carLogo.png') }}" alt="">
                            <div class="text-start mt-3">
                                <p class="m-0 fs-4">Jumlah Mobil</p>
                                <h4>{{ $kendaraanCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="card p-0 mx-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <img class="gambar p-3 me-2" src="{{ asset('img/logoPesanan.jpg') }}" alt="">
                            <div class="text-start mt-3">
                                <p class="m-0 fs-3">Jumlah Sewa</p>
                                <h4>{{ $penyewaanCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @endsection