@extends('client_side.layouts.index')
@section('content')
    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Find Skilled Handymen Near You</h1>
                <p>Connect with trusted professionals for all your home maintenance and repair needs</p>
                <div class="search-box">
                    <input type="text" placeholder="Enter your location"/>
                    <button class="btn-primary">Search</button>
                </div>
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

                            <a href="CleaningListing.html" class="category-box wow fadeInUp" data-wow-delay=".2s">
                                <div class="category-icon">
                                    <i class="flaticon-mop"></i>
                                </div>
                                <h4 class="category-name">Cleaning</h4>
                            </a>

                            <a href="ElectricalListing.html" class="category-box wow fadeInDown" data-wow-delay=".2s">
                                <div class="category-icon">
                                    <i class="flaticon-electrician"></i>
                                </div>
                                <h4 class="category-name">Electric</h4>
                            </a>

                            <a href="FlooringListing.html" class="category-box wow fadeInUp" data-wow-delay=".2s">
                                <div class="category-icon">
                                    <i class="flaticon-moving-truck"></i>
                                </div>
                                <h4 class="category-name">Flooring</h4>
                            </a>

                            <a href="PaintingListing.html" class="category-box wow fadeInDown" data-wow-delay=".2s">
                                <div class="category-icon">
                                    <i class="flaticon-beauty-saloon"></i>
                                </div>
                                <h4 class="category-name">Painting</h4>
                            </a>

                            <a href="CarpentryListing.html" class="category-box wow fadeInUp" data-wow-delay=".2s">
                                <div class="category-icon">
                                    <i class="flaticon-paint-roller-1"></i>
                                </div>
                                <h4 class="category-name">Carpentry</h4>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="services">
            <h2>Popular Services</h2>
            <span class="section-para">The most popular</span>
            <div class="service-grid">
                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=300&h=200&fit=crop"
                         alt="Plumbing"/>
                    <h3>Renovation</h3>
                    <p>Revamp your home or office with experts</p>
                    <div class="search-box">
                        <span class="price">Starting at 75JOD</span>
                        <div class="btn-wrapper">
                            <a href="RenovationListing.html" class="cmn-btn btn-bg-1">Explore More</a>
                        </div>
                        \
                    </div>
                </div>

                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=300&h=200&fit=crop"
                         alt="Electrical"/>
                    <h3>Home Electrical</h3>
                    <p>Expert electrical repairs and installations</p>
                    <div class="search-box">
                        <span class="price">Starting at 85JOD</span>
                        <div class="btn-wrapper">
                            <a href="ElectricalListing.html" class="cmn-btn btn-bg-1">Explore More</a>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=200&fit=crop"
                         alt="Carpentry"/>
                    <h3>Carpentry</h3>
                    <p>Quality woodwork and furniture repairs</p>
                    <div class="search-box">
                        <span class="price">Starting at 65JOD</span>
                        <div class="btn-wrapper">
                            <a href="CarpentryListing.html" class="cmn-btn btn-bg-1">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="seller-area padding-top-70 padding-bottom-100">
            <div class="container1">
                <div class="container1">
                    <div class="col-lg-6 margin-top-30">
                        <div class="seller-wrapper">
                            <div class="section-title text-left">
                                <h2 class="title">Start As Seller</h2>
                                <span class="section-para">
                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </span>
                            </div>
                            <div class="seller-contents">
                                <div class="btn-wrapper">
                                    <a href="register.html" class="cmn-btn btn-bg-1">Become a Seller</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 margin-top-30">
                        <div class="seller-thumbs wow slideInRight" data-wow-delay=".2s">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?w=300&h=200&fit=crop"
                                 alt="Carpentry"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="how-it-works">
            <div class="container">
                <h2 class="section-title">How It Works</h2>
                <div class="steps-container">
                    <div class="step-card">
                        <h3 class="step-title">1. Post Your Job</h3>
                        <p class="step-description">Describe what you need done</p>
                    </div>

                    <div class="step-card">
                        <h3 class="step-title">2. Get Quotes</h3>
                        <p class="step-description">Receive quotes from qualified handymen</p>
                    </div>

                    <div class="step-card">
                        <h3 class="step-title">3. Hire & Pay</h3>
                        <p class="step-description">Choose the best handyman and get it done</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
