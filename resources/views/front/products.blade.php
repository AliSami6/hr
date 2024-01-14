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


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"  style="background: url('{{ url('uploads/front/product/'.$front_setting->product_image) }}') center center;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
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
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-link"></i></a>
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
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


@endsection

@push('javascript')


    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
           
        });
    </script>
@endpush
