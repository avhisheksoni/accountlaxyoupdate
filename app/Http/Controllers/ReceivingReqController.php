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
use App\PurchaseStoreItem;
use Illuminate\Http\Request;

class ReceivingReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$requests = ReceivingReq::with(['warehouse', 'site', 'receiving'])->get();

    	//dd($requests[0]['receiving']->manager);
        return view('Receiving.Request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$sites = job_master::all();

    	$items = PurchaseItem::has('purchaseStoreQty')
    				->select('id', 'item_number', 'title', 'unit_id')
    				->with(['purchaseStoreQty' => function($query){
    					$query->orderBy('warehouse_id');
    				}, 'unit'])
    				->paginate(25);

        return view('Receiving.Request.create', compact('items', 'sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$logged_user= Auth::id();
    	$warehouses	= array_unique($request->warehouse);

    	foreach($warehouses as $warehouse){

    		$tempReq = TempReceiving::where('user_id', $logged_user)
                                ->where('warehouse_id', $warehouse)
                                ->first();

			$receivingReq = ReceivingReq::create([
                                'site_id'       => 	$tempReq->site_id,
                                'warehouse_id'  =>  $warehouse,
                                'remark'  		=>  $request->remark,
                                'user_id'  		=>  $logged_user
                            ]);

            $tempItems = TempReceiving::where('user_id', $logged_user)
            					->where('warehouse_id', $warehouse)
                                ->get();

            foreach($tempItems as $item){

                ReceivingReqItem::create([
                    'receiving_request_id'	=>  $receivingReq->id,
                    'item_number'   		=>  $item->item_number,
                    'qty'					=>  $item->qty,
                    'item_id'               =>  $item->item_id,

                ]);
            }
            Session::forget('site_id');
            TempReceiving::where('user_id', $logged_user)
							->where('warehouse_id', $warehouse)
                            ->delete();
    	}

    	return back()->with('success', 'Request has been sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
    	$records = TempReceiving::where('user_id', $user)
    					->with(['item_name', 'warehouse', 'site'])
    					->get();
    	$total_qty = TempReceiving::where('user_id', $user)
    					->sum('qty');
    	$site = job_master::where('id', Session::get('site_id'))->first();

        $table = '<form action="'.route('receiving-request.store').'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'">
        <div class="row card-body text-center">
					<div class="col-6">
						<h4>Site</h4>
						<div>
							<strong> '.$site->job_describe.' </strong>
						</div>
					</div>
					<div class="col-6">
						<h4>Total Items(QTY)</h4>
						<div>
							<strong>'.$total_qty.' </strong>
						</div>
					</div>
				</div>
				<div class="row card-body text-center">
					<table class="table table-striped">
					  <thead>';
		$table .='<tr>
				    <th scope="col">#</th>
				    <th scope="col">Item</th>
				    <th scope="col">Number</th>
				    <th scope="col">Qty</th>
					<th scope="col">Warehouse</th>
				</tr></thead>
					  <tbody>';
				$count = 0;
			foreach ($records as $record) {
				$table .='<tr>
            <input type="hidden" name="warehouse[]" value="'.$record['warehouse']->id.'">
							<th scope="row">'.++$count.'</th>
						    <td>'.$record['item_name']->title.'</td>
						    <td>'.$record->item_number.'</td>
						    <td>'.$record->qty.'</td>
						    <td>'.$record['warehouse']->name.'</td>
						</tr>';
			}
		$table .='</tbody></table></div>
					<div class="text-center">
						<label>REMARK</label>
					</div>
					<div class="row container">
    					<div class="col-md-12">
    						<textarea cols="100" id="comment" rows="3" name="remark"> </textarea>
    					</div>
					</div>
					<div class="text-center">
						<button name="submit" class="btn btn-primary btn-sm text-center">Submit</button> 
					</div></div></form>';
        return $table;
    }

    public function showRequest( $id){

    	$request = ReceivingReq::where('id', $id)
    					->with(['requestItems' => function($query){
    						$query->with(['purchaseItem']);
    					}, 'warehouse', 'site'])->first();

    	return view('Receiving.Request.show', compact('request'));
    }

    public function receivingSite(Request $request){

    	if($request->site_id != ''){
			Session::put('site_id', $request->site_id);
			$flag = 1;
    	}else{
    		Session::forget('site_id');
    		$flag = 0;
    	}

    	return $flag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
    	$user 	   = $request->item['user'];
    	$site_id   = Session::get('site_id');
        $item_no   = $request->item['item'];
        $item_qty  = $request->item['qty'];
        $warehouse = $request->item['warehouse'];
        $item_id = $request->item['item_id'];

		$record = TempReceiving::where('user_id', $user)
					->where('item_number', $item_no)
					->where('warehouse_id', $warehouse)
					->first();

		if($record == null){

            if($item_qty != 0){

                TempReceiving::insert([
                	'site_id'		=> $site_id,
                    'user_id'    	=> $user,
                    'item_number'	=> $item_no,
                    'qty'        	=> $item_qty,
                    'warehouse_id'  => $warehouse,
                    'item_id'       => $item_id
                ]);
            }

        }elseif($item_qty == 0){

        	TempReceiving::where('user_id', $user)
                ->where('item_number', $item_no)
                ->where('warehouse_id', $warehouse)
                ->delete();

        }else{
            TempReceiving::where('user_id', $user)
                ->where('item_number', $item_no)
                ->where('warehouse_id', $warehouse)
                ->update(['qty' => $item_qty]);
        }
    	return $request->all();
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

    public function searchItems(Request $request){

        $search = $request->search_items;
        $string = $request->type;

        if($search == ""){
            return redirect()->route('receiving.create');        
        }

        $sites = job_master::all();
        $items = PurchaseItem::has('purchaseStoreQty')
        			->where($string, 'ilike', '%'.$search.'%')
        			->paginate(20);

        return view('Receiving.Request.create', compact('items', 'sites'));
    }

    public function receivingLog(){
        return view('Receiving.Log.index');
    }

    public function receivingDirect(){
        return view('Receiving.Direct.index');
    }

}
