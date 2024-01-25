@extends('admin.master')
@section('content')

@section('title')
    @lang('live.create_meeting')
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
            <a href="{{ route('meeting.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('live.view_all_meeting')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {{ Form::open(['route' => 'meeting.store','class' => 'form-horizontal ajaxFormSubmit', 'id' => 'ajaxMeeting', 'data-redirect' => route('meeting.index')]) }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('live.name')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('live.start_time')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="time" class="form-control required role_name"
                                                name="start_time" value="{{ old('start_time') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('live.end_time')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="time" class="form-control required role_name"
                                                name="end_time" value="{{ old('end_time') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('live.links')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="links" value="{{ old('links') }}">
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
                                                    class="fa fa-check"></i>@lang('common.save')</button>
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
