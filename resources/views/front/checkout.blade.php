@php
    $front_setting = getFrontData();
@endphp
@extends('front.master')

@section('title')
    {{ $front_setting->company_title }}
@endsection
<style>

</style>
@section('meta')
    <meta name="author" content="{{ $front_setting->company_title }}" />
    <meta content="" name="{{ $front_setting->home_page_big_title }}">
    <meta content="" name="{{ $front_setting->home_page_big_title }}">
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
        style="background: url('{{ url('uploads/front/about/' . $front_setting->about_image) }}') center center;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container mt-5 p-3">
        <div class="py-3 py-md-4 checkout">
            <div class="container">
                <h4>Checkout</h4>
                <hr>
                @php
                    $cartTotal = session('cart_total', 0);
                    $qty = session('cart_Qty', 0);
                @endphp
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">{{ $cartTotal }}</span>

                            </h4>
                            <hr>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissable  mb-20">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <i
                                        class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                                </div>
                            @endif
                            <hr>

                            <form action="{{ route('order') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Full Name" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email Address" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Enter Phone Number" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Zip-code</label>
                                        <input type="number" name="pincode" class="form-control"
                                            placeholder="Enter Pin-code" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea name="address" class="form-control" rows="2"></textarea>
                                    </div>
                                    <input type="hidden" name="total" value="{{ $cartTotal }}" />

                                    <div class="col-md-12 mb-3">
                                        <label>Select Payment Mode:</label>
                                        <div class="d-md-flex align-items-start">
                                            <label class="col-md-3">
                                                <input type="radio" name="payment_method" value="cod" checked>
                                                Cash on Delivery
                                            </label>

                                            <label class="col-md-3">
                                                <input type="radio" name="payment_method" value="online">
                                                Online Payment
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="qty" value="{{ $qty }}" />
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary">Place Order</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links

        });
    </script>
@endpush
