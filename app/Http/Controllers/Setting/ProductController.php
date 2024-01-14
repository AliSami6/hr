<?php

namespace App\Http\Controllers\Setting;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('demo')->only(['store', 'update', 'destroy']);
    }
    public function index()
    {
        $product = Product::orderBy('created_at','ASC')->get();
        return view('admin.setting.products.products', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.products.create_products');
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
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try
        {

            $product = new Product;
            
            $product->name = $request->name;
            $product->price = $request->price;
            $product->discount_percentage = $request->discount_percentage;
            $product->discounted_price = $request->discounted_price;

            $image = $request->file('image');

            if ($image) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $image->move('uploads/product/', $image_name);
                $product->image = $image_name;
            }

          
            $product->save();

            return ajaxResponse(200, 'Product added successfully.');

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
    public function list_orders()
    {
        $orders = Order::get();
        return view('admin.setting.orders.index',compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.setting.products.edit_products', ['product' => $product]);
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
            $product               = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->discount_percentage = $request->discount_percentage;
            $product->discounted_price = $request->discounted_price;

            $image = $request->file('image');

            if ($image) {
                if (file_exists('uploads/product/' . $product->image) && !empty($product->image)) {
                    unlink('uploads/product/' . $product->image);
                }

                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $image->move('uploads/product/', $image_name);
                $product->image = $image_name;
            }

            $product->save();

            return ajaxResponse(200, 'Product updated successfully.');

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
            $product = Product::find($id);
            if (file_exists('uploads/product/' . $product->image) && !empty($product->image)) {
                unlink('uploads/product/' . $product->image);
            }
            $product->delete();
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