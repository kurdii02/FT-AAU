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
                            <div class="hero-badge">Field Training Program</div>
                            <h1 class="display-4 fw-bold text-white">
                                Experience the Real World
                                <span class="d-block text-white">8 Weeks of Hands-On Learning</span>
                            </h1>
                            <p class="lead mb-4 text-light">
The Field Training Course is an 8-week program totaling 240 hours, giving students hands-on experience in real-world projects. It’s a chance to apply what you’ve learned in class, build practical skills, and work with professionals to prepare for your future career.                            </p>
                         
                          
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-left">
                        <div class="hero-image">
                            <div class="floating-shapes">
                                <div class="shape shape-1"></div>
                                <div class="shape shape-2"></div>
                                <div class="shape shape-3"></div>
                            </div>
                            <img src="{{asset('images/logo.png')}}" alt="Field Training" class="img-fluid floating">
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
                    <h2 class="section-title">Training That Makes a Difference</h2>
                    <p class="section-subtitle">Experience a comprehensive training program designed to bridge the gap between academia and industry</p>
                </div>
                <div class="content flipping-cards">
                    <div class="flip" data-aos="fade-up" data-aos-delay="100">
                        <div class="front">
                            <i class="fa-solid fa-user-graduate"></i>
                            <h3>Student Support</h3>
                        </div>
                        <div class="back">
                            <p>Get personalized guidance and support throughout your training journey. Our platform makes it easy to track progress and stay connected with mentors.</p>
                        </div>
                    </div>
                    <div class="flip" data-aos="fade-up" data-aos-delay="200">
                        <div class="front">
                            <i class="fa fa-tasks"></i>
                            <h3>Trainer Management</h3>
                        </div>
                        <div class="back">
                            <p>Efficient coordination between trainers and students ensures optimal learning outcomes. Monitor progress and provide timely feedback.</p>
                        </div>
                    </div>
                    <div class="flip" data-aos="fade-up" data-aos-delay="300">
                        <div class="front">
                            <i class="fas fa-users"></i>
                            <h3>Supervisor Dashboard</h3>
                        </div>
                        <div class="back">
                            <p>Comprehensive oversight tools for university supervisors to monitor student progress and ensure training quality standards.</p>
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
                            <img src="{{asset('images/swiper1.jpg')}}" alt="About Us" class="img-fluid rounded-4">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1" data-aos="fade-left">
                        <span class="content-subtitle text-accent">Our Mission</span>
                        <h2 class="content-title h1 mb-4">
                            Bridging Education and Industry
                        </h2>
                        <p class="lead mb-4">
                            We're committed to creating seamless connections between academic learning and practical industry experience, ensuring students are well-prepared for their professional careers.
                        </p>
                        <ul class="mission-points">
                            <li><i class="fas fa-check-circle text-accent"></i> Practical skill development</li>
                            <li><i class="fas fa-check-circle text-accent"></i> Industry networking</li>
                            <li><i class="fas fa-check-circle text-accent"></i> Career preparation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

