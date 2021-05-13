@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1  class="text-success"><i><b>Payable Bill Form</b></i></h1>
          <p class="fa fa-edit">Reconcillation</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Purchase Form</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Purchase List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('update_purchase',[$edit->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                 <div class="col-lg-4">
                  @php 
                  $cmp = App\Company_mast::all();
                  @endphp
                  <div class="form-group">
                    <label for="comp_id">Our Company</label>
                    <input class="form-control" id="place_of_su" value="{{ App\Company_mast::find($edit->comp_id)->name }}" name="comp_idcomp_id" type="text" placeholder="place of supply" readonly>
                    <input class="form-control" id="place_of_su" value="{{ $edit->comp_id }}" name="comp_id" type="hidden" placeholder="place of supply" readonly>
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-4">
                   <div class="form-group">
                    <label for="e_commerce_gstin">GST</label>
                    <input class="form-control" id="e_commerce_gstin" value="{{ $edit->job->Pgstin->gstin}}" name="e_commerce_gstin" type="text" placeholder="E-commerce_gstin" readonly>
                     @error('e_commerce_gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="place_of_supply">Place of Supply</label>
                    <input class="form-control" id="place_of_supply" value="{{ $edit->job->place_of_supply }}" name="place_of_supply" type="text" placeholder="place of supply" readonly>
                     @error('place_of_supply')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               <div id="dialog" title="Message" style="display: none">
  <p>Receiving Amount Must be less than of Equal to Outstanding</p>
</div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                    <label for="client_id">Sub-Contractor</label>
                    <input class="form-control" id="place_of_supply" value="{{ $edit->job->Pclient->firm_name }}" name="client_idclient_id" type="text" placeholder="place of supply" readonly>
                    <input class="form-control" id="place_of_supply" value="{{ $edit->job->client_id }}" name="client_id" type="hidden" placeholder="place of supply" readonly>
                    @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">Sub-Contractor GST</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ $edit->job->Pclient->gst_number }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                     @error('gsstin_uin_of_recipient')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="job_id">Job code</label>
                    <input class="form-control" id="place_of_sup" value="{{ $edit->job->name."||".$edit->job->job_code }}" name="job_idjob_id" type="text" placeholder="place of supply" readonly>
                    <input class="form-control" id="place_of_sup" value="{{ $edit->job->id }}" name="job_id" type="hidden" placeholder="place of supply" readonly>
                    @error('job_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 

              <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label for="bill_desc">Work Name</label>
                    <input class="form-control" id="bill_desc" name="bill_desc" type="text" aria-describedby="emailHelp" value="{{ $edit->bill_desc }}" placeholder="Enter Work Name For Billing">
                     @error('bill_desc')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                    <label for="cat_id">Category</label>
                    <input class="form-control" id="cat_id" type="text" aria-describedby="emailHelp" name="cat_id" value="{{ App\job_categorgy::find($edit->job->cat_id)->name }}" placeholder="enter Category" readonly="">
                     @error('cat_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                    <label for="bill_imposed_on">Bill Imposed On</label>
                      <input class="form-control" id="jobcarwrt" name="bill_imposed_on" value="{{ $edit->bill_imposed_on }}" type="text" aria-describedby="emailHelp" placeholder="Enter bill imposed on" readonly="">
                     @error('bill_imposed_on')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               
              <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="invoive_number">Invoice No.</label>
                    <input class="form-control" id="invoive_number" name="invoive_number" type="text" aria-describedby="emailHelp" value="{{ $edit->invoive_number }}" placeholder="Invoice No." required="">
                     @error('invoive_number')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="sales_date">Invoice Date</label>
                   <input type="text" id="sales_date" class="form-control" name="sales_date" value="{{ $edit->sales_date}}" placeholder="sales date" autocomplete="off">
                     @error('sales_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="invoice_type">Invoice Type</label>
                    <input type="text" id="sales_d" class="form-control" name="invoice_type" value="{{ $edit->invoice_type }}" placeholder="Invoice Date" autocomplete="off" />
                     @error('invoice_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
              <div class="col-lg-4">
                    <div class="form-group">
                    <label for="base_amount_taxable_value">Base Amount(taxable)</label>
                    <input class="form-control amount pro" id="base_amount_taxable_value" type="text" aria-describedby="emailHelp" value="{{ $edit->base_amount_taxable_value == '' ? '0' : $edit->base_amount_taxable_value }}" name="base_amount_taxable_value" placeholder="Base amount taxable value" readonly >
                     @error('base_amount_taxable_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="mobilize_amount">Mobilization Amount</label>
                    <input class="form-control amount pro" id="mobilize_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->mobilize_amount == '' ? '0' : $edit->mobilize_amount }}" name="mobilize_amount" placeholder="Base amount taxable value" readonly >
                     @error('mobilize_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="taxable_value">Taxable Amount</label>
                    <input class="form-control amount pro" id="taxable_valueeeee" type="text" aria-describedby="emailHelp" value="{{ $edit->taxable_value  == '' ? '0' : $edit->taxable_value }}" name="taxable_value" placeholder="Base amount taxable value" readonly >
                     @error('taxable_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
                <div class="row">
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gst_rate">Gst Rate(%)</label>
                     <input class="form-control" id="gst_rate" value="{{ $edit->job->Pgst->tax_gst    == '' ? '0' : $edit->job->Pgst->tax_gst }}" name="gst_rate" type="text" placeholder="Enter gst_rate" readonly>
                     @error('gst_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gst_amount">Gst Amount</label>
                    <input class="form-control pro" id="gst_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->gst_amount   == '' ? '0' : $edit->gst_amount }}" name="gst_amount" placeholder="Enter gst_amount" readonly="">
                     @error('gst_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gross_total_invoice_value">Gross Total(Invoice value)</label>
                    <input class="form-control pro" id="gross_total_invoice_value" name="gross_total_invoice_value"  type="text" value="{{ $edit->gross_total_invoice_value == '' ? '0' : $edit->gross_total_invoice_value }}" aria-describedby="emailHelp" placeholder="Enter gross total" readonly="">
                     @error('gross_total_invoice_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
               @php  $s_no= 1 @endphp
              @foreach($ckamt as $cmaot)
              <div class="row" id="{{ "row".$s_no }}">
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">paid  Date</label>
                      <input type="text"  class="form-control cheque_date2" name="cheque_date_[]" value="{{ $cmaot->cheque_date }}" placeholder="cheque  date" autocomplete="off">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <input type="hidden" name="ckamtid[]" value="{{ $cmaot->id }}" id="{{ 'bal_id'.$s_no}}">
                <input type="hidden" name="purchase_id" value="{{ $cmaot->purchase_id }}">
                <input type="hidden" name="countchek" value="{{ $countchek }}" id="countchek">
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">paid Amount</label>
                    <input class="form-control pro adamount onedit" id="cheque_received_amount{{ $s_no }}" name="cheque_received_amount_[]" type="text" value="{{ $cmaot->cheque_amount }}" aria-describedby="emailHelp" placeholder="cheque received amount" autocomplete="off">
                  
                     @error('cheque_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
                <div class="col-lg-3 mt-4"><div><button type="button" name="remove" id="{{ $s_no }}" class="btn btn-danger btn_remove">X</button></div>
                </div>
              </div>
              @php $s_no++ @endphp
               @endforeach
               <input type="hidden" name="saless" id="purch" value="{{ $edit->id }}">
               <div id="Content">
                  <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
              <div id="dynamic_field"></div>
               
              <div class="row">
               <div class="col-lg-3">
                 <div class="form-group">
                    <label for="tds">TDS Rate(%)</label>
                    <input class="form-control" id="tds" value="{{ $edit->job->Ptds->tds_tax   == '' ? '0' : $edit->job->Ptds->tds_tax }}" name="tds" type="text" placeholder="Enter Tds Rate" readonly>
                     @error('tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="tds_amount">Tds Amount</label>
                    <input class="form-control pro mob" id="tds_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->tds_amount   == '' ? '0' : $edit->tds_amount }}" name="tds_amount" placeholder="Enter TDS Amount"  readonly="">
                     @error('tds_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                    <label for="five_percrnt_sd">Security Deposite Rate(%)</label>
                    <input class="form-control" id="five_percrnt_sd" name="five_percrnt_sd" type="text" aria-describedby="emailHelp" value="{{ $edit->five_percrnt_sd   == '' ? '0' : $edit->five_percrnt_sd }}" placeholder="Enter  Security Deposite Rate" readonly>
                     @error('five_percrnt_sd')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                   <div class="col-lg-3">
                    <div class="form-group">
                    <label for="five_percrnt_sd_amount">Security Deposite Amount</label>
                    <input class="form-control total pro mob tobereceived" id="five_percrnt_sd_amount" value="{{ $edit->five_percrnt_sd_amount   == '' ? '0' : $edit->five_percrnt_sd_amount }}" name="five_percrnt_sd_amount" type="number" placeholder="Enter Security Amount" readonly="">
                     @error('five_percrnt_sd_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
              </div>
            </div>
             <div class="row">
              <div class="col-lg-6">
                 <div class="form-group">
                    <label for="retent_amount">Retention Money</label>
                    <input class="form-control  pro mob tobereceived dect" id="retent_amount" name="retent_amount"  type="number" aria-describedby="emailHelp" value="{{ $edit->retent_amount   == '' ? '0' : $edit->retent_amount }}" placeholder="Enter Retention Amount">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="other_deduct_amount">Other Deduction1</label>
                    <input class="form-control mob dect" id="other_deduct_amount" name="other_deduct_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->other_deduct_amount   == '' ? '0' : $edit->other_deduct_amount }}" placeholder="Enter Other Deduction Amount">
                     @error('other_deduct_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
               <div class="row">
               <div class="col-lg-4">
                 <div class="form-group">
                    <label for="tds_on_gst_2per">Tds On GST_@2%</label>
                    <input class="form-control mob dect" id="tds_on_gst_2per" value="{{  $edit->tds_on_gst_2per   == '' ? '0' :  $edit->tds_on_gst_2per }}" name="tds_on_gst_2per" type="text" placeholder="Enter Tds On Gst 2per">
                     @error('tds_on_gst_2per')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="lab_cess_1per">LAB CESS @1%</label>
                    <input class="form-control pro mob dect" id="lab_cess_1per" type="text" aria-describedby="emailHelp" value="{{  $edit->lab_cess_1per   == '' ? '0' :  $edit->lab_cess_1per }}" name="lab_cess_1per" placeholder="Enter Lab Cess 1per">
                     @error('lab_cess_1per')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                    <label for="hold_for_royalty">Hold For Royalty</label>
                    <input class="form-control mob tobereceived dect" id="hold_for_royalty" name="hold_for_royalty" type="text" aria-describedby="emailHelp" value="{{  $edit->hold_for_royalty   == '' ? '0' :  $edit->hold_for_royalty }}" placeholder="Enter Hold For Royalty" >
                     @error('hold_for_royalty')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            </div>  
            <div class="row">
               <div class="col-lg-4">
                 <div class="form-group">
                    <label for="deb_late_submission_on_car_151day">DEB LATE Submission On CAR 151 DAY</label>
                    <input class="form-control mob dect" id="deb_late_submission_on_car_151day" value="{{  $edit->deb_late_submission_on_car_151day   == '' ? '0' :  $edit->deb_late_submission_on_car_151day }}" name="tds" type="text" placeholder="Enter Deb Late Submission" >
                     @error('deb_late_submission_on_car_151day')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="electricity">Electricity</label>
                    <input class="form-control mob pro dect" id="electricity" type="text" aria-describedby="emailHelp" value="{{  $edit->electricity   == '' ? '0' :  $edit->electricity }}" name="electricity" placeholder="Enter Electricity Charge" >
                     @error('electricity')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                    <label for="rent">Rent</label>
                    <input class="form-control mob dect" id="rent" name="rent" type="text" aria-describedby="emailHelp" value="{{ $edit->rent   == '' ? '0' : $edit->rent }}" placeholder="Enter Rent Amount" >
                     @error('rent')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            </div> 
            <div class="row">
               <div class="col-lg-4">
                 <div class="form-group">
                    <label for="other2">Other Deduction2</label>
                    <input class="form-control mob dect" id="other2  " value="{{ $edit->other2   == '' ? '0' : $edit->other2 }}" name="other2" type="text" placeholder="Enter other if any" >
                     @error('other2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="total_deduct_amount">Total Deduction Amount</label>
                    <input class="form-control  pro dect" id="total_deduct_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->total_deduct_amount   == '' ? '0' : $edit->total_deduct_amount }}" name="total_deduct_amount" placeholder="Enter Total Deduction Amount" >
                     @error('total_deduct_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                    <label for="gst_hold">Gst Hold (if any)</label>
                    <input class="form-control mob tobereceived dect" id="gst_hold" name="gst_hold" type="text" aria-describedby="emailHelp" value="{{ $edit->gst_hold   == '' ? '0' : $edit->gst_hold }}" placeholder="Enter Gst Hold (if any)" >
                     @error('gst_hold')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            </div> 
            <div class="row">
               <div class="col-lg-4">
                 <div class="form-group">
                    <label for="balance_to_be_billed">Balance To Be Billed</label>
                    <input class="form-control" id="balance_to_be_billed" value="{{ $edit->balance_to_be_billed   == '' ? '0' : $edit->balance_to_be_billed }}" name="balance_to_be_billed" type="text" placeholder="Enter Balance To Be Billed" readonly="">
                     @error('balance_to_be_billed')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="total_order_value">Total Order Value</label>
                    <input class="form-control pro" id="work_value" type="text" aria-describedby="emailHelp" value="{{ $edit->work_value   == '' ? '0' : $edit->work_value }}" name="work_value" placeholder="Total Order Value" readonly="">
                     @error('work_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                    <label for="amount_to_be_received">Amount To Be Received</label>
                    <input class="form-control dect" id="amount_to_be_received" name="amount_to_be_received" type="text" aria-describedby="emailHelp" value="{{ $edit->amount_to_be_received   == '' ? '0' : $edit->amount_to_be_received }}" placeholder="Enter Amount To Be Received" readonly="">
                     @error('amount_to_be_received')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            </div>    
              <div class="row">
              <div class="col-lg-3">
                  <div class="form-group">
                    <label for="outstanding">Outstanding</label>
                    <input class="form-control pro dect" id="outstanding" name="outstanding" type="text" aria-describedby="emailHelp" value="{{ $edit->outstanding   == '' ? '0' : $edit->outstanding }}" placeholder="Enter Outstanding" readonly="">
                     @error('outstanding')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="bill_img"><b>Bill Upload</b></label>
                    <input class="form-control" name="bill_img" type="file">
                     @error('bill_img')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="description">Description</label>
                     <textarea class="form-control" id="description"   name="description" rows="3">{{ $edit->description}}</textarea>
                  @error('description')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                 {{--  @if($edit->bill_img != '') --}}
                 @php $array = ["pdf", "xls"];
                      $ext = ["jpg", "jpeg","png"]

                  @endphp 
                 @if (in_array(pathinfo($edit->bill_img, PATHINFO_EXTENSION), $array))
                 {{-- <button ><a href="{{ route('download-pdf',$edit->id) }}" class="btn btn-danger" >PDF</a></button> --}}
                 <embed src="{{ Illuminate\Support\Facades\Storage::url($edit->bill_img) }}" style="height:80px;width:100px;">
                  @elseif(in_array(pathinfo($edit->bill_img, PATHINFO_EXTENSION), $ext))
                  <img src="{{ Illuminate\Support\Facades\Storage::url($edit->bill_img) }}" style="height:80px;width:100px;">
                  @else
                  <img src="{{ Illuminate\Support\Facades\Storage::url('guarantee/download.png') }}" style="height:80px;width:100px;">
                  @endif
                </div>
                <div class="col-lg-6">
                </div>
              </div>
  
              </div>  
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
              </div>
            </form>
        </div>
      </div>
    </main>
     <script>
$(document).ready(function(){

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
 $("#comp_id").on('change',function(){
      var rec_id = $(this).val();

      $.ajax({
                 type: "GET",
                 url: "{{ route('Passign-client') }}?id="+rec_id,
                 success: function(res){
                  // console.log(res);
                  if(res){
                    $("#client_id").empty();
                    $("#client_id").append('<option value="">Select Receiver</option>');
                    $.each(res,function(index, recev){
                    $("#client_id").append('<option value='+recev.petty['id']+'>'+recev.petty['firm_name']+'</option>');
              });
                  }
}

 });
 });
 var i= parseInt($('#countchek'). val())+1;
  $('#add').click(function(){
    // if(osfinal > 0){
    $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-lg-5"><div class="form-group"><label for="cheque_date">Cheque  Date</label><input type="text" id="cheque_date'+i+'" class="form-control cheque_date2" name="cheque_date_[]" value="" placeholder="cheque  date" autocomplete="off">@error('cheque_date')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="col-lg-4"><div class="form-group"><label for="cheque_received_amount">Cheque Amount</label><input class="form-control adamount onedit" id="cheque_received_amount'+i+'" name="cheque_received_amount_[]" type="text" value="0" aria-describedby="emailHelp" placeholder="cheque received amount">@error('cheque_received_amount')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="col-lg-3 mt-4"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
    i++;
 // }
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    var bal_id = $('#bal_id'+button_id).val();
    var sale_id = $('#purch').val();
    var gval =  $('#cheque_received_amount'+button_id).val();
    var toout = $('#outstanding').val();
    if(bal_id != null){
         $.ajax({
                url: "{{  route('delete-edit-check')}}",
                type: 'GET',
                data: {'id':bal_id,'purchid': sale_id},
                success: function (data) {
                 console.log(data);
                 
                }
            })
$('#outstanding').val(parseFloat(toout)+parseFloat(gval));
$('#row'+button_id+'').remove();


    }else{
      //console.log(gval);
      $('#outstanding').val(parseFloat(toout)+parseFloat(gval));
      $('#row'+button_id+'').remove();
    }

  });

 $("#client_id").on('change',function(){
       
       var cl_id = $(this).val();
       var cmp_id = document.getElementById('comp_id').value;
      
      $.ajax({
                url: "{{  route('purchase-work')}}",
                type: 'GET',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':cl_id,'cid':cmp_id},
                success: function (data) {
                  //console.log(data);
                  $("#job_id").empty();
                  $("#job_id").append('<option value="0">Work Name</option>');
                    $.each(data,function(index, recev){
                    $("#job_id").append('<option value='+recev.id+'>'+recev.name+'||'+recev.job_code+'</option>');
              });
                 
                }
            })
       

 });

 $("#job_id").on("change",function(){
       // $(".pro").val("");
           var id = $(this).val();
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-preceiver') }}?id="+id,
                 success: function(res){
                  //console.log(res);
                 if(res){
                        $("#gst_rate").empty();
                        $("#gst_rate").val(res.gst['tax_gst']);
                        $("#place_of_supply").empty();
                        $("#place_of_supply").val(res.place_of_supply);
                        $("#tds").empty();
                        $("#tds").val(res.tds['tds_tax']);
                        $("#gsstin_uin_of_recipient").empty();
                        $("#gsstin_uin_of_recipient").val(res.client['gst_number']);
                        $("#workname").empty();
                        $("#workname").val(res.name);
                        $("#five_percrnt_sd").empty();
                        $("#five_percrnt_sd").val(res.sd_percentage);
                        $("#e_commerce_gstin").empty();
                        $("#e_commerce_gstin").val(res.gstin['gstin']);
                        $("#cat_id").empty();
                        $("#cat_id").val(res.cat_id['name']);
                        $("#work_value").empty();
                        $("#work_value").val(res.work_value);
                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });

            
      });

     $("#mobilize_amount").on('blur',function (){
        var gross  = gross_total();
        console.log(gross);
       $("#gross_total_invoice_value").val(0);
       $("#gross_total_invoice_value").val(gross[0]);
       $("#taxable_valueeeee").val(0);
       $("#taxable_valueeeee").val(gross[3]);
       $("#gst_amount").val(0);
       $("#gst_amount").val(gross[1]);
       $("#tds_amount").val(0);
       $("#tds_amount").val(gross[4]);
       //$("#total_amount").val(0);
       $("#cheque_received_amount").val(0);
       $("#outstanding").val(0);
       $("#balance_to_be_billed").empty();
       $("#balance_to_be_billed").val(gross[2]);
       $("#five_percrnt_sd_amount").val(0);
       $("#five_percrnt_sd_amount").val(gross[5]);

     });

     $(".mob").on('blur',function(){
         var mob = 0;
         var checkpay = 0;
         var bereceived = 0;
         var tds_deduct_amount  =  $("#tds_amount").val();
         var givtv  =  $("#gross_total_invoice_value").val();
         var gsthold  =  $("#gst_hold").val();
          $('.mob').each(function(){
                    mob = parseFloat(mob) + parseFloat(($(this).val()));
                });
            var tdeductamount = parseFloat(mob)+parseFloat(tds_deduct_amount); //-parseFloat(gsthold);
            $('#total_deduct_amount').val(tdeductamount);
            $('.adamount').each(function(){
                    checkpay = parseFloat(checkpay) + parseInt(($(this).val()));
                });
            //console.log(checkpay);
            $('#outstanding').val(parseFloat(givtv)-parseFloat(tdeductamount)-parseFloat(checkpay));
            $('.tobereceived').each(function(){
                    bereceived = parseFloat(bereceived) + parseInt(($(this).val()));
                });
            $('#amount_to_be_received').val(bereceived);
             })


     $('#base_amount_taxable_value').on('click',function(){
         var billimp = $('#bill_imposed_on').val();
         if( billimp == ''){
           alert('Please select Bill Imposed on');
            
         }

      })
          $('#bill_imposed_on').on('change',function(){
          $('#base_amount_taxable_value').val(0);
          $('#mobilize_amount').val(0);
          $('#gross_total_invoice_value').val(0);
          $('#taxable_valueeeee').val(0);
          $('#tds_amount').val(0);
          $('#five_percrnt_sd_amount').val(0);
          $('#gst_amount').val(0);
          $('#cheque_received_amount').val(0);
          $(".dect").val(0);
          $('#gst_amount').val(0);
          $(".dectdate").val("");
          $('.cheque_date2').val("");
      })

      $(document).on('click', '.reedit', function(){
    $(".dect").val(0);
      
  });
  //       $(document).on('blur', '.redit', function(){
  //   $(".dect").val(0);
      
  // });
    $(document).on('blur','.onedit',function(){
      var camt = $(this).val();
      var mob = 0;
      var checkpay = 0;
      var bereceived = 0;
      var pid = $('#purch').val();
      var givtv  =  $("#gross_total_invoice_value").val();
      // var tds_deduct_amount = 0;
      alert(camt);
      $.ajax({
                url: "{{  route('get-current-out')}}",
                type: 'GET',
                data: {'Pid':pid},
                success: function (data) {
                 var valot = data;
                 $('.mob').each(function(){
                    mob = parseFloat(mob) + parseFloat(($(this).val()));
                    
                });
            var tdeductamount = parseFloat(mob);
            $('#total_deduct_amount').val(tdeductamount);
            $('.adamount').each(function(){
                    checkpay = parseFloat(checkpay) + parseInt(($(this).val()));
                });
            $('#outstanding').val(parseFloat(givtv)-parseFloat(tdeductamount)-parseFloat(checkpay));
            $('.tobereceived').each(function(){
                    bereceived = parseFloat(bereceived) + parseInt(($(this).val()));
                });
            $('#amount_to_be_received').val(bereceived);
                 
       //$('#outstanding').val(parseFloat(valot)-parseFloat(camt));
                }
            })
    })

     $(".gross").on("blur", function() {
        var gross  = gross_total();
        var outstand = outstanding();
        var other_charges = $(this).val();

        // $(".total_deduction").val();

        // $("#gross_total_invoice_value").val(gross[0]);
        // var ggross = document.getElementById('gross_total_invoice_value').value;
        $("#outstanding").val(parseFloat(outstand[2])-parseFloat(other_charges));

    });

        function gross_total(){
           var billon =  $('#bill_imposed_on').val();
           var gst = $('#gst_rate').val();
           var tdsr = $('#tds').val();
           var sdr = $('#five_percrnt_sd').val();
           var batv = $('#base_amount_taxable_value').val();
           var mobilizea = $('#mobilize_amount').val();
           var work_order_value = $('#work_value').val();
           var bal_to_bill = (parseFloat(work_order_value)-parseFloat(batv)).toFixed(2);
           var taxable_amount = parseFloat(batv)-parseFloat(mobilizea);
           var gstrate = (taxable_amount * gst)/100;
           var total = (parseFloat(batv) + parseFloat(gstrate)).toFixed(2);
           if(billon == 'OBA'){
           var tdsrate = (taxable_amount * tdsr)/100;
           var sdrate = (taxable_amount * sdr)/100;
           }else if(billon == 'OGA'){
            var total = (parseFloat(batv) + parseFloat(gstrate)).toFixed(2);
            var tdsrate = (total * tdsr)/100;
            var sdrate = (total * sdr)/100;

           }
           return [total,gstrate,bal_to_bill,taxable_amount,tdsrate,sdrate];
        }

        function outstanding(){
             var grosst = document.getElementById('gross_total_invoice_value').value;
        if(grosst != ""){
          var tds = document.getElementById('tds').value;
          var batv = document.getElementById('base_amount_taxable_value').value;
          var cra = document.getElementById('cheque_received_amount').value;
          var fpsd = document.getElementById('five_percrnt_sd').value;
          var tdsam = (batv * tds)/100;
           var fivesd = (batv * fpsd)/100;
           var tcar = (parseFloat(cra)+parseFloat(tdsam)).toFixed(2);
          // outst = parseFloat(cra)+parseFloat(tdsam)+parseFloat(fivesd);
           outst = parseFloat(tcar)+parseFloat(fivesd);
           total = document.getElementById('gross_total_invoice_value').value;
           outs = (parseFloat(total)-parseFloat(outst)).toFixed(2);
           return [tdsam,fivesd,outs];

        }
      }
     });
</script>
     
@endsection

