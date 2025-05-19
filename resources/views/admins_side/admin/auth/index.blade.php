@extends('admins_side.admin.layouts.login')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b> Side</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">This page only for admins</p>
            <form action="{{ route('admin.login')}}" method="post">
                @csrf
                @include('admins_side.admin.layouts.partials.messages')
                <div class="input-group mb-3">

                    <input type="text" id="username" name="username"  class="form-control"  placeholder="Username / Email" value="{{ old('username') }}" required="required" autofocus >
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input  type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                    @if ($errors->has('password'))
                        <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="text-align: -webkit-center;">
                        <button type="submit" class="btn btn-primary btn-block w-50">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
        @include('admins_side.admin.layouts.partials.copy')
    </div>
</div>

@endsection
