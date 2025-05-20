@extends('admins_side.admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$customer->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.customer-index')}}">Customers</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.customer-update',['id' => $customer->id])}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <label>Profile image</label>
            @if(!isset($customer->image_url))
                <div id="profile_image_preview" class="mb-3"></div>
                <div class="form-group">

                    <input type="file" class="form-control" id="profile_image" name="profile_image" onchange="preview_image('profile_image','#profile_image_preview');" required>
                </div>
            @else
                <div id="profile_image_preview" class="mb-3">

                    <div class="image-area">
                        <button type="button" data-id={{$customer->id}} class="close AClass rounded-lg image-delete-button">
                        <span>&times;</span>
                        </button>
                        <img width='200' height='150' class='rounded p-2' src="{{ asset($customer->image_url) }}">
                    </div>
                </div>
            @endif
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" value="{{(old('full_name')? old('full_name'): $customer->full_name )}}" name="full_name" id="full_name" required>
                @if ($errors->has('full_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('full_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{(old('email')? old('email'): $customer->email )}}" name="email" id="email" required>
                @if ($errors->has('email'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" value="{{(old('phone_number')? old('phone_number'): $customer->phone_number )}}" name="phone_number" id="phone_number" required>
                @if ($errors->has('phone_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{(old('address')? old('address'): $customer->address )}}" name="address" id="address" required>
                @if ($errors->has('address'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" >
                    <div class="input-group-append">
                        <span class="input-group-text hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                    </div>
                    <button type="button" class="btn btn-outline-primary generate-password">Generate</button>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/customer.js")}}></script>
@endsection
