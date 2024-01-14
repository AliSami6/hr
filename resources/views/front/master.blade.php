@php
    $front_setting = getFrontData();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Home Page')</title>
    @yield('meta')
    <link href="{{ url('uploads/front/' . $front_setting->logo) }}" rel="icon">
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
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navigation Bar-->
    @include('partials/header')
    <!--end header-->
    <!-- Navbar End -->



    @yield('content');


    <!-- <hr> -->
    @include('partials/footer')
    <!--end footer-->
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid bg-secondary text-body copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" href="{{ url('/') }}">{{ $front_setting->company_title }}</a>,
                    All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <a class="fw-semi-bold" href="{{ url('/') }}">{{ $front_setting->footer_text }}</a>
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
        $(document).ready(function() {
            $(".cart_update").change(function(e) {
                e.preventDefault();

                var ele = $(this);
                // alert(ele);
                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.href = "{{ url('cart') }}";
                    }
                });
            });
        });
         $(".cart_remove").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
          
     
  
    });
    </script>

</body>

</html>
