@php
    $front_setting = getFrontData();
@endphp
@extends('front.master')

@section('title')
    {{ $front_setting->company_title }}
@endsection

@section('meta')
  <meta name="author" content="{{ $front_setting->company_title }}" />
    <meta content="" name="{{ $front_setting->home_page_big_title }}">
    <meta content="" name="{{ $front_setting->home_page_big_title }}">
   
@endsection

@section('content')
    <!-- Start Home -->
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($sliders != null)
                    @foreach ($sliders as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img class="w-100" src="{{ url('uploads/slider/' . $item->image) }}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-start">
                                        <div class="col-lg-8 text-start">
                                            <p class="fs-4 text-white">{{ $item->title }}</p>
                                            <h1 class="display-1 text-white mb-5 animated slideInRight">
                                                {{ $item->subtitle }}</h1>
                                            <a href=""
                                                class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight">{{ $item->button_txt }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- end home -->
    
         
    <!-- About Start -->
    <div class="container-xxl py-5">

        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        @php
                            $delay = 0.1;
                            $service = DB::table('services')
                                ->select('service_icon')
                                ->get();
                        @endphp
                        <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                            <div class="about-experience bg-secondary rounded">
                                <h1 class="display-1 mb-0">{{ $front_setting->counter_1_value }}</h1>
                                <small class="fs-5 fw-bold">{{ $front_setting->counter_1_title }}</small>
                            </div>
                        </div>
                        @foreach ($service as $item)
                            <div class="col-6 wow fadeIn" data-wow-delay="{{ $delay }}s">
                                <img class="img-fluid rounded"
                                    src="{{ url('uploads/services/' . $item->service_icon) }}">
                            </div>
                            @php
                                // Increment the delay value by 2 for the next iteration
                                $delay = $delay + 2;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="mb-4">{{ $front_setting->home_page_big_title }}</h1>
                    <p class="mb-4">{{ $front_setting->home_page_short_description }}</p>
                    <div class="row g-5 pt-2 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="{{ url('uploads/front/'. $front_setting->about_one_image) }}"
                                alt="">
                            <h5 class="mb-3">{{$front_setting->about_one_title}}</h5>
                            <span>{{$front_setting->about_one_details}}</span>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="{{ url('uploads/front/'. $front_setting->about_two_image) }}"
                                alt="">
                            <h5 class="mb-3">{{$front_setting->about_two_title}}</h5>
                            <span>{{$front_setting->about_two_details}}</span>
                        </div>
                    </div>
                    <a class="btn btn-secondary rounded-pill py-3 px-5" href="">Explore More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
   
    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    <h1 class="mb-4">{{ $front_setting->home_page_feature_title }}</h1>
                    <p class="mb-4">{{ $front_setting->home_page_feature_short_description }}</p>
                    <p><i class="fa fa-check text-primary me-3"></i>{{ $front_setting->features_one }}</p>
                    <p><i class="fa fa-check text-primary me-3"></i>{{ $front_setting->features_two }}</p>
                    <p><i class="fa fa-check text-primary me-3"></i>{{ $front_setting->features_three }}</p>
                    <a class="btn btn-secondary rounded-pill py-3 px-5 mt-3" href="">Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4"
                                        src="{{ url('uploads/front/' . $front_setting->feature_image_one) }}"
                                        alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">
                                        {{ $front_setting->counter_1_value }}</h1>
                                    <span
                                        class="fs-5 fw-semi-bold text-secondary">{{ $front_setting->counter_1_title }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4"
                                        src="{{ url('uploads/front/' . $front_setting->feature_image_two) }}"
                                        alt="">
                                    <h1 class="display-6" data-toggle="counter-up">
                                        {{ $front_setting->counter_2_value }}</h1>
                                    <span
                                        class="fs-5 fw-semi-bold text-primary">{{ $front_setting->counter_2_title }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4">
                                    <img class="img-fluid mb-4"
                                        src="{{ url('uploads/front/' . $front_setting->feature_image_three) }}"
                                        alt="">
                                    <h1 class="display-6" data-toggle="counter-up">
                                        {{ $front_setting->counter_3_value }}</h1>
                                    <span
                                        class="fs-5 fw-semi-bold text-primary">{{ $front_setting->counter_3_title }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-primary py-5 px-4">
                                    <img class="img-fluid mb-4"
                                        src="{{ url('uploads/front/' . $front_setting->feature_image_four) }}"
                                        alt="">
                                    <h1 class="display-6 text-white" data-toggle="counter-up">
                                        {{ $front_setting->counter_4_value }}</h1>
                                    <span
                                        class="fs-5 fw-semi-bold text-secondary">{{ $front_setting->counter_4_title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->
     
    <!-- Banner Start -->
    
    <div class="container-fluid banner my-5 py-5" data-parallax="scroll"
        data-image-src="{{ url('uploads/front/' . $front_setting->banner_image) }}">
         @php
                $bannerDelay = 0.3;
            @endphp
        <div class="container py-5">
            <div class="row g-5">
                @foreach ($banners as $item)
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="{{$bannerDelay}}s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="{{ url('uploads/banner_home/'. $item->image) }}"
                                alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">{{$item->title}}</h2>
                            <p class="text-white mb-4">{{$item->subtitle}}</p>
                            <a class="btn btn-secondary rounded-pill py-2 px-4" href="">{{$item->button_txt}}</a>
                        </div>
                    </div>
                </div>
                 @php
                            // Increment the delay value by 2 for the next iteration
                            $bannerDelay = $bannerDelay + 2;
                        @endphp
                @endforeach
                
              
            </div>
        </div>
    </div>
    <!-- Banner End -->
    @if ($front_setting->show_service == 1)
       
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            @php
                $delay = 0.1;
            @endphp
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="{{ $delay }}s"
                style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Services</p>
                <h1 class="mb-5">{{ $front_setting->service_title }}</h1>
            </div>
            <div class="row gy-5 gx-4">

                @if (count($services) > 0)
                    @foreach ($services as $value)
                        <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="{{ $delay }}s">
                            <div class="service-item d-flex h-100">
                                <div class="service-img">
                                    <img class="img-fluid"
                                        src="{{ url('uploads/services/' . $value->service_icon) }}" alt="">
                                </div>
                                <div class="service-text p-5 pt-0">
                                    <div class="service-icon">
                                        <img class="img-fluid rounded-circle"
                                            src="{{ url('uploads/services/' . $value->service_icon) }}"
                                            alt="">
                                    </div>
                                    <h5 class="mb-3">{{ $value->service_name }}</h4>
                                        <p class="mb-4">{{ $value->services_desc }}</p>
                                        <a class="btn btn-square rounded-circle" href=""><i
                                                class="bi bi-chevron-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @php
                            // Increment the delay value by 2 for the next iteration
                            $delay = $delay + 2;
                        @endphp
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <!-- Service End -->
    @endif

    
    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                 @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissable  mb-20">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i
                                class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissable  mb-20">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>{{ session()->get('error') }}</strong>
                        </div>
                    @endif
                <p class="section-title bg-white text-center text-primary px-3">Our Products</p>
                <h1 class="mb-5">{{ $front_setting->product_title }}</h1>
            </div>
            <div class="row gx-4">
                   @php
                $product_delay = 0.1;
            @endphp
            @foreach ($products as $item)
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="{{$product_delay}}s">
                    <div class="product-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ url('uploads/product/'.$item->image) }}"
                                alt="">
                            <div class="product-overlay">
                              
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href="{{ route('add_to_cart', $item->id) }}"><i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5" href="">{{$item->name}}</a>
                            <span class="text-primary me-1">{{$item->discounted_price}} &#2547;</span>
                            <span class="text-decoration-line-through">{{$item->price}} &#2547;</span>
                        </div>
                    </div>
                </div>
                  @php
                            // Increment the delay value by 2 for the next iteration
                            $product_delay = $product_delay + 2;
                        @endphp
            @endforeach
              
            </div>
        </div>
    </div>
    <!-- Product End -->

    @if ($front_setting->show_job == 1)
        <!-- all jobs start -->
     <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="section-title bg-white text-center text-primary px-3">Join with us</p>
                    <h1 class="mb-5">{{ $front_setting->job_title }}</h1>
                </div>
                    <div class="data">
                        @include('front.job_pagination')
                    </div>
                </div>
            </div>
            <!-- end containar -->
        </div>
        <!-- all jobs end -->
    @endif



@endsection

@push('javascript')
    <script>
        $(function() {
            $('.data').on('click', '.pagination a', function(e) {
                getData($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });


        });

        function getData(page) {

            $.ajax({
                url: '?page=' + page,
                datatype: "html",
            }).done(function(data) {
                $('.data').html(data);
                $('html,body').animate({
                        scrollTop: $(".career").offset().top
                    },
                    'slow');
            }).fail(function() {
                alert('No response from server');
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $(".navigation-menu li a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
    
    
@endpush
