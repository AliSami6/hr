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
        style="background: url('{{ url('uploads/front/about/' . $front_setting->about_image) }}') center center;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container mt-5 p-3">
            <section class="h-100 h-custom">
                <div class="mb-0 h-100 py-5">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissable  mb-20">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i
                                    class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
                            </div>
                        @endif
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="h5">Shopping Bag</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $id => $details)
                                                @php $total += $details['discounted_price'] * $details['quantity'] @endphp
                                                <tr data-id="{{ $id }}">
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('uploads/product/') }}/{{ $details['image'] }}"
                                                                class="img-fluid rounded-3" style="width: 120px;"
                                                                alt="Book">
                                                            <div class="flex-column ms-4">
                                                                <p class="mb-2">{{ $details['name'] }}</p>

                                                            </div>
                                                        </div>
                                                    </th>

                                                    <td data-th="Quantity" class="align-middle">
                                                        <div class="d-flex flex-row">
                                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1"
                                                                style="width: 50px;" />
                                                        </div>
                                                    </td>

                                                    <td class="align-middle">
                                                        <p class="mb-0" style="font-weight: 500;">
                                                            {{ $details['discounted_price'] }}</p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <button class="btn btn-sm btn-primary cart_remove">Delete</button>
                                                    </td>
                                                </tr>
                                               @php $quantity = $details['quantity']; @endphp

                                            @endforeach
                                    
                                          @php session(['cart_total' => $total, 'cart_Qty' => $quantity]) @endphp
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class=" shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                                <div class=" p-4">

                                    <div class="row justify-content-end">
                                        <div class="col-lg-6 col-xl-6">

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2">{{ $total }} &#2547;</p>
                                            </div>
                                         
                                           
                                            <a href="{{route('checkout')}}" role="button" class="btn btn-primary btn-block btn-lg " style="float: right;">
                                                <div class="d-flex justify-content-end">
                                                    <span>Checkout </span> &nbsp;&nbsp;
                                                    <span>{{ $total }} &#2547;</span>
                                                </div>
                                            </a>

                                          
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <!-- Contact End -->
@endsection

@push('javascript')
    <script type="text/javascript"></script>
@endpush
