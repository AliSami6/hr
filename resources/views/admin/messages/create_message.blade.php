@extends('admin.master')
@section('content')

@section('title')
    @lang('message.message_list')
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
            <a href="{{ route('message.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('message.view_message')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {{ Form::open(['route' => 'message.store', 'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'ajaxMessage', 'data-redirect' => route('message.index')]) }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('message.receiver')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <select class="form-control required role_name" name="receiver">
                                                @php
                                                    $users = DB::table('employee')->get();
                                                @endphp
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->first_name.' '.$item->last_name }}">
                                                        {{ $item->first_name.' '.$item->last_name }}</option>
                                                          
                                                @endforeach
                                                 
                                            </select>
                                          <input type="hidden" name="employee_id" value="{{Auth::user()->user_id}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('message.subject')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="subject" value="{{ old('subject') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('message.message')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                           
                                                <textarea class="form-control required role_name" name="message" cols="3" rows="4"> </textarea>
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
