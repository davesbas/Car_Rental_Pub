@extends('dashboard_user')
@section('content')

<style>
    /* Additional styles for the profile page */
    .profile-picture {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 15px;
    }
</style>

<div class="content">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <!-- Display user profile picture -->
                    <img src="{{ asset(Auth::user()->image_profil) }}" class="card-img-top profile-picture" alt="User Profile Picture">
                    <div class="card-body">
                        <h5 class="card-title"><b>Welcome User</b></h5>
                        <p class="card-text"><b>Username:</b>{{ Auth::user()->username }} </p>
                        <p class="card-text"><b>Email:</b> {{ Auth::user()->email }}</p>
                        <p class="card-text"><b>Phone Number:</b> {{ Auth::user()->num_phone }}</p>
                        <p class="card-text"><b>nik:</b> {{ Auth::user()->nik }}</p>
                        <p class="card-text"><b>Born Date:</b> {{ Auth::user()->born_date }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
    <!-- Form to update the profile picture -->
    <form action="{{ route('updateProfilePicture') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Update Profile Picture</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Display success or error messages if they exist -->
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
