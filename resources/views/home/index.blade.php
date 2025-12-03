@extends('home.master')


@section('client')

    <!--  hero -->
    @include('home.segments.slider-hero')
    <!-- end hero -->

    <!--  features -->
    @include('home.segments.features')
    <!-- end content -->

    <!-- clarifies -->
    @include('home.segments.clarifies')
    <!-- end content -->

    <!-- financials-->
    @include('home.segments.get_all_financials')

    <div class="lonyo-content-shape3">
        <img src="{{ asset('client/assets/images/shape/shape2.svg') }}" alt="">
    </div>
    <!-- end content -->

    <!-- end usability -->
    @include('home.segments.usability')


    <div class="lonyo-content-shape1">
        <img src="{{ asset('client/assets/images/shape/shape3.svg') }}" alt="">
    </div>
    <!-- end video -->

    <!--  testimonial -->
    @include('home.segments.testimonial')
    <!-- end testimonial -->

    <!--  faq -->
    @include('home.segments.faq')
    <!-- end testimonial -->


    <div class="lonyo-content-shape3">
        <img src="{{ asset('client/assets/images/shape/shape2.svg') }}" alt="">
    </div>
    <!-- end faq -->

    <!-- cta -->
    @include('home.segments.cta')
    <!-- end cta -->
@endsection
