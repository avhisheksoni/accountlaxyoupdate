<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseModel;
use App\PJobMast;
use App\Gstin;
use App\tax_gst;
use App\TaxTdsmodel;
use App\Purchasechq;
use Illuminate\Support\Facades\Storage;
use Response;

class PurchaseController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    } 
     
    public function index(){

     return view('pages.purchaseform');	
   } 

   public function purchase_store(Request $request){
   	// $date=$request->purchase_date;
   	// $date1=explode("/",$date);
   	// $datef=$date1[2]."-".$date1[1]."-".$date[0];
   	//dd($request->all());
   	  $data= $request->validate([
        'job_id'=>'required',
        'invoive_number'=>'required',
        'sales_date'=>'required|date',
        'gross_total_invoice_value'=>'required|numeric',
        'invoice_type'=>'required',
        'base_amount_taxable_value'=>'required|numeric',
        'description'=>'required',
        // 'cheque_date'=>'required|date',
        // 'cheque_received_amount'=>'required|numeric',
        'tds_amount'=>'nullable',
        'other'=>'nullable',
        //'total_amount'=>'required|numeric',
        'outstanding'=>'required|numeric',
        'five_percrnt_sd_amount'=>'nullable',
        'gst_amount'=>'required|numeric',
        'mobilize_amount'=>'nullable|numeric',
        'retent_amount'=>'nullable|numeric',
        'other_deduct_amount'=>'nullable|numeric',
        'total_deduct_amount'=>'nullable|numeric',
        'gst_hold'=>'nullable|numeric',
        'balance_to_be_billed'=>'nullable|numeric',
        'amount_to_be_received'=>'nullable|numeric',
        'comp_id'=>'required|numeric',
        'tds_on_gst_2per'=>'nullable|numeric',
        'lab_cess_1per'=>'nullable|numeric',
        'hold_for_royalty'=>'nullable|numeric',
        'deb_late_submission_on_car_151day'=>'nullable|numeric',
        'electricity'=>'nullable|numeric',
        'rent'=>'nullable|numeric',
        'other2'=>'nullable|numeric',
        'bill_desc'=>'required',
        'taxable_value'=>'required',
        'bill_imposed_on'=>'required',


      ]);
      if($request->hasFile('bill_img')){
          $data['bill_img'] = storage::putfile('public/paybill',$request->file('bill_img'));;
      }
    //dd($data);
    $user = PurchaseModel::create($data);
        $lastId= $user->id;
         $array = $request->cheque_date_;
         $camot = $request->cheque_received_amount_;
         $sum = 0;
         for($count=0;  $count<count($array); $count++){
            $pdata['purchase_id'] = $lastId;
            $pdata['cheque_date'] = $array[$count];
            $pdata['cheque_amount'] = $camot[$count];
            $sum = $sum+$camot[$count];

            Purchasechq::create($pdata);


         }
    $datack['cheque_date']=$pdata['cheque_date'];
    $up['cheque_received_amount'] = $sum;
    PurchaseModel::where('id', $lastId)->increment('total_ck_rec', $sum);
    PurchaseModel::where('id', $lastId)->update($datack);
         
         return redirect('purchaselist');
    	
   }

   public function purchaselist(){
    $purchaselist = PurchaseModel::all();
     //dd($posts);
   	$data['gross'] = PurchaseModel::sum('gross_total_invoice_value');
    $data['bamt'] = PurchaseModel::sum('base_amount_taxable_value');
    $data['cra']  = PurchaseModel::sum('total_ck_rec');
    $data['usd']  = PurchaseModel::sum('outstanding');
    $data['gst']  = PurchaseModel::sum('gst_amount');
    return view('pages.purchaselist',compact('purchaselist','data'));	
   }

   public function purchasedetails($id){


    $edit = PurchaseModel::where('id',$id)->first();
    $ckamt = PurchaseModel::find($id)->checkamount;
    return view('pages.purchasedetails',compact('edit','ckamt'));
   }

   public function purchaseedit($id){

  $edit = PurchaseModel::where('id',$id)->first();
  $ckamt = PurchaseModel::find($id)->checkamount;
  $countchek = count($ckamt);
    return view('pages.purchase_edit',compact('edit','ckamt','countchek'));

   }

   public function update_purchase(Request $request ,$id){
      
      //dd($request->all());
       $data= $request->validate([
        'job_id'=>'required',
        'invoive_number'=>'required',
        'sales_date'=>'required|date',
        'gross_total_invoice_value'=>'required|numeric',
        'invoice_type'=>'required',
        'base_amount_taxable_value'=>'required|numeric',
        'description'=>'required',
        // 'cheque_date'=>'required|date',
        // 'cheque_received_amount'=>'required|numeric',
        'tds_amount'=>'nullable',
        'other'=>'nullable',
        //'total_amount'=>'required|numeric',
        'outstanding'=>'required|numeric',
        'five_percrnt_sd_amount'=>'nullable',
        'gst_amount'=>'required|numeric',
        'mobilize_amount'=>'nullable|numeric',
        'retent_amount'=>'nullable|numeric',
        'other_deduct_amount'=>'nullable|numeric',
        'total_deduct_amount'=>'nullable|numeric',
        'gst_hold'=>'nullable|numeric',
        'balance_to_be_billed'=>'nullable|numeric',
        'amount_to_be_received'=>'nullable|numeric',
        'comp_id'=>'required|numeric',
        'tds_on_gst_2per'=>'nullable|numeric',
        'lab_cess_1per'=>'nullable|numeric',
        'hold_for_royalty'=>'nullable|numeric',
        'deb_late_submission_on_car_151day'=>'nullable|numeric',
        'electricity'=>'nullable|numeric',
        'rent'=>'nullable|numeric',
        'other2'=>'nullable|numeric',
        'bill_desc'=>'required',
        'taxable_value'=>'required',
        'bill_imposed_on'=>'required',
      ]);
      // dd($data);
       if($request->hasFile('bill_img')){
          $data['bill_img'] = storage::putfile('public/salesbill',$request->file('bill_img'));
      }
       PurchaseModel::where('id', $id)->update($data);
        $lastId = $request->purchase_id;
        // dd($lastId);
        $array = $request->cheque_date_;
        $amount = $request->cheque_received_amount_;
        $ckamtid = $request->ckamtid;
        $sum = 0;
        //dd(count($array));
    for($count=0; $count<count($array);$count++){
       
       $udate['purchase_id'] = $lastId;
       $udate['cheque_date'] = $array[$count];
       $udate['cheque_amount'] = $amount[$count];
       //dd($udate);
       $sum = $sum+$amount[$count];
       //dd($ckamtid[$count]);
       if(@$ckamtid[$count]){
          Purchasechq::where('id', @$ckamtid[$count])->where('purchase_id',$lastId)->update($udate);

       }else{
          Purchasechq::create($udate);
       }
    }
    $total_a['total_ck_rec'] = $sum;
    PurchaseModel::where('id', $id)->update($total_a);
        return redirect('purchaselist')->with('message','Purchase Details  Is Successfully Update');
   }

   public function purchasedelete($id){

     $dservice = PurchaseModel::where('id', $id)->delete();
      return redirect()->back()->with('message','Purchase Details  Is Successfully Removed From List');
   }

    public function deletecheck(Request $request){

      Purchasechq::where('id',$request->id)->delete();
   }

   public function deleteeditcheck(Request $request){
      
      $pchek = Purchasechq::find($request->id)->cheque_amount;
      PurchaseModel::where('id', $request->purchid)->decrement('total_ck_rec', intval($pchek));
      PurchaseModel::where('id', $request->purchid)->increment('outstanding', intval($pchek));
      return Purchasechq::where('id',$request->id)->delete();


   }

   public function getoutstanding(Request $request){

          $out = PurchaseModel::find($request->Pid)->outstanding;
          return $out;
   }

}
