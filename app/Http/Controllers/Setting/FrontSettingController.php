<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Model\FrontSetting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FrontSettingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('demo')->only(['store']);
    }

    public function index()
    {
        $setting = FrontSetting::orderBy('id', 'desc')->first();
        return view('admin.setting.front.front_setting', ['setting' => $setting]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_title' => 'required',
            'company_logo' => 'nullable|mimes:jpeg,jpg,png,gif,webp',
            'home_page_big_title' => 'required',
            'home_page_short_description' => 'required',
            'service_title' => 'required',
            'job_title' => 'required',
            'feature_image_one' => 'nullable|mimes:jpeg,jpg,png,gif',
            'feature_image_two' => 'nullable|mimes:jpeg,jpg,png,gif',
            'feature_image_three' => 'nullable|mimes:jpeg,jpg,png,gif',
            'feature_image_four' => 'nullable|mimes:jpeg,jpg,png,gif',
            'banner_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'about_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'job_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'service_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'contact_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'product_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'footer_text' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'contact_address' => 'required',
            'counter_1_title' => 'required',
            'counter_2_title' => 'required',
            'counter_3_title' => 'required',
            'counter_4_title' => 'required',
            'counter_1_value' => 'required',
            'counter_2_value' => 'required',
            'counter_3_value' => 'required',
            'counter_4_value' => 'required',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try {
            $front = FrontSetting::first();

            $front->company_title = $request->company_title;
            $front->home_page_big_title = $request->home_page_big_title;
            $front->home_page_short_description = $request->home_page_short_description;
            $front->home_page_feature_title = $request->home_page_feature_title;
            $front->home_page_feature_short_description = $request->home_page_feature_short_description;
            $front->features_one = $request->features_one;
            $front->features_two = $request->features_two;
            $front->features_three = $request->features_three;
            $front->product_title = $request->product_title;
            $front->team_title = $request->team_title;
            $front->service_title = $request->service_title;
            $front->job_title = $request->job_title;
            $front->about_one_title = $request->about_one_title;
            $front->about_one_details = $request->about_one_details;
            $front->about_two_title = $request->about_two_title;
            $front->about_two_details = $request->about_two_details;
            $front->contact_phone = $request->contact_phone;
            $front->contact_email = $request->contact_email;
            $front->contact_title = $request->contact_title;
            $front->contact_subtitle = $request->contact_subtitle;
            $front->contact_address = $request->contact_address;
            $front->counter_1_title = $request->counter_1_title;
            $front->counter_2_title = $request->counter_2_title;
            $front->counter_3_title = $request->counter_3_title;
            $front->counter_4_title = $request->counter_4_title;
            $front->counter_1_value = $request->counter_1_value;
            $front->counter_2_value = $request->counter_2_value;
            $front->counter_3_value = $request->counter_3_value;
            $front->counter_4_value = $request->counter_4_value;
            $front->show_job = $request->show_job;
            $front->show_service = $request->show_service;
            $front->footer_text = $request->footer_text;

            $logo = $request->file('company_logo');
            $banner_image = $request->file('banner_image');
            $about_one_image = $request->file('about_one_image');
            $about_two_image = $request->file('about_two_image');
            $feature_image_one = $request->file('feature_image_one');
            $feature_image_two = $request->file('feature_image_two');
            $feature_image_three = $request->file('feature_image_three');
            $feature_image_four = $request->file('feature_image_four');
            $about_image = $request->file('about_image');
            $job_image = $request->file('job_image');
            $service_image = $request->file('service_image');
            $contact_image = $request->file('contact_image');
            $product_image = $request->file('product_image');

            if ($logo) {
                $name = 'logo' . '.' . $logo->getClientOriginalExtension();
                $logo->move('uploads/front/', $name);
                $front->logo = $name;
            }
            if ($banner_image) {
                $name = 'banner_image' . '.' . $banner_image->getClientOriginalExtension();
                $banner_image->move('uploads/front/', $name);
                $front->banner_image = $name;
            }

            if ($about_image) {
                $name = 'about_image' . '.' . $about_image->getClientOriginalExtension();
                $about_image->move('uploads/front/about/', $name);
                $front->about_image = $name;
            }
             if ($job_image) {
                $name = 'job_image' . '.' . $job_image->getClientOriginalExtension();
                $job_image->move('uploads/front/job/', $name);
                $front->job_image = $name;
            }
            if ($service_image) {
                $name = 'service_image'.'.'.$service_image->getClientOriginalExtension();
                $service_image->move('uploads/front/service/', $name);
                $front->service_image = $name;
            }
           
            if ($contact_image) {
                $name = 'contact_image' . '.' . $contact_image->getClientOriginalExtension();
                $contact_image->move('uploads/front/contact/', $name);
                $front->contact_image = $name;
            }
            if ($product_image) {
                $name = 'product_image' . '.' . $product_image->getClientOriginalExtension();
                $product_image->move('uploads/front/product/', $name);
                $front->product_image = $name;
            }
            if ($about_one_image) {
                $name = 'about_one_image' . '.' . $about_one_image->getClientOriginalExtension();
                $about_one_image->move('uploads/front/', $name);
                $front->about_one_image = $name;
            }
            if ($about_two_image) {
                $name = 'about_two_image' . '.' . $about_two_image->getClientOriginalExtension();
                $about_two_image->move('uploads/front/', $name);
                $front->about_two_image = $name;
            }
            if ($feature_image_one) {
                $feature_image_one_name = 'feature_image_one' . '.' . $feature_image_one->getClientOriginalExtension();
                $feature_image_one->move('uploads/front/', $feature_image_one_name);
                $front->feature_image_one = $feature_image_one_name;
            }
            if ($feature_image_two) {
                $feature_image_two_name = 'feature_image_two' . '.' . $feature_image_two->getClientOriginalExtension();
                $feature_image_two->move('uploads/front/', $feature_image_two_name);
                $front->feature_image_two = $feature_image_two_name;
            }
            if ($feature_image_three) {
                $feature_image_three_name = 'feature_image_three' . '.' . $feature_image_three->getClientOriginalExtension();
                $feature_image_three->move('uploads/front/', $feature_image_three_name);
                $front->feature_image_three = $feature_image_three_name;
            }
            if ($feature_image_four) {
                $feature_image_four_name = 'feature_image_four' . '.' . $feature_image_four->getClientOriginalExtension();
                $feature_image_four->move('uploads/front/', $feature_image_four_name);
                $front->feature_image_four = $feature_image_four_name;
            }

            $front->update();

            return ajaxResponse(200, 'Front setting updated successfully.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Something went wrong.');
        }
    }
}