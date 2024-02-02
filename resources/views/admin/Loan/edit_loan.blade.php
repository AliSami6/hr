@extends('admin.master')
@section('content')
@section('title')
    @lang('loan.edit_loan')
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
            <a href="{{ route('loan.index') }}"
                class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i
                    class="fa fa-list-ul" aria-hidden="true"></i> @lang('loan.view_loan')</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        {{ Form::open(['route' => ['loan.update', $loan->id],  'class' => 'form-horizontal ajaxFormSubmit', 'id' => 'ajaxLoan', 'data-redirect' => route('loan.index'), 'method' => 'PUT']) }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('loan.reason')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="reason" value="{{ $loan->reason }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('loan.loan_amounts')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control required role_name"
                                                name="loan_amounts" value="{{ $loan->loan_amounts }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('loan.per_months_pay_amount')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control required role_name"
                                                name="per_months_pay_amount" value="{{ $loan->per_months_pay_amount }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">@lang('loan.status')<span
                                                class="validateRq">*</span></label>
                                        <div class="col-md-8">
                                             <select class="form-control required role_name" name="status">
                                                <option value="accepted" {{$loan->status == 'accepted' ? 'selected' : ''}}>Accepted</option>
                                                <option value="pending" {{$loan->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                            </select>
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
