<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Receiving;
use App\JobMaster;
use App\ReceivingReq;
use App\PurchaseItem;
use App\PurchItemQty;
use App\ReceivingItem;
use App\TempReceiving;
use App\ReceivingReqItem;
use App\PurchaseStoreItem;
use App\site_item_quantity;
use Illuminate\Http\Request;

class ReceivingDirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Receiving::with(['warehouse', 'site', 'requestItems'])
                        ->where('receiving_req_id', 0)->get();

        return view('Receiving.Direct.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id){

    	$receiving = Receiving::where('id', $id)
                        ->with(['requestItems' => function($query){
                            $query->with(['purchaseItem']);
                        }, 'warehouse', 'site'])->first();

        return view('Receiving.Direct.show', compact('receiving'));
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

    public function requestApproval(Request $request){

        // ReceivingReq::where('id', $request->request_id)
        //     ->update(['status' => $request->btnValue]);

        $receiving_items = ReceivingItem::where('receiving_id', $request->receiving_id)->get();

        if($request->btnValue == 1){

            /*foreach($receiving_items as $item){

                site_item_quantity::where('item_id', $item->item_id)
                    ->where('site_id', $item->site_id)
                    ->increment('quantity', $item->qty);

            }*/

            $flag = 1;
        }elseif($request->btnValue == 2){
            /*foreach($receiving_items as $item){

                PurchaseStoreItem::where('item_id', $$item->item_id)
                    ->where('warehouse_id', $item->warehouse_id)
                    ->increment('quantity', $item_qty);
            }*/

            $flag = 2;
        }

        return $flag;
    }

    public function history(){

        $requests = Receiving::with(['warehouse', 'site', 'requestItems'])
                        ->where('receiving_req_id', 0)->get();

        return view('Receiving.Direct.history', compact('requests'));
    }

}