@extends('dashboard_user')
@section('content')
<style>
    .badge-dark-light {
        background-color: #F1EFEF;
        color: #000;
    }

    .col-md-6 img {
        width: 100%;
        object-fit: cover;
    }

    .card-detail {
        border: none;
    }

    .card-title {
        text-align: center;
    }



    .user-review {
        border: 1px solid #ddd;
        padding: 20px;
        margin-top: 20px;
    }

    .emoji-button {
        font-size: 24px;
        cursor: pointer;
    }

    .emoji-button:hover {
        color: #007BFF;
    }

    .review-submit {
        margin-top: 10px;
    }

    .review-list {
        margin-top: 20px;
    }

    .review-item {
        border: 1px solid #eee;
        padding: 10px;
        margin-top: 10px;
    }

    .review-item .user-icon {
        float: left;
        font-size: 24px;
        margin-right: 10px;
    }

    .review-item .user-info {
        font-weight: bold;
    }
</style>

<div class="content">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($kendaraan['image']) }}" class="d-block w-100" alt="Image Kendaraan">
            </div>
            <div class="col-md-6">
                <div class="card car-card h-100">
                    <div class="car-details card-body">
                        <h5 class="card-title fs-4"><strong>{{ $kendaraan['merek'] }} {{ $kendaraan['model'] }}</strong></h5>
                        <p class="card-text"><strong>Harga Sewa : </strong> IDR {{ number_format($kendaraan['harga_sewa']) }}</p>
                        <p class="card-text"><strong>Jenis Sewa : </strong> {{ $kendaraan['jenis_sewa'] }}an</p>
                        <p class="card-text"><strong>Color:</strong> <span class="badge badge-primary">{{ $kendaraan['warna'] }}</span></p>


                        <form id="addPenyewaanForm" action="{{ route('car_user.store', ['id' => $kendaraan['id']]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Lama Sewa ({{ $kendaraan['jenis_sewa'] }})</label>
                                    <input type="number" class="form-control @error('lama_sewa') is-invalid @enderror" name="lama_sewa" value="{{ old('lama_sewa') }}" placeholder="Lama Sewa">
                                    @error('lama_sewa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button style=" margin-top: 10px" class="btn btn-primary" type="submit">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="user-review">
                <h2>User Reviews</h2>
                <div class="form-group"> <label for="review">Write your review:</label> <textarea class="form-control" id="review" rows="4" placeholder="Write your review here"></textarea> </div>
                <div class="form-group"> <label>Select emoji:</label> <span class="emoji-button" onclick="addEmoji('😍')">😍</span> <span class="emoji-button" onclick="addEmoji('👍')">👍</span> <span class="emoji-button" onclick="addEmoji('😃')">😃</span> <span class="emoji-button" onclick="addEmoji('😐')">😐</span> <span class="emoji-button" onclick="addEmoji('😢')">😢</span> </div>
                <div class="review-submit"> <button class="btn btn-primary" onclick="submitReview()">Submit Review</button> </div>
            </div>
            <div class="review-list" id="user-reviews"> <!-- User reviews will be displayed here --> </div>
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

<script>
    function addEmoji(emoji) {
        var reviewTextArea = document.getElementById('review');
        var currentText = reviewTextArea.value;
        reviewTextArea.value = currentText + emoji;
    }

    function submitReview() {
        var reviewText = document.getElementById('review').value;
        if (reviewText.trim() !== '') {
            var reviewElement = document.createElement('div');
            reviewElement.classList.add('review-item');
            var userIcon = document.createElement('span');
            userIcon.classList.add('user-icon');
            userIcon.innerText = '😃';
            var userInfo = document.createElement('span');
            userInfo.classList.add('user-info');
            userInfo.innerText = 'John Doe';
            reviewElement.appendChild(userIcon);
            reviewElement.appendChild(userInfo);
            reviewElement.innerHTML += '<p>' + reviewText + '</p>';
            document.getElementById('user-reviews').appendChild(reviewElement);
            document.getElementById('review').value = '';
        }
    }
</script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</div>

@endsection