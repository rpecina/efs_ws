<?php

namespace App\Http\Controllers;

use App\Fund;
use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Stock;
use App\Customer;

class FundController extends Controller
{
    public function index()
    {
        //
        $funds=Fund::all();
        return view('funds.index',compact('funds'));
    }

    public function show($id)
    {

        $fund = Fund::findOrFail($id);

        return view('funds.show',compact('fund'));
    }


    public function create()
    {
        $customers = Customer::lists('name','id');
        return view('funds.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $fund= new Fund($request->all());
        $fund->save();

        return redirect('funds');
    }

    public function edit($id)
    {
        $fund=Fund::find($id);
        return view('funds.edit',compact('fund'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        //
        $fund= new Fund($request->all());
        $fund=Fund::find($id);
        $fund->update($request->all());
        return redirect('funds');
    }

    public function destroy($id)
    {
        Fund::find($id)->delete();
        return redirect('funds');
    }
}
