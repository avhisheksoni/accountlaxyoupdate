<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\JobMaster;
use App\SiteManager;
use App\PurchaseItem;
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
      Session::forget('receiving_data');
      $warehouses = PurchaseWarehouse::all();

      return view('Receiving.Return.index', compact('sites', 'warehouses'));
    }

    public function create(){

        $userSite   = SiteManager::with(['site'])->where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();
        $warehouses = PurchaseWarehouse::all();

      return view('Receiving.Return.create', compact('userSite', 'warehouses'));
    }

    public function fetchItems(Request $request){

      $userSite = SiteManager::where('user_id', Auth::id())->where('deleted_at', null)->first();
      $query    = $request->get('query');

      $items    = PurchaseItem::with(['siteItemsQty' => function($query) use($userSite){
                      $query->where('site_id', $userSite->site_id);
                    }])->where('title', 'ILIKE', "%{$query}%")
                      ->orwhere('item_number', 'ILIKE', "%{$query}%")->get();
      //dd($items);
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

      if(count($items) != null){

        foreach($items as $row){
          $output .= '<li id="selectItem">&nbsp&nbsp&nbsp&nbsp<a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'">'.$row->title .' | '.$row->item_number.'  </a>&nbsp&nbsp&nbsp&nbsp</li>';
        }
      }else{
        $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
      }

      $output .= '</ul>';

      echo $output;
    }

    public function store(Request $request){

      if($request->flag == 'item_list_update'){

        $userSite   = SiteManager::where('user_id', Auth::id())
                        ->where('deleted_at', null)->first();

        $itemData   = PurchaseItem::with(['siteItemQty' => function($query) use($userSite){
                        $query->where('site_id', $userSite->site_id);
                        }, 'unit'])
                        ->where("item_number", (int)$request->item_number)->first();
      // /dd($itemData);

        //$actual_qty = PurchItemQty::where("item_number",$request->item_number)
          //              ->where('site_id','1')->first();

           // dd($actual_qty);

            if(Session::has('receiving_data') == null){

              $insertData[$itemData->id] = [
                                              'qty'          => 1,
                                              'item_id'      => $itemData->id,
                                              'name'         => $itemData->title,
                                              'unit_id'      => $itemData->unit->name,
                                              'item_number'  => $itemData->item_number,
                                              'actual_qty'   => $itemData['siteItemQty']->quantity
                                          ];

              Session::put('receiving_data', $insertData);
            }else{

                $sessionDatas = session('receiving_data');
                $sessionData  = '';

                foreach ($sessionDatas as $key => $value) {
                    if($key == $itemData->id){
                        $sessionData = session('receiving_data')[$itemData->id];
                        // $sessionData[]
                       $value['qty'] = $value['qty'] + 1;
                       $sessionDatas[$key] = $value;
                    }
                }           
                if($sessionData ==null){               
                    $sessionDatas[$itemData->id] = [
                                          'qty'          => 1,
                                          'item_id'      => $itemData->id,
                                          'name'         => $itemData->title,
                                          'unit_id'      => $itemData->unit->name,
                                          'item_number'  => $itemData->item_number,
                                          'actual_qty'   => $itemData['siteItemQty']->quantity
                                      ];
                }

                Session::put('receiving_data',$sessionDatas);
            }

            //dd(session()->get('receiving_data'));

          }elseif($request->flag == 'item_quntity_update'){
            $sessionDatas = session('receiving_data');
            $sessionData = '';
            foreach ($sessionDatas as $key => $value) {
                if($key == $request->item_id){
                    $sessionData = session('receiving_data')[$request->item_id];
                    // $sessionData[]
                   $value['qty'] = $request->qty;
                   $sessionDatas[$key] = $value;
                }
            }     
             session()->put('receiving_data',$sessionDatas);
          }

      return view('Receiving.Return.item-display');
    }

    public function history(){

      return view('Receiving.Return.history');
    }
}