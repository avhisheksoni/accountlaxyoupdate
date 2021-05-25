<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Receiving;
use App\JobMaster;
use Carbon\Carbon;
use App\UnitMeasure;
use App\SiteManager;
use App\ReceivingReq;
use App\PurchaseItem;
use App\ReceivingNew;
use App\PurchItemQty;
use App\TempReceiving;
use App\ReceivingReqItem;
use App\ReceivingNewItem;
use App\PurchaseStoreItem;
use App\PurchaseWarehouse;
use Illuminate\Http\Request;

class ReceivingNewItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    	$applications	= ReceivingNew::with(['warehouse', 'site', 'receiving'])
                            ->where('user_id', Auth::id())
                            ->get();

        return view('Receiving.NewItem.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $userSite    = SiteManager::with(['site'])->where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();
    	$units 	     = UnitMeasure::all();
        $warehouses  = PurchaseWarehouse::all();

    	return view('Receiving.NewItem.create', compact('userSite', 'warehouses', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $zone   = Carbon::now('Asia/Kolkata');

        $site       = SiteManager::where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();

        $newReceiving = ReceivingNew::create([
                            'site_id'       => $site->site_id,
                            'warehouse_id'  => $request->warehouse,
                            'user_id'       => Auth::id(),
                            'date'          => $zone->format('Y-m-d H:i:s')
                        ]);

        $totalQty = 0;
        foreach($request['item'] as $item){

            ReceivingNewItem::create([
                'new_receiving_id'  =>  $newReceiving['id'],
                'name'              =>  $item['name'],
                'qty'               =>  $item['quantity'],
                'unit_id'           =>  $item['unit_id'],
                'remark'            =>  $item['description']
            ]);

            $totalQty = $totalQty+$item['quantity'];
        }

        ReceivingNew::where('id', $newReceiving['id'])->update(['total_qty' => $totalQty]);

        return redirect()->route('request-new-item.index')->with('success', 'Request has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){

        $application   = ReceivingNew::with(['warehouse', 'site', 'receiving', 'items'])
                            ->where('id', $id)
                            ->where('user_id', Auth::id())
                            ->first();
    	return view('Receiving.NewItem.show', compact('application'));
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
    public function destroy($id){
        //
    }

    public function history(){
        
        $applications   = ReceivingNew::with(['warehouse', 'site', 'receiving'])
                            ->where('user_id', Auth::id())
                            ->get();

        return view('Receiving.NewItem.history', compact('applications'));
    }

    public function manganesiteitems(){

      $user_id = Auth()->user()->id;
      $site_id = SiteManager::where('user_id',$user_id)->where('deleted_at','=',null)->first();
       if($site_id != '')  {     
       $alloteitem = PurchItemQty::where('site_id',$site_id->site_id)->get();
        return view('Receiving.NewItem.siteitemlist', compact('alloteitem'));
    }else{

        return view('Receiving.NewItem.noaccess');
    }
    }
}
