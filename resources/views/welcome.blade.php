<x-site-layout>
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ asset('home/img/hero-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-text">
                        <span>WELCOME IN</span>
                        <h1>BODY MOTIONS WEBSITE</h1>
                        <p>Welcome to a life of health and fitness, and from here your journey begins to achieve your
                            goals to achieve a healthy body
                            <!-- <br /> shortcode which lets</p>-->
                            <!--<a href="#" class="primary-btn">Read More</a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="{{ asset('home') }}/img/about-pic.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>Story About Us</h2>
                        <p class="first-para">Fitness and exercise are an essential part of a healthy person's life.
                            Therefore, our goal was to provide an innovative technological solution that makes it easier
                            for users to choose appropriate sports activities and customize their exercises according to
                            their goals, and we worked on that until we achieved what you see now..</p>
                        <a href="{{ route('about') }}" class="primary-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Section Begin -->
    <section class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-pic">
                        <img src="{{ asset('home') }}/img/services/service-pic.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-items">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="services-item bg-gray">
                                    <img src="{{ asset('home') }}/img/services/service-icon-2.png" alt="">
                                    <h4>Bulding Muscles</h4>
                                    <p>can do more for your body than just making you look different or adding strength.
                                    </p>
                                </div>
                                <div class="services-item bg-gray pd-b">
                                    <img src="{{ asset('home') }}/img/services/service-icon-3.png" alt="">
                                    <h4>Workout</h4>
                                    <p>is considered one of the most important factors in maintaining overall human
                                        health and enhancing quality of life.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="services-item">
                                    <img src="{{ asset('home') }}/img/services/service-icon-1.png" alt="">
                                    <h4>Yoga</h4>
                                    <p>yoga is considered a healthy and balanced lifestyle that integrates physical,
                                        mental, and spiritual aspects, making it effective in achieving overall health
                                        and well-being.</p>
                                </div>
                                <div class="services-item pd-b">
                                    <img src="{{ asset('home') }}/img/services/service-icon-4.png" alt="">
                                    <h4>Weight Loss</h4>
                                    <p>Losing excess weight has many positive effects on overall health and well-being.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>UNLIMITED Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($categories as $category)
                    <div class="col-lg-4">
                        <div class="single-class-item set-bg" data-setbg="{{ asset($category->image) }}">
                            <div class="si-text">
                                <h4>{{ $category->name }}</h4>
                                <span><i class="fa fa-user"></i> {{ $category->user->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Classes Section End -->

    <!-- Trainer Section Begin-->
    <section class="trainer-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>EXPERT COACHES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($coaches as $user)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-trainer-item">
                            <img src="{{ asset($user->image) }}" alt="">
                            <div class="trainer-text">
                                <h5>{{ $user->name }}</h5>
                                <span>{{ $user->email }}</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Trainer Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="{{ asset('home') }}/img/banner-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h2>Get training today</h2>
                        <p>Gimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry’s standard.</p>
                        <a href="{{ route('contact') }}" class="primary-btn banner-btn">Contact Now</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('home') }}/img/banner-person.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->


</x-site-layout>
