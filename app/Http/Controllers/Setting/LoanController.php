<?php

namespace App\Http\Controllers\Setting;

use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan  = Loan::latest('id')->get();
        return view('admin.Loan.index',compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.Loan.create_loan');
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
            'reason' => 'required',
            'loan_amounts' => 'required',
            'per_months_pay_amount' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return ajaxResponse(422, 'Then given data was invalid.', $validator->errors());
        }

        try
        {
            $loan = new Loan;
            $loan->reason = $request->reason;
            $loan->emp_id = $request->emp_id;
            $loan->loan_amounts = $request->loan_amounts;
            $loan->per_months_pay_amount = $request->per_months_pay_amount;
           $loan->status = $request->status;
            $loan->save();
            return ajaxResponse(200, 'Loan added successfully.');

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
        $loan = Loan::find($id);
        return view('admin.Loan.edit_loan',compact('loan'));
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
         try
        {
           $loan = Loan::find($id);
              $loan->reason = $request->reason;
            $loan->emp_id = $request->emp_id;
            $loan->loan_amounts = $request->loan_amounts;
            $loan->per_months_pay_amount = $request->per_months_pay_amount;
           $loan->status = $request->status;
            $loan->save();

            return ajaxResponse(200, 'Loan updated successfully.');

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
            $loan = Loan::find($id);

            $loan->delete();
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