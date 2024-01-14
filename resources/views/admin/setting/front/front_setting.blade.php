@extends('admin.master')
@section('content')

@section('title')
    @lang('front.front_end_setting')
@endsection

<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i
                            class="fa fa-home"></i>@lang('dashboard.dashboard')</a></li>
                <li>@yield('title')</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading"><i class="mdi mdi-clipboard-text fa-fw"></i>@yield('title')</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="{{ route('front.setting.submit') }}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal ajaxFormSubmit" data-redirect="{{ route('front.setting') }}"
                            method="POST" id="frontSetting">

                            <div class="form-body">
                                <div class="row">
                                    <input type="hidden" value="{{ $setting->id }}" name="id">
                                    <div class="col-md-4 mt-1" style="margin-top:10px;">

                                        <label class="control-label">@lang('front.company_name')<span
                                                class="validateRq">*</span></label>

                                        <input type="text" class="form-control" name="company_title"
                                            value="{{ $setting->company_title }}"
                                            placeholder="{{ __('front.company_name') }}" required>

                                    </div>
                                    <div class="col-md-4 mt-1" style="margin-top:10px;">

                                        <label class="control-label">@lang('front.company_logo')<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->logo) }}"
                                            style="max-height: 90px;">
                                        <input type="file" class="form-control" name="company_logo" value="">

                                    </div>

                                    <div class="col-md-4 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.home_page_big_title')<span
                                                class="validateRq">*</span></label>

                                        <input type="text" class="form-control" name="home_page_big_title"
                                            placeholder="@lang('front.home_page_big_title')" value="{{ $setting->home_page_big_title }}">
                                    </div>

                                    <div class="col-md-12 mt-1" style="margin-top:10px;">

                                        <label class="control-label">@lang('front.home_page_short_description')<span
                                                class="validateRq">*</span></label>
                                        <textarea class="form-control" placeholder="@lang('front.home_page_short_description')" name="home_page_short_description">{{ $setting->home_page_short_description }}</textarea>
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.home_page_feature_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="home_page_feature_title"
                                            placeholder="@lang('front.home_page_feature_title')"
                                            value="{{ $setting->home_page_feature_title }}">
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">

                                        <label class="control-label">@lang('front.home_page_feature_short_description')<span
                                                class="validateRq">*</span></label>
                                        <textarea class="form-control" placeholder="@lang('front.home_page_feature_short_description')" name="home_page_feature_short_description">{{ $setting->home_page_feature_short_description }}</textarea>
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.features_one')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="features_one"
                                            placeholder="@lang('front.features_one')" value="{{ $setting->features_one }}">
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.features_two')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="features_two"
                                            placeholder="@lang('front.features_two')" value="{{ $setting->features_two }}">
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.features_three')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="features_three"
                                            placeholder="@lang('front.features_three')" value="{{ $setting->features_three }}">
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.product_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="product_title"
                                            placeholder="@lang('front.product_title')" value="{{ $setting->product_title }}">
                                    </div>
                                    <div class="col-md-12 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.team_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="team_title"
                                            placeholder="@lang('front.team_title')" value="{{ $setting->team_title }}">
                                    </div>
                                    <div class="col-md-6 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.service_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="service_title"
                                            placeholder="@lang('front.service_title')" value="{{ $setting->service_title }}">
                                    </div>

                                    <div class="col-md-6 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.job_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="job_title"
                                            placeholder="@lang('front.job_title')" value="{{ $setting->job_title }}">
                                    </div>


                                    <!-- counter  -->
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_1_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_1_title"
                                            placeholder="@lang('front.counter_1_title')" value="{{ $setting->counter_1_title }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_2_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_2_title"
                                            placeholder="@lang('front.counter_2_title')" value="{{ $setting->counter_2_title }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_3_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_3_title"
                                            placeholder="@lang('front.counter_3_title')" value="{{ $setting->counter_3_title }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_4_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_4_title"
                                            placeholder="@lang('front.counter_4_title')" value="{{ $setting->counter_4_title }}">
                                    </div>

                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_1_value')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_1_value"
                                            placeholder="@lang('front.counter_1_value')" value="{{ $setting->counter_1_value }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_2_value')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_2_value"
                                            placeholder="@lang('front.counter_2_value')" value="{{ $setting->counter_2_value }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_3_value')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_3_value"
                                            placeholder="@lang('front.counter_3_value')" value="{{ $setting->counter_3_value }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.counter_4_value')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="counter_4_value"
                                            placeholder="@lang('front.counter_4_value')" value="{{ $setting->counter_4_value }}">
                                    </div>

                                    <!-- about us  -->

                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.feature_image_one') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->feature_image_one) }}"
                                            style="max-height:100px;">
                                        <input type="file" class="form-control" name="feature_image_one"
                                            placeholder="@lang('front.feature_image_one')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.feature_image_two') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->feature_image_two) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="feature_image_two"
                                            placeholder="@lang('front.feature_image_two')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.feature_image_three') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->feature_image_three) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="feature_image_three"
                                            placeholder="@lang('front.feature_image_three')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.feature_image_four') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->feature_image_four) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="feature_image_four"
                                            placeholder="@lang('front.feature_image_four')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.about_one_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="about_one_title"
                                            placeholder="@lang('front.about_one_title')" value="{{ $setting->about_one_title }}">
                                    </div>
                                    <div class="col-md-6 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.about_one_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->about_one_image) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="about_one_image"
                                            placeholder="@lang('front.about_one_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.about_one_details')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="about_one_details"
                                            placeholder="@lang('front.about_one_details')"
                                            value="{{ $setting->about_one_details }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;width:30%;">
                                        <label class="control-label">@lang('front.about_two_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="about_two_title"
                                            placeholder="@lang('front.about_two_title')" value="{{ $setting->about_two_title }}">
                                    </div>
                                    <div class="col-md-6 mt-1" style="margin-top:10px;widht:30%;">
                                        <label class="control-label">@lang('front.about_two_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->about_two_image) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="about_two_image"
                                            placeholder="@lang('front.about_two_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.about_two_details')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="about_two_details"
                                            placeholder="@lang('front.about_two_details')"
                                            value="{{ $setting->about_two_details }}">
                                    </div>



                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_email')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="contact_email"
                                            placeholder="@lang('front.contact_email')" value="{{ $setting->contact_email }}">
                                    </div>

                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_phone')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="contact_phone"
                                            placeholder="@lang('front.contact_phone')" value="{{ $setting->contact_phone }}">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_address')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="contact_address"
                                            placeholder="@lang('front.contact_address')" value="{{ $setting->contact_address }}">
                                    </div>

                                    <!-- flug show   -->
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.show_job_section')<span
                                                class="validateRq">*</span></label>
                                        <select type="text" class="form-control" name="show_job"
                                            placeholder="@lang('front.show_job_section')">
                                            <option @if ($setting->show_job == 1) selected @endif value="1">
                                                Yes
                                            </option>
                                            <option @if ($setting->show_job == 0) selected @endif value="0">No
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.show_service_section')<span
                                                class="validateRq">*</span></label>
                                        <select type="text" class="form-control" name="show_service"
                                            placeholder="@lang('front.show_service_section')">
                                            <option @if ($setting->show_service == 1) selected @endif value="1">
                                                Yes
                                            </option>
                                            <option @if ($setting->show_service == 0) selected @endif value="0">No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.footer_text')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="footer_text"
                                            placeholder="@lang('front.footer_text')" value="{{ $setting->footer_text }}" />
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.banner_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/' . $setting->banner_image) }}"
                                            style="max-height: 100px;">
                                        <input type="file" class="form-control" name="banner_image"
                                            placeholder="@lang('front.banner_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.about_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/about/' . $setting->about_image) }}"
                                            style="width: 100px;">
                                        <input type="file" class="form-control" name="about_image"
                                            placeholder="@lang('front.about_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.job_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/job/' . $setting->job_image) }}"
                                            style="width: 100px;">
                                        <input type="file" class="form-control" name="job_image"
                                            placeholder="@lang('front.job_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.service_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/service/' . $setting->service_image) }}"
                                            style="width: 100px;">
                                        <input type="file" class="form-control" name="service_image"
                                            placeholder="@lang('front.service_image')">
                                    </div>
                                    <div class="col-md-3 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/contact/' . $setting->contact_image) }}"
                                            style="width: 100px;">
                                        <input type="file" class="form-control" name="contact_image"
                                            placeholder="@lang('front.contact_image')">
                                    </div>
                                    <div class="col-md-4 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.product_image') (100X100)<span
                                                class="validateRq">*</span></label>
                                        <img src="{{ url('uploads/front/product/' . $setting->product_image) }}"
                                            style="width: 100px;">
                                        <input type="file" class="form-control" name="product_image"
                                            placeholder="@lang('front.product_image')">
                                    </div>
                                      <div class="col-md-4 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_title')<span
                                                class="validateRq">*</span></label>
                                        <input type="text" class="form-control" name="contact_title"
                                            placeholder="@lang('front.contact_title')" value="{{ $setting->contact_title }}" />
                                    </div>
                                     <div class="col-md-4 mt-1" style="margin-top:10px;">
                                        <label class="control-label">@lang('front.contact_subtitle')<span
                                                class="validateRq">*</span></label>
                                                 <textarea class="form-control" placeholder="@lang('front.contact_subtitle')" name="contact_subtitle" rows="3" cols="5">{{ $setting->contact_subtitle }}</textarea>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-8" style="margin-top:20px;">
                                                <button type="submit" class="btn btn-info btn_style"><i
                                                        class="fa fa-check"></i>@lang('common.update')</button>
                                            </div>
                                        </div>
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
