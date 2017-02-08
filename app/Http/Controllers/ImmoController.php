<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Immobilia;
use App\Customer;

class ImmoController extends Controller
{
    public function index()
    {
        //
        $immobilias=Immobilia::all();
        return view('immobilias.index',compact('immobilias'));
    }

    public function show($id)
    {

        $immobilia = Immobilia::findOrFail($id);

        return view('immobilias.show',compact('immobilia'));
    }


    public function create()
    {
        $customers = Customer::lists('name','id');
        return view('immobilias.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $immobilia= new Immobilia($request->all());
        $immobilia->save();

        return redirect('immobilias');
    }

    public function edit($id)
    {
        $immobilia=Immobilia::find($id);
        return view('immobilias.edit',compact('immobilia'));
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
        $immobilia= new Immobilia($request->all());
        $immobilia=Immobilia::find($id);
        $immobilia->update($request->all());
        return redirect('immobilias');
    }

    public function destroy($id)
    {
        Immobilia::find($id)->delete();
        return redirect('immobilias');
    }
}
