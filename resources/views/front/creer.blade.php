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
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
        style="background: url('{{ url('uploads/front/job/' . $front_setting->job_image) }}') center center;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Creer</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Creer</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Creer Start -->
    
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


    <!-- Creer End -->

  
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

