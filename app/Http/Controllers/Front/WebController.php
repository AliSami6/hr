<?php

namespace App\Http\Controllers\Front;

use App\Order;
use Exception;
use App\Banner;
use App\Slider;
use App\Product;
use App\Model\Job;
use Dotenv\Validator;
use App\Model\Services;
use App\Model\JobApplicant;
use Illuminate\Http\Request;
use App\Lib\Enumerations\JobStatus;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;

class WebController extends Controller
{
    //

    public function index(Request $request)
    {
        $published = 1;
        $active = 1;
        $job = Job::where('status', '=', $published)
            ->where('application_end_date', '>=', date('Y-m-d'))
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        if (request()->ajax()) {
            $job = Job::where('status', '=', $published)
                ->where('application_end_date', '>=', date('Y-m-d'))
                ->paginate(5);

            return \View('front.job_pagination', ['jobs' => $job])->render();
        }
        $sliders = Slider::get();
        $services = Services::where('status', '=', $active)->get();
        $banners = Banner::get();
        $products = Product::get();
        return view('front.index', ['jobs' => $job, 'services' => $services, 'sliders' => $sliders, 'banners' => $banners, 'products' => $products]);
    }

    public function productList()
    {
        $products = Product::get();
        return view('front.products', ['products' => $products]);
    }
    public function jobDetails($id, $slug)
    {
        $job = Job::find($id);

        return view('front.job_details', ['job' => $job]);
    }

    public function jobApply(JobApplicationRequest $request)
    {
        try {
            $applicant = new JobApplicant();
            $applicant->job_id = $request->job_id;
            $applicant->applicant_name = $request->name;
            $applicant->applicant_email = $request->email;
            $applicant->phone = $request->phone;
            $applicant->cover_letter = $request->cover_letter;
            $applicant->application_date = date('Y-m-d');
            $applicant->status = JobStatus::$Apply;

            $resume = $request->file('resume');

            if ($resume) {
                $file_name = str_replace(' ', '-', $request->name) . '-' . time() . '.' . $resume->getClientOriginalExtension();
                $resume->move('uploads/applicantResume/', $file_name);
                $applicant->attached_resume = $file_name;
            }

            $applicant->save();

            return redirect()
                ->back()
                ->with('success', 'Application Successful');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
    public function cart()
    {
        return view('front.cart');
    }
    public function checkout(){
          session()->forget('cart');
        return view('front.checkout');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'discounted_price' => $product->discounted_price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()
            ->back()
            ->with('success', 'Product add to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            // Return a JSON response with success message
             return redirect()->back()->with('success', 'Cart successfully updated!');
                // return response()->json(['success' => 'Cart updated successfully!']);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()
                ->back()
                ->with('success', 'Product successfully removed!');
        }
    }
     public function processOrder(Request $request)
    {
       $input = $request->except('_token');
        //dd($input);
        try {
            Order::create($input);
            return redirect()->back()->with('success', 'Order placed successfully.');
            session()->forget('cart_total');
            session()->forget('cart_Qty');
         
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong.');
        }
   
    }
}