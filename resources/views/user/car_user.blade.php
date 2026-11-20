@extends('dashboard_user')
@section('content')

<style>
    .card-img-fixed {
        height: 200px;
        object-fit: cover;
    }

    .carousel-img {
        height: 200px;
        object-fit: cover;
    }

    .welcome-bg {
        background-color: #007BFF;
        color: #fff;
        padding: 10px;
        margin-bottom: 20px;
    }

    body {
        background-image: url('https://media.istockphoto.com/id/1349189565/vector/colorless-palette-with-several-shades-of-white.jpg?s=612x612&w=0&k=20&c=zEb4B9PkwpqOv9KogMvtIhWA1suOXcMl6JKkAtAvm-Y=');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .badge-dark-light {
        background-color: #F1EFEF;
        color: #000;
    }
</style>

<div class="content">
    <div class="container mt-4">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
            @endif
            @forelse ($kendaraan as $item)
            <div class="col-md-4 mb-3">
                <div class="card car-card h-100">
                    <img src="{{ asset($item['image']) }}" class="card-img-top car-image card-img-fixed" alt="Kendaraan Rental Cuan">
                    <div class="car-details card-body">
                        <h5 class="card-title fs-4"><strong>{{ $item['merek'] }} {{ $item['model'] }}</strong></h5>
                        <p class="card-text"><strong>Harga Sewa : </strong> IDR {{ number_format($item['harga_sewa']) }}</p>
                        <p class="card-text"><strong>Jenis Sewa : </strong> {{ $item['jenis_sewa'] }}an</p>
                        <p class="card-text"><strong>Color:</strong> <span class="badge badge-primary">{{ $item['warna'] }}</span></p>

                        <a href="{{ route('car_user.create', $item->id) }}" class="btn btn-primary btn-block">Rent this car</a>
                    </div>
                </div>
            </div>
            @if ($loop->iteration == 3)
            @break
            @endif
            @empty
            <div class="alert alert-danger">
                Data Mobil tidak ditemukan!
            </div>
            @endforelse
        </div>
        <!-- Car Recommendations Carousel -->
        <div class="row mt-4">
            <hr>
            <h3>More Recommendations</h3>
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active"> <img src="https://hips.hearstapps.com/hmg-prod/images/bugatti-chiron-sport-mid-engined-w16-engine-exclusive-news-photo-1600704674.jpg" class="d-block w-100 carousel-img" alt="Carousel Item 1"> </div>
                        <div class="carousel-item"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZHK_glLICAteAVk35xUbfPmTNvY75W0HuWBNyA-4VLhFPDYUFkJLqR0FHSCcxCpf0duE&usqp=CAU" class="d-block w-100 carousel-img" alt="Carousel Item 2"> </div>
                        <div class="carousel-item"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRF_fkk12NyfLdYxTW3rOtldrfxWYNVeyyx2p8jZpUXeYSik7T7YGPYlKH7K7AuuNsXd3g&usqp=CAU" class="d-block w-100 carousel-img" alt="Carousel Item 3"> </div>
                    </div> <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" ariahidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
            <hr>
        </div>
        <!-- Car Recommendations Carousel -->
        <div class="row mt-4 mb-4" style="overflow-y: auto; max-height: 450px;">
            @forelse ($kendaraan as $item)
            <div class="col-md-4 mb-4">
                <div class="card car-card h-100">
                    <img src="{{ asset($item['image']) }}" class="card-img-top car-image card-img-fixed" alt="Kendaraan Rental Cuan">
                    <div class="car-details card-body">
                        <h5 class="card-title fs-4"><strong>{{ $item['merek'] }} {{ $item['model'] }}</strong></h5>
                        <p class="card-text"><strong>Harga Sewa : </strong> IDR {{ number_format($item['harga_sewa']) }}</p>
                        <p class="card-text"><strong>Jenis Sewa : </strong> {{ $item['jenis_sewa'] }}an</p>
                        <p class="card-text"><strong>Color:</strong> <span class="badge badge-primary">{{ $item['warna'] }}</span></p>

                        <a href="{{ route('car_user.create', $item->id) }}" class="btn btn-primary btn-block">Rent this car</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="alert alert-danger">
                Data Mobil tidak ditemukan!
            </div>
            @endforelse

        </div>
    </div>
</div>

<div class="modal fade" id="staticLogoutUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticLogoutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Apakah ingin Logout?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary custom-margin" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="{{ route('actionLogout') }}">
                    <i class="fa fa-user"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

@endsection