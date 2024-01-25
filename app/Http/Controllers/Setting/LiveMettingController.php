<?php

namespace App\Http\Controllers\Setting;

use App\LiveMetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LiveMettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $meetings = LiveMetting::orderBy('created_at', 'ASC')->get();
        return view('admin.LiveMetting.index', ['meetings' => $meetings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.LiveMetting.create_mettings');
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
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'links' => 'required',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try {
            $meetings = new LiveMetting();
            $meetings->name = $request->name;
            $meetings->start_time = $request->start_time;
            $meetings->end_time = $request->end_time;
            $meetings->links = $request->links;

            $meetings->save();
            return ajaxResponse(200, 'Metting added successfully.');
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
        $meeting = LiveMetting::find($id);
        return view('admin.LiveMetting.edit_mettings', compact('meeting'));
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
            'name' => 'string',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try {
            $meetings = LiveMetting::find($id);
            $meetings->name = $request->name;
            $meetings->start_time = $request->start_time;
            $meetings->end_time = $request->end_time;
            $meetings->links = $request->links;

            $meetings->save();

            return ajaxResponse(200, 'Meeting updated successfully.');
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
            $meetings = LiveMetting::find($id);

            $meetings->delete();
            DB::commit();
            $bug = 0;
        } catch (\Exception $e) {
            return $e;
            DB::rollback();
            $bug = $e->errorInfo[1];
        }

        if ($bug == 0) {
            echo 'success';
        } elseif ($bug == 1451) {
            echo 'hasForeignKey';
        } else {
            echo 'error';
        }
    }
}