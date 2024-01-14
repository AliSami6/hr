<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.setting.slider.sliders', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.setting.slider.create_sliders');
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

            $slider = new Slider;
            
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->button_txt = $request->button_txt;

            $image = $request->file('image');

            if ($image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $image->move('uploads/slider/', $image_name);
                $slider->image = $image_name;
            }

          
            $slider->save();

            return ajaxResponse(200, 'Slider added successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $Slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $slider = Slider::find($id);
        return view('admin.setting.slider.edit_sliders', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slider  $Slider
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
            $slider               = Slider::find($id);
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->button_txt = $request->button_txt;

            $image = $request->file('image');

            if ($image) {
                if (file_exists('uploads/slider/' . $slider->image) && !empty($slider->image)) {
                    unlink('uploads/slider/' . $slider->image);
                }

                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $image->move('uploads/slider/', $image_name);
                $slider->image = $image_name;
            }

            $slider->save();

            return ajaxResponse(200, 'Slider updated successfully.');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return ajaxResponse(500, 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);
            if (file_exists('uploads/slider/' . $slider->image) && !empty($slider->image)) {
                unlink('uploads/slider/' . $slider->image);
            }
            $slider->delete();
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