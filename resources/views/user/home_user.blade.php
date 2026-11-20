@extends('dashboard_user')
@section('content')

<div class="content">
    <div class="container mt-4">
        <div class="row mt-4">
            <div class="video-container">
                <video autoplay muted loop id="video-bg">
                    <source src="/video/vidBG.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="caption">
                    <h3>About Us</h3>
                    <p>We are a leading car rental company that offers a wide range of vehicles for your needs. Whether you are traveling for business or leisure, our fleet of cars has something for everyone. From compact cars to SUVs and luxury vehicles, we have it all.</p>
                    <p>Contact us today to book your next rental car and experience the freedom of the open road.</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <h3>Car Recommendations</h3>
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.redd.it/ar68ax6u2f571.png" class="carousel-img" alt="Carousel Item 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://imgx.gridoto.com/crop/23x88:849x661/700x465/photo/2021/08/30/widebody-bumblebee-camaro-witwic-20210830112515.jpg" class="carousel-img" alt="Carousel Item 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Honda_Civic_Type_R_%28FK%3B_France%29_front_view.jpg/1200px-Honda_Civic_Type_R_%28FK%3B_France%29_front_view.jpg" class="carousel-img" alt="Carousel Item 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" ariahidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row my-4">
            @forelse ($kendaraan as $item)
            <div class="col-md-4">
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
    </div>

    <!-- Modal Logout -->
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
    <!-- Modal Logout -->
</div>
@endsection