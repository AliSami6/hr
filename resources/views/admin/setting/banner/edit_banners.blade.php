@extends('admin.master')
@section('content')
@section('title')
    @lang('banners.edit_banners')
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
            <a href="{{ route('banner.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('banners.view_all_banners')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {{ Form::open(['route' => ['banner.update', $banner->id], 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'ajaxBanner', 'data-redirect' => route('banner.index'), 'method' => 'PUT']) }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('banners.title')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="title" value="{{ $banner->title }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('banners.subtitle')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="subtitle" value="{{ $banner->subtitle }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('banners.button_txt')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="button_txt" value="{{ $banner->button_txt }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('banners.image') (64X64)<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <img src="{{ url('uploads/banner_home/' . $banner->image) }}"
                                                class="img-rounded img-responsive" width="100px">
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
