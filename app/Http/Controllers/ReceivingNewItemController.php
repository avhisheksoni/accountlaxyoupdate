<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Receiving;
use App\job_master;
use App\ReceivingReq;
use App\PurchaseItem;
use App\PurchItemQty;
use App\TempReceiving;
use App\ReceivingReqItem;
use App\UnitMeasure;
use App\PurchaseStoreItem;
use Illuminate\Http\Request;

class ReceivingNewItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    	$requests	= ReceivingReq::with(['warehouse', 'site', 'receiving'])->get();
    	//dd($requests[0]['receiving']->manager);
        return view('Receiving.NewItem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    	$units 	= UnitMeasure::all();
    	return view('Receiving.NewItem.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
    	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
