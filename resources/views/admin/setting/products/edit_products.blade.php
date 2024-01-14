@extends('admin.master')
@section('content')

@section('title')
    @lang('products.edit_products')
@endsection

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <ol class="breadcrumb">
                <li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i
                            class="fa fa-home"></i>@lang('dashboard.dashboard')</a></li>
                <li>@yield('title')</li>
            </ol>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <a href="{{ route('product.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('products.view_all_products')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {{ Form::open(['route' => ['product.update', $product->id], 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'ajaxProduct', 'data-redirect' => route('product.index'), 'method' => 'PUT']) }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('products.name')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="name" value="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('products.price')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control required role_name"
                                               id="price" name="price" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('products.discount_percentage')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control required role_name"
                                               id="discount_percentage" name="discount_percentage" value="{{  $product->discount_percentage }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('products.discounted_price')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                               id="discounted_price" name="discounted_price" value="{{ $product->discounted_price }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('products.image') (64X64)<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <img src="{{ url('uploads/product/' . $product->image) }}"
                                                class="img-rounded img-responsive" style="width:100px;">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                               
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="submit" class="btn btn-info btn_style"><i
                                                    class="fa fa-check"></i>@lang('common.update')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_scripts')
<script type="text/javascript">
   // Function to calculate discounted price
    function calculateDiscountedPrice() {
        // Get the price and discount percentage from the input fields
        var price = parseFloat(document.getElementById('price').value);
        var discountPercentage = parseFloat(document.getElementById('discount_percentage').value);

        // Calculate the discounted price
        var discountedPrice = price - (price * (discountPercentage / 100));

        // Display the calculated discounted price in the corresponding input field
        document.getElementById('discounted_price').value = discountedPrice.toFixed(2);
    }

    // Attach the calculateDiscountedPrice function to the input fields' onchange events
    document.getElementById('price').addEventListener('input', calculateDiscountedPrice);
    document.getElementById('discount_percentage').addEventListener('input', calculateDiscountedPrice);
</script>
@endsection
