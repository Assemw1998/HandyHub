@extends('client_side.layouts.index')
@section('content')
    <main>
        <section class="login">
            <div class="login-container">
                <h1>Join Now</h1>
                <form class="login-form" method="POST" action="{{ route('customer.register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" value="{{old('full_name')}}" name="full_name" id="full_name" required>
                        @if ($errors->has('full_name'))
                            <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{old('email')}}" name="email" id="email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" value="{{old('phone_number')}}" name="phone_number" id="phone_number" required>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" value="{{old('address')}}" name="address" id="address" required>
                        @if ($errors->has('address'))
                            <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" value="{{old('customer_password')}}" name="password" id="password" required>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div id="profile_image_preview" class="mb-3"></div>
                        <label>Choose Profile image</label>
                        <input type="file" class="form-control" id="profile_image" name="profile_image" onchange="preview_image('profile_image','#profile_image_preview');" required>
                    </div>
                    <div class="form-options">
                        <button type="submit" class="btn-primary w-100">Register</button>
                    </div>
                </form>

                <p class="register-link">
                    Don't have an account?
                    <a href="{{ route('customer.show-login') }}">Login here</a>
                </p>
            </div>
        </section>
    </main>
@endsection
