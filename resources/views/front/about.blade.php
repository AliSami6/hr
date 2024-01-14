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
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"  style="background: url('{{ url('uploads/front/about/'.$front_setting->about_image) }}') center center;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


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


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Team</p>
                <h1 class="mb-5">{{$front_setting->team_title}}</h1>
            </div>
            <div class="row g-4">
                @foreach ($emp as $li)
                     <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded p-4">
                        <img class="img-fluid rounded mb-4" src="{{url('uploads/employeePhoto/'.$li->photo)}}" alt="">
                        <h5>{{$li->userName->user_name}}</h5>
                        <p class="text-primary">{{$li->department->department_name}}</p>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
               
              
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection

@push('javascript')


    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
           
        });
    </script>
@endpush
