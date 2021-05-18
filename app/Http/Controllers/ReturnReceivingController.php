<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\JobMaster;
use App\PurchaseWarehouse;
use Illuminate\Http\Request;


class ReturnReceivingController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites 		= JobMaster::where('deleted_at', Null)->orderBy('id','ASC')->get();
        $warehouses = PurchaseWarehouse::all();

        return view('Receiving.Return.index', compact('sites', 'warehouses'));
    }

    public function returnReceivingSite(Request $request){

    	if($request->site_id != ''){
			Session::put('return_site_id', $request->site_id);
			$flag = 1;
    	}else{
    		Session::forget('return_site_id');
    		$flag = 0;
    	}

    	return $flag;
    }

    public function fetchItems(Request $request)
    {
        $query  = $request->get('query');
        $data   =  item::where('title', 'ILIKE', "%{$query}%")->orwhere('item_number', 'ILIKE', "%{$query}%")->get();
       // dd($data);
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

        if(count($data) != null)
        {
              foreach($data as $row)
              {
                $output .= '<li id="selectLI"><a id="getItemID" href="?itemId='.$row->id.'" style="pointer-events: none;" value="'.$row->id.'">'.$row->title .' | '.$row->item_number.'  </a></li>';
              }
        }
        else
        {
            $output .= '<li><a href="JavaScript:void(0);">No Items available</a></li>';
        }
        $output .= '</ul>';
        echo $output;
    }
}