@extends('admins_side.admin.layouts.dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-capitalize">{{ Request::segment(3) }}  #{{$handyMan->id}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.dashboard.handyman-index')}}">HandyMen</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="mt-3 content text-dark center p-3">
        <form action="{{ route('admin.dashboard.handyman-update',['id' => $handyMan->id])}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" value="{{(old('full_name')? old('full_name'): $handyMan->full_name )}}" name="full_name" id="full_name" required>
                @if ($errors->has('full_name'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('full_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{(old('email')? old('email'): $handyMan->email )}}" name="email" id="email" required>
                @if ($errors->has('email'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" value="{{(old('phone_number')? old('phone_number'): $handyMan->phone_number )}}" name="phone_number" id="phone_number" required>
                @if ($errors->has('phone_number'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="{{(old('address')? old('address'): $handyMan->address )}}" name="address" id="address" required>
                @if ($errors->has('address'))
                <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success w-25">Update</button>
            </div>
        </form>
    </section>
</div>
<script type="text/javascript" src={{asset("custom/admins_side/js/handy-man.js")}}></script>
@endsection
