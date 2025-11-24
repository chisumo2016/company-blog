@extends('home.master')

@section('client')


    <div class="breadcrumb-wrapper light-bg">
        <div class="container">

            <div class="breadcrumb-content">
                <h1 class="breadcrumb-title pb-0">{{ $categoryName->name }}</h1>
                <div class="breadcrumb-menu-wrapper">
                    <div class="breadcrumb-menu-wrap">
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><img src="{{ asset('client/assets/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                                <li aria-current="page">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="lonyo-section-padding9 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach($posts as $post)
                        <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="500">
                            <div class="lonyo-blog-thumb">
                                <img src="{{ asset($post->thumbnail) }}" alt="" style="width: 600px; height:  350px ">
                            </div>
                            <div class="lonyo-blog-meta">
                                <ul>
                                    <li>
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            <img src="{{ asset('client/assets/images/blog/date.svg') }}" alt="">{{ $post->created_at->format('M d Y') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.show' , $post->slug) }}">
                                            <img src="{{ asset('client/assets/images/blog/clock.svg') }}" alt="">{{ $post->published_at->format('h:i A') }} read</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lonyo-blog-content">
                                <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                                <p>{!! $post->summary !!}  ...</p>
                            </div>
                            <div class="lonyo-blog-btn">
                                <a href="{{ route('blog.show' , $post->slug) }}"
                                   class="lonyo-default-btn blog-btn">continue reading</a>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="lonyo-blog-sidebar" data-aos="fade-left" data-aos-duration="700">
                        <div class="lonyo-blog-widgets">
                            <form action="#">
                                <div class="lonyo-search-box">
                                    <input type="search" placeholder="Type keyword here">
                                    <button id="lonyo-search-btn" type="button">
                                        <i class="ri-search-line"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="lonyo-blog-widgets">
                            <h4>Categories:</h4>
                            <div class="lonyo-blog-categorie">

                                @foreach($categories as $category)
                                    <ul>
                                        <li>
                                            <a href="{{ route('blog.category', $category->id) }}">
                                                {{ $category->name }}
                                                <span>({{ $category->posts_count }})</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                        @foreach($recentPosts as $recentPost)
                            <a class="lonyo-blog-recent-post-item" href="{{ route('blog.show', $recentPost->slug) }}">
                                <div class="lonyo-blog-recent-post-thumb">
                                    <img src="{{ asset($recentPost->thumbnail) }}" alt="" style="width: 60px; height: 100px">
                                </div>
                                <div class="lonyo-blog-recent-post-data">
                                    <ul>
                                        <li>
                                            <img src="{{ asset('client/assets/images/blog/date.svg') }}" alt="">
                                            {{ $recentPost->published_at->format('M d Y') }}
                                        </li>
                                    </ul>
                                    <div>
                                        <h4>{{ $recentPost->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                        <div class="lonyo-blog-widgets">
                            <h4>Tags</h4>
                            <div class="lonyo-blog-tags">
                                <ul>
                                    <li><a href="single-blog.html">Software</a></li>
                                    <li><a href="single-blog.html">Business</a></li>
                                    <li><a href="single-blog.html">App</a></li>
                                    <li><a href="single-blog.html">Solutions</a></li>
                                    <li><a href="single-blog.html">Finance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog -->
    <div class="lonyo-content-shape">
        <img src="{{ asset('client/assets/images/shape/shape2.svg') }}" alt="">
    </div>

    <!-- CTA or App-->
    @include('home.segments.cta')
    <!-- end cta -->
@endsection
