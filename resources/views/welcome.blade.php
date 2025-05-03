@extends('layouts.landing')
@push('styles')
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
@endpush
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section class="hero" data-aos="fade">
            <div class="hero-shape"></div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="hero-content">
                            <div class="hero-badge">{{ $header->content['subtitle'] }}</div>

                            <h1 class="display-4 fw-bold text-white">
                                {{ $header->content['title'] }}
                            </h1>
                            <p class="lead mb-4 text-light">
                                {{ $header->content['description'] }}
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-left">
                        <div class="hero-image">
                            <div class="floating-shapes">
                                <div class="shape shape-1"></div>
                                <div class="shape shape-2"></div>
                                <div class="shape shape-3"></div>
                            </div>
                            <img src="{{ asset('storage/' . $header->content['image']) }}" alt="Field Training"
                                class="img-fluid floating">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features section">
            <div class="container">
                <div class="section-header text-center" data-aos="fade-up">
                    <span class="section-badge">Why Choose Us</span>
                    <h2 class="section-title">{{ $features->content['title'] }}</h2>
                    <p class="section-subtitle">{{ $features->content['sub_title'] }}</p>
                </div>
                <div class="content flipping-cards">
                    <div class="flip" data-aos="fade-up" data-aos-delay="100">
                        <div class="front">
                            <i class="fa-solid fa-user-graduate"></i>
                            <h3>{{ $features->content['feature1'] }}</h3>
                        </div>

                        <div class="back">
                            <p>{{ $features->content['feature1_description'] }}</p>
                        </div>
                    </div>
                    <div class="flip" data-aos="fade-up" data-aos-delay="200">
                        <div class="front">
                            <i class="fa fa-tasks"></i>
                            <h3>{{ $features->content['feature2'] }}</h3>
                        </div>
                        <div class="back">
                            <p>{{ $features->content['feature2_description'] }}</p>
                        </div>
                    </div>
                    <div class="flip" data-aos="fade-up" data-aos-delay="300">
                        <div class="front">
                            <i class="fas fa-users"></i>
                            <h3>{{ $features->content['feature3'] }}</h3>
                        </div>
                        <div class="back">
                            <p>{{ $features->content['feature3_description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-2 section light-background">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                        <div class="img-wrap">
                            <img src="{{ asset('storage/' . $missions->content['image']) }}" alt="About Us"
                                class="img-fluid rounded-4">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1" data-aos="fade-left">
                        <span class="content-subtitle text-accent">Our Mission</span>
                        <h2 class="content-title h1 mb-4">
                            {{ $missions->content['title'] }}
                        </h2>
                        <p class="lead mb-4">
                            {{ $missions->content['description'] }}
                        </p>
                        <ul class="mission-points">
                            <li><i class="fas fa-check-circle text-accent"></i> {{ $missions->content['mission1'] }}</li>
                            <li><i class="fas fa-check-circle text-accent"></i> {{ $missions->content['mission2'] }}</li>
                            <li><i class="fas fa-check-circle text-accent"></i> {{ $missions->content['mission3'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
