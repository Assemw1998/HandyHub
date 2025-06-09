@extends('client_side.layouts.index')
@section('content')
    <main class="padding-top-100 padding-bottom-100 section-bg">
        <div class="container">
            <div class="section-title text-center">
                <h1 style="margin-top: 100px;">Personal Profile</h1>
                <p class="section-description">Manage your personal information and account details</p>
            </div>

            <div class="row justify-content-center margin-top-50">
                <div class="col-lg-12">
                    <div class="profile-card">
                        <div class="profile-header text-center">
                            <img
                                src="{{ $customer->image_url ? asset($customer->image_url) : 'https://i.pravatar.cc/100' }}"
                                alt="User Avatar" class="profile-avatar" />
                            <h3 class="profile-name">{{ $customer->full_name }}</h3>
                            <p class="profile-email">{{ $customer->email }}</p>
                        </div>
                        <div class="profile-details text-center">
                            <p><strong>Phone:</strong> {{ $customer->phone_number ?? '-' }}</p>
                            <p><strong>Address:</strong> {{ $customer->address ?? '-' }}</p>
                            <p><strong>Joined:</strong> {{ \Carbon\Carbon::parse($customer->created_at)->format('F Y') }}</p>

                            <button class="btn btn-primary mt-3" onclick="toggleEditForm()">Edit Profile</button>
                        </div>
                    </div>

                    <!-- Hidden Editable Form -->
                    <div id="editProfileSection" class="card mt-4 d-none">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Edit Profile</strong>
                            <button class="btn-close" onclick="toggleEditForm()"></button>
                        </div>
                        <div class="card-body">
                            <form id="editProfileForm" method="POST" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control"
                                           value="{{ $customer->full_name }}">
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone_number" class="form-control"
                                           value="{{ $customer->phone_number }}">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
                                </div>
                                <div class="mb-3">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control"  name="password" id="password" required>
                                        <span class="input-group-text hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label>Profile image</label>
                                    <div id="profile_image_preview" class="mb-3">
                                        <div class="image-area">
                                            <img width='200' height='150' class='rounded p-2'
                                                 src="{{ $customer->image_url ? asset($customer->image_url) : 'https://i.pravatar.cc/100' }}">
                                        </div>
                                        <input type="file" class="form-control" id="profile_image" name="profile_image"
                                               onchange="preview_image('profile_image','#profile_image_preview');">
                                    </div>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleEditForm() {
            const section = document.getElementById('editProfileSection');
            section.classList.toggle('d-none');
        }
    </script>

    <script type="text/javascript" src="{{ asset('custom/client_side/js/customer.js') }}"></script>
@endsection
