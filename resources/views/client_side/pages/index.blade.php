@extends('client_side.layouts.index')
@section('content')
    <main>
        <section class="hero" style=" background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
     url('{{ asset($backgroundImage->image_url) }}');">
            <div class="hero-content">
                <h1>{{$backgroundImage->background_image_title}}</h1>
                <p>{{$backgroundImage->background_image_description}}</p>
            </div>
        </section>

        <section class="categories-section section-bg padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section-title text-center">
                            <h2>Browse Categories</h2>
                            <p class="section-description">
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at its layout.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row margin-top-50">
                    <div class="col-lg-12">
                        <div class="category-grid">
                            @foreach($categories as $category)
                                <a href="{{ route('category', ['id' => $category->id]) }}" class="category-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="category-icon">
                                        <i class="{{ $category->icon ?? 'flaticon-default' }}"></i>
                                    </div>
                                    <h4 class="category-name">{{ $category->name }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="services">
            <h2>Popular Services</h2>
            <span class="section-para">The most popular</span>
            <div class="service-grid">
                @foreach($popularServices as $popularService)
                    <div class="service-card">
                        <img src="{{ asset($popularService->image_url) }}"
                             alt="Plumbing"/>
                        <h3>{{ $popularService->category->name }}</h3>
                        <h6>{{ $popularService->title }}</h6>
                        <p>{{ $popularService->description }}</p>
                        <div class="search-box">
                            <span class="price">{{ $popularService->price }}.JD</span>
                            <div class="btn-wrapper">
                                <a href="" class="cmn-btn btn-bg-1">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
