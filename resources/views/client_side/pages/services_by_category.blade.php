@extends('client_side.layouts.index')
@section('content')
    <main>
        <section class="services-grid">
            <div class="service-category m-5 p-2">
                <h2>Available Services For {{ $category->name }} Category</h2>
                <div class="service-list">
                    @forelse($services as $service)
                        <div class="service-card">
                            <img src="{{ $service->image_url ?? 'https://via.placeholder.com/200' }}" alt="{{ $service->title }}">
                            <h3>{{ $service->handyman->full_name ?? 'Unknown' }}</h3>
                            <p>{{ $service->description }}</p>
                            <span class="rating">⭐ {{ $service->handyman->rating ?? 'N/A' }}</span>
                            <span class="price">JD{{ number_format($service->price, 2) }}/hr</span>
                            <button class="btn-secondary">Book Now</button>
                        </div>
                    @empty
                        <p>No services found for this category.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
