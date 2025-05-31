<footer>
    <div class="footer-content">
        <div class="footer-section">
            <div class="logo">
                <img src="{{ asset("images/client_side_images/logo.png") }}" alt="handyhub Logo"/><br />
                <span>HandyHub</span>
            </div>
            <p>Connecting skilled professionals with customers since 2025</p>
        </div>
        <div class="footer-section">
            <h3>Handy Links</h3>
            <ul>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact-us') }}">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Contact Info</h3>
            <p>Email: info@handyhub.com</p>
            <p>Phone: (555) 123-4567</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 handyhub. All rights reserved.</p>
    </div>
</footer>
