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
                    <input type="text" id="email" name="email"  class="form-control"  placeholder="Email" value="{{ old('email') }}" required="required" autofocus >

                    <input  type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
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
@endsection
