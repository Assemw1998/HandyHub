@extends('client_side.layouts.index')
@section('content')
    <main>
        <section class="login">
            <div class="login-container">
                <h1>Welcome Back</h1>
                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 20px; color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="login-form" method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="form-group">
                    <input type="text" id="email" name="email"  class="form-control"  placeholder="Email" value="{{ old('email') }}" required="required" autofocus >
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control"  placeholder="Password" name="password" id="password" required>
                            <span class="input-group-text hide"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger text-sm-left d-block mt-2">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    {{-- Button aligned to the right --}}
                    <div class="form-options">
                        <button type="submit" class="btn-primary w-100">Login</button>
                    </div>
                </form>

                <p class="register-link">
                    Don't have an account?
                    <a href="{{ route('customer.show-register') }}">Register here</a>
                </p>
            </div>
        </section>
    </main>
    <script type="text/javascript" src={{asset("custom/client_side/js/customer.js")}}></script>
@endsection
