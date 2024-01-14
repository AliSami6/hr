<?php

namespace App\Http\Controllers\Setting;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }
    public function index()
    {
        $banner = Banner::orderBy('created_at','ASC')->get();
        return view('admin.setting.banner.banners', ['banner' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.banner.create_banners');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subtitle' => 'required',
            'button_txt' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try
        {
            $banner = new Banner;
            $banner->title = $request->title;
            $banner->subtitle = $request->subtitle;
            $banner->button_txt = $request->button_txt;
            $image = $request->file('image');
            if ($image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/banner_home/', $image_name);
                $banner->image = $image_name;
            }
            $banner->save();
            return ajaxResponse(200, 'Banner added successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.setting.banner.edit_banners', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try
        {
            $banner               = Banner::find($id);
            $banner->title = $request->title;
            $banner->subtitle = $request->subtitle;
            $banner->button_txt = $request->button_txt;

            $image = $request->file('image');

            if ($image) {
                if (file_exists('uploads/banner_home/' . $banner->image) && !empty($banner->image)) {
                    unlink('uploads/banner_home/' . $banner->image);
                }

                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $image->move('uploads/banner_home/', $image_name);
                $banner->image = $image_name;
            }

            $banner->save();

            return ajaxResponse(200, 'Banner updated successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          try {
            $banner = Banner::find($id);
            if (file_exists('uploads/banner_home/' . $banner->image) && !empty($banner->image)) {
                unlink('uploads/banner_home/' . $banner->image);
            }
            $banner->delete();
            DB::commit();
            $bug = 0;

        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            $bug = $e->errorInfo[1]; 
        }

        if ($bug == 0) {
            echo "success";
        } elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }
}