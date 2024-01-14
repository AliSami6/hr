<!DOCTYPE html>
<html lang="en">
@php
    $front_setting = getFrontData();
@endphp

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home Page')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ url('front-assets/agro/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('front-assets/agro/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('front-assets/agro/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('front-assets/agro/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('front-assets/agro/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('front-assets/agro/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar Start -->
    @include('partials/header')
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ url('front-assets/agro/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <p class="fs-4 text-white">Welcome to our dairy farm</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">The Farm of Dairy
                                        products</h1>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight">Explore
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ url('front-assets/agro/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-8 text-end">
                                    <p class="fs-4 text-white">Welcome to our dairy farm</p>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Best Organic Dairy
                                        Products</h1>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-3 px-5 animated slideInLeft">Explore
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <img class="img-fluid mb-4" src="{{ url('front-assets/agro/img/service.png') }}"
                                alt="">
                            <h5 class="mb-3">Dedicated Services</h5>
                            <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita</span>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="{{ url('front-assets/agro/img/product.png') }}"
                                alt="">
                            <h5 class="mb-3">Organic Products</h5>
                            <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita</span>
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
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="{{ url('front-assets/agro/img/banner-1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">We Sell Best Dairy Products</h2>
                            <p class="text-white mb-4">Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                                justo magna dolore erat amet</p>
                            <a class="btn btn-secondary rounded-pill py-2 px-4" href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-4">
                            <img class="img-fluid rounded" src="{{ url('front-assets/agro/img/banner-2.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="text-white mb-3">We Deliver Fresh Mild Worldwide</h2>
                            <p class="text-white mb-4">Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo
                                justo magna dolore erat amet</p>
                            <a class="btn btn-secondary rounded-pill py-2 px-4" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


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





    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Products</p>
                <h1 class="mb-5">{{ $front_setting->product_title }}</h1>
            </div>
            <div class="row gx-4">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ url('front-assets/agro/img/product-1.jpg') }}"
                                alt="">
                            <div class="product-overlay">
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-link"></i></a>
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5" href="">Pure Milk</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-decoration-line-through">$29.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ url('front-assets/agro/img/product-2.jpg') }}"
                                alt="">
                            <div class="product-overlay">
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-link"></i></a>
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5" href="">Fresh Meat</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-decoration-line-through">$29.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ url('front-assets/agro/img/product-3.jpg') }}"
                                alt="">
                            <div class="product-overlay">
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-link"></i></a>
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5" href="">Dairy Products</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-decoration-line-through">$29.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ url('front-assets/agro/img/product-4.jpg') }}"
                                alt="">
                            <div class="product-overlay">
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-link"></i></a>
                                <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i
                                        class="bi bi-cart"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5" href="">Organic Food</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-decoration-line-through">$29.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->


    <!-- Team Start -->


    @if ($front_setting->show_job == 1)
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <p class="section-title bg-white text-center text-primary px-3">Join with us</p>
                    <h1 class="mb-5">{{ $front_setting->job_title }}</h1>
                </div>
                @php
                    $job = DB::table('job')->get();
                @endphp
                <div class="row g-4">
                    @foreach ($job as $li)
                        <div class="col-lg-4">
                            <div class="card" style="width:18rem;">
                                <img src="{{ url('front-assets/images/qw.jpg') }}" class="card-img-top"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $li->job_title }}</h5>
                                    <p class="card-text"><b>Application End Date </b>{{ $li->application_end_date }}</p>
                                    <a href="{{url('job/{id}/{slug?}')}}" class="card-link">View Job Details<i
                                            class="fas fa-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Testimonial</p>
                <h1 class="mb-5">What People Say About Our Dairy Farm</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-img">
                        <img class="img-fluid animated pulse infinite"
                            src="{{ url('front-assets/agro/img/testimonial-1.jpg') }}" alt="">
                        <img class="img-fluid animated pulse infinite"
                            src="{{ url('front-assets/agro/img/testimonial-2.jpg') }}" alt="">
                        <img class="img-fluid animated pulse infinite"
                            src="{{ url('front-assets/agro/img/testimonial-3.jpg') }}" alt="">
                        <img class="img-fluid animated pulse infinite"
                            src="{{ url('front-assets/agro/img/testimonial-4.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="{{ url('front-assets/agro/img/testimonial-1.jpg') }}"
                                alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="{{ url('front-assets/agro/img/testimonial-2.jpg') }}"
                                alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="{{ url('front-assets/agro/img/testimonial-3.jpg') }}"
                                alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid mb-3" src="{{ url('front-assets/agro/img/testimonial-4.jpg') }}"
                                alt="">
                            <p class="fs-5">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <h5>Client Name</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-secondary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Business Hours</h5>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-secondary text-body copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('front-assets/agro/lib/wow/wow.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ url('front-assets/agro/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('front-assets/agro/js/main.js') }}"></script>
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
</body>

</html>
