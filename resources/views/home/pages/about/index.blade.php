@extends('home.master')

@section('client')

    <div class="breadcrumb-wrapper light-bg">
        <div class="container">

            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">About Us</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><img src="{{ asset('client/assets/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                                <li aria-current="page">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End breadcrumb -->


    <div class="lonyo-section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="lonyo-about-us-thumb2 pr-51" data-aos="fade-up" data-aos-duration="700">
                        <img src="{{ asset($about->photo) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="lonyo-default-content pl-32" data-aos="fade-up" data-aos-duration="900">
                        <h2>{{ $about->title }}</h2>
                        <p>{!! $about->description !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end core value -->

    <section class="lonyo-section-padding3 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="lonyo-default-content pr-50 feature-wrap">
                        <h2>Our core values ​​serve as our driving force</h2>
                        <p class="max-w616">Our core values ​​are at the core of everything we do. Ensuring the integrity, security and privacy of your data. Innovation, providing cutting-edge tools to simplify financial management. </p>
                    </div>
                </div>
                <div class="col-lg-5">

                    @foreach($cores as $core)
                        <div class="lonyo-about-us-feature-wrap one" data-aos="fade-up" data-aos-duration="500">
                            <div class="lonyo-about-us-feature-icon">

                                <img src="{{ asset('client/assets/images/about-us/icon' . $core->id . '.svg') }}" alt="">

                            </div>
                            <div class="lonyo-about-us-feature-content">
                                <h4>{{ $core->title }}</h4>
                                <p>{{  $core->description  }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="lonyo-feature-shape shape2"></div>
    </section>
    <!-- end feature -->

    <div class="lonyo-section-padding10 team-section">
        <div class="shape">
            <img src="{{ asset('client/assets/images/about-us/shape1.svg') }}" alt="">
        </div>
        <div class="container">
            <div class="lonyo-section-title center max-width-750">
                <h2>We always believe in the strength of our team</h2>
            </div>
            <div class="row">
                    @foreach($teams as $team)
                    <div class="col-lg-3 col-md-6">
                        <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
                            <div class="lonyo-team-thumb">
                                <a href="single-team.html"><img src="{{ asset($team->photo) }}" alt=""></a>
                            </div>
                            <div class="lonyo-team-content">
                                <a href="single-team.html">
                                    <h6>{{ $team->name }}</h6>
                                </a>
                                <p>{{ $team->position }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
    <!-- end team -->

    @include('home.segments.faq')
    <!-- end faq -->

    <!-- CTA or App-->
    @include('home.segments.cta')

@endsection
