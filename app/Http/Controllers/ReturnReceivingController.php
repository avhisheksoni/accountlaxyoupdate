<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\JobMaster;
use App\Receiving;
use Carbon\Carbon;
use App\SiteManager;
use App\PurchaseItem;
use App\PurchItemQty;
use App\ReceivingItem;
use App\PurchaseWarehouse;
use Illuminate\Http\Request;


class ReturnReceivingController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

      $userSite   = SiteManager::where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();

      $receivings = Receiving::where('site_id', $userSite->site_id)
                      ->where('mode', 1)
                      ->where('complete', 0)
                      ->get();

      return view('Receiving.Return.index', compact('receivings'));
    }

    public function create(){

        $userSite   = SiteManager::with(['site'])->where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();
        $warehouses = PurchaseWarehouse::all();

      return view('Receiving.Return.create', compact('userSite', 'warehouses'));
    }

    public function setWarehouse(Request $request){

      $warehouse = $request->warehouse_id;
      Session::forget('receivingCart');
      Session::put('ware-location', $warehouse);
    }

    public function fetchItems(Request $request){

      $data['userSite'] = SiteManager::where('user_id', Auth::id())->where('deleted_at', null)->first();
      $data['ware_location'] = (int)Session::get('ware-location');
      $query         = $request->get('query');


      $items    = PurchaseItem::has('siteItemsQty')
                    ->with(['siteItemsQty' => function($query) use($data){
                      $query->where('site_id', $data['userSite']->site_id)
                        ->where('wareh_id', $data['ware_location'])->where('quantity', '>', 0);
                    }])->where('title', 'ILIKE', "%{$query}%")
                      ->orwhere('item_number', 'ILIKE', "%{$query}%")->get();
      //dd($items);
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

      if(count($items[0]['siteItemsQty']) != null){
        foreach($items as $row){
          $output .= '<li id="selectItem"><a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'" data->'.$row->title .' | '.$row->item_number.'</a></li>';
        }
      }else{
        $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
      }

      $output .= '</ul>';

      echo $output;
    }

    public function store(Request $request){

        $data['userSite']      = SiteManager::where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();

        $data['ware_location'] = (int)Session::get('ware-location');

        $itemData   = PurchaseItem::with(['siteItemQty' => function($query) use($data){
                        $query->where('site_id', $data['userSite']->site_id)
                        ->where('wareh_id', $data['ware_location'])
                        ->where('quantity', '>', 0);
                        }, 'unit'])
                        ->where("item_number", (int)$request->item_number)->first();
        //dd($itemData);
      if(Session::has('receivingCart') == null){ 

        $insertData[$itemData->id] = [
                                        'qty'          => 1,
                                        'item_id'      => $itemData->id,
                                        'name'         => $itemData->title,
                                        'unit_id'      => $itemData->unit->name,
                                        'item_number'  => $itemData->item_number,
                                        'actual_qty'   => $itemData['siteItemQty']->quantity
                                    ];

        Session::put('receivingCart', $insertData);
      }else{

          $receivingCart = Session::get('receivingCart');
          $sessionCartItems  = '';

          foreach ($receivingCart as $key => $value) {

              if($key == $itemData->id){

                $sessionCartItems     = Session::get('receivingCart')[$itemData->id];
                $value['qty']         = $value['qty'] + 1;
                $receivingCart[$key]  = $value;
              }
          }

          if($sessionCartItems == null){               
              $receivingCart[$itemData->id] = [
                                    'qty'          => 1,
                                    'item_id'      => $itemData->id,
                                    'name'         => $itemData->title,
                                    'unit_id'      => $itemData->unit->name,
                                    'item_number'  => $itemData->item_number,
                                    'actual_qty'   => $itemData['siteItemQty']->quantity
                                ];
          }

          Session::put('receivingCart', $receivingCart);
      }
      return view('Receiving.Return.item-display');
    }

    public function updateItemQty(Request $request){

      $receivingCart    = Session::get('receivingCart');
      $sessionCartItems = '';

      foreach ($receivingCart as $key => $value) {

        if($key == $request->item_id){

          $sessionCartItems     = Session::get('receivingCart')[$request->item_id];
          $value['qty']         = $request->qty;
          $receivingCart[$key]  = $value;

        }
      }

      Session::put('receivingCart', $receivingCart);

      return back();
    }

    public function removeCartItem(Request $request){

      $id   = $request->item_id;
      Session::forget('receivingCart.'.$id);  
      $data = Session::get('receivingCart');

      return back();
    }

    public function storeReceivingCart(Request $request){

      $userSite = SiteManager::where('user_id', Auth::id())
                    ->where('deleted_at', null)->first();

      $data['date']          = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
      $data['mode']          = 1;
      $data['remark']        = $request->comment;
      $data['site_id']       = $userSite->site_id;
      $data['warehouse_id']  = $request->warehouse_id;
      $data['dispatcher_id'] = Auth::id();
      $data['total_quantity']= $request->total_qty;
      
      $last_id = Receiving::create($data)->id;

      if($last_id){

        $session_data = Session::get('receivingCart');

        foreach($session_data as $item){

          $items['receiving_id'] = $last_id;
          $items['item_id']      = $item['item_id'];
          $items['qty']          = $item['qty'];
          $items['unit']         = $item['unit_id'];
          $items['site_id']      = $userSite->site_id;
          $items['warehouse_id'] = $request->warehouse_id;
          $items['remain_qty_warehouse'] = $item['actual_qty']-$item['qty'];

          ReceivingItem::create($items);

          PurchItemQty::where('item_id', $item['item_id'])
              ->where('site_id', $userSite->site_id)
              ->decrement('quantity', $item['qty']);
        }
      }
      Session::forget('receivingCart');
      Session::forget('ware-location');
      return $last_id;
    }

    public function destroyCartReceiving(){

      Session::remove('receivingCart');
      Session::remove('ware-location');
      return back();
    }

    public function history(){

      $userSite   = SiteManager::where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();

      $receivings = Receiving::where('site_id', $userSite->site_id)
                      ->where('mode', 1)
                      ->get();

      return view('Receiving.Return.history', compact('receivings'));
    }
}