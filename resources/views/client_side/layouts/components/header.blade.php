<header>
    <nav>
        <div class="logo">
            <a href="{{ route('/') }}">
            <img src="{{ asset('images/client_side_images/logo.png') }}" alt="handyhub Logo"/>
            <span>HandyHub</span>
            </a>
        </div>

        <ul class="nav-links">
            <li><a href="{{ route('/') }}" class="{{ request()->routeIs('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('contact-us') }}" class="{{ request()->routeIs('contact-us') ? 'active' : '' }}">Contact</a></li>

            {{-- Dropdown --}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Account</a>
                <ul class="dropdown-menu">
                    @if(Auth::guard('customer')->check())
                        <li><a href="{{ route('customer.profile.customer-index') }}">Profile</a></li>
                        <li><a href="{{ route('customer.profile.customer-order') }}">My Orders</a></li>
                        <li>
                            <form action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('customer.show-login') }}">Login</a></li>
                        <li><a href="{{ route('customer.show-register') }}">Register</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </nav>
</header>
