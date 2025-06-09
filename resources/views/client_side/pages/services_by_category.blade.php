@extends('client_side.layouts.index')
@section('content')
    <main class="container">
        <section class="services">
            <h2>Available Services For {{ $category->name }} Category</h2>
            <div class="service-grid">
                @forelse($services as $service)
                    <div class="service-card">
                        <img src="{{ $service->image_url ?? 'https://via.placeholder.com/200' }}"
                             alt="{{ $service->title }}">
                        <h3>{{ $service->handyman->full_name ?? 'Unknown' }}</h3>
                        <p>{{ $service->description }}</p>
                        <span class="rating">⭐ {{ $service->average_rating ?? 'N/A' }}</span>
                        <span class="price">JD{{ number_format($service->price, 2) }}/hr</span>
                        <button
                            class="btn-secondary book-now-btn"
                            data-service-id="{{ $service->id }}"
                            data-auth="{{ auth('customer')->check() ? 'true' : 'false' }}"
                        >
                            Book Now
                        </button>
                    </div>
                @empty
                    <p>No services found for this category.</p>
                @endforelse
            </div>
        </section>
    </main>
    <script type="text/javascript" src={{asset("custom/client_side/js/index.js")}}></script>
@endsection
