@extends('client_side.layouts.index')
@section('content')

    <main>
        <section class="contact">
            <div class="contact-container">
                <h1>Contact Us</h1>
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="icon">📞</div>
                        <h3>Phone</h3>
                        <p>(555) 123-4567</p>
                        <p>Mon-Fri: 9am - 6pm</p>
                    </div>
                    <div class="contact-card">
                        <div class="icon">✉️</div>
                        <h3>Email</h3>
                        <p>info@handyhub.com</p>
                        <p>support@handyhub.com</p>
                    </div>
                    <div class="contact-card">
                        <div class="icon">📍</div>
                        <h3>Address</h3>
                        <p>123 Handyman Street</p>
                        <p>New York, NY 10001</p>
                    </div>
                </div>

                <hr>

                <form class="contact-form" method="POST" action="{{ route('contact-us-store') }}">
                    <h2>Send us a message</h2>
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @error('full_name') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                    </div>

                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    @error('subject') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
                    </div>

                    @error('message') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                    </div>

                    <div class="form-options">
                        <button type="submit" class="btn-primary w-100">Send Message</button>
                    </div>
                </form>

            </div>
        </section>
    </main>
@endsection
