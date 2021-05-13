 @extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Reconcillation</h1>
          <p>Sales Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Sales Form</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Sales List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('salesupdate',[$edit->id]) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                 <div class="col-lg-4">
                  @php 
                  $cmp = App\Company_mast::all();
                  @endphp
                  <div class="form-group">
                    <label for="place_of_supply">Company</label>
                    <input class="form-control" id="place_of_su" value="{{ App\Company_mast::find($edit->comp_id)->name }}" name="comp_id" type="text" placeholder="place of supply" readonly>
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
                    <input class="form-control" id="e_commerce_gstin" value="{{ $edit->job->gstin->gstin }}" name="e_commerce_gstin" type="text" placeholder="E-Commerce Gstin" readonly>
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
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                    <label for="client_id">Client Name</label>
                    <input class="form-control" id="client_id" value="{{ $edit->job->client->name }}" name="client_id" type="text" placeholder="place of supply" readonly>
                    @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="job_id">Job-code</label>
                    <input class="form-control" id="place_of_sup" value="{{ $edit->job->job_describe }}" name="place_of_supply" type="text" placeholder="place of supply" readonly>
                    @error('job_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">GSTIN/UIN of Client</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ $edit->job->client->gstin }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                     @error('gsstin_uin_of_recipient')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
               <div class="row">
                 <div class="col-lg-7">
                  <div class="form-group">
                    <label for="place_of_supply">Work Name</label>
                    <input class="form-control" id="bill_desc" name="bill_desc" value="{{ $edit->bill_desc }}" type="text" aria-describedby="emailHelp" placeholder="Enter Work Name for Billing" autocomplete="off">
                     @error('bill_desc')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-3">
                  <div class="form-group">
                    <label for="jobcat">Category</label>
                    <input class="form-control" id="jobcat" name="jobcat" value="{{ $edit->job->job_cat->name }}" type="text" aria-describedby="emailHelp" placeholder="Enter Category" readonly="">
                     @error('jobcat')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-2">
                  <div class="form-group">
                    <label for="place_of_supply">Bill Imposed on</label>
                   {{--  @if(old('bill_imposed_on')) --}}
                     <input class="form-control" id="jobcat" name="bill_imposed_on" value="{{ $edit->bill_imposed_on }}" type="text" aria-describedby="emailHelp" placeholder="Enter bill imposed on" readonly="">
                     {{-- @else --}}
                      {{-- <input class="form-control" id="bill_imposed_on1" name="bill_imposed_on" value="{{ old('bill_imposed_on') }}" type="text" aria-describedby="emailHelp" placeholder="Enter Category" readonly="" style="display: none" readonly=""> --}}
                     {{-- <select name="bill_imposed_on" class="form-control" id="bill_imposed_on" required="">
                      <option value="">Choose</option>
                      <option value="OBA">On Base Amount</option>
                      <option value="OGA">On Gross Amount</option>
                     </select>
                     @endif --}}
                     @error('category_id')
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
                   <input type="text" id="sales_date" class="form-control" name="sales_date" value="{{ $edit->sales_date}}" placeholder="Invoice Date" autocomplete="off" required="">
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
              </div> <div class="row">
              <div class="col-lg-4">
                    <div class="form-group">
                    <label for="base_amount_taxable_value">Base Amount</label>
                    <input class="form-control amount pro" id="base_amount_taxable_value" type="number" aria-describedby="emailHelp" value="{{ $edit->base_amount_taxable_value == '' ? '0' : $edit->base_amount_taxable_value }}" name="base_amount_taxable_value" placeholder="Base Amount Taxable Value" autocomplete="off" required="">
                     @error('base_amount_taxable_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                     <label for="mobilize_amount">Mobilization Deduction Amount</label>
                   <input class="form-control" id="mobilize_amount" name="mobilize_amount"  type="number" aria-describedby="emailHelp" value="{{ $edit->mobilize_amount == '' ? '0' : $edit->mobilize_amount }}" placeholder="Enter Mobilization Deduction Amount" min='0' autocomplete="off" required="">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gross_total_invoice_value">Taxable Value</label>
                    <input class="form-control pro" id="taxable_valueeeee" name="taxable_value"  type="number" value="{{ $edit->taxable_value  == '' ? '0' : $edit->taxable_value }}" aria-describedby="emailHelp" placeholder="Enter Taxable Value" autocomplete="off" readonly="">
                     @error('gross_total_invoice_value')
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
                    <input class="form-control" id="gst_rate" value="{{ $edit->job->gst->tax_gst == '' ? '0' : $edit->job->gst->tax_gst }}" name="gst_rate" type="number" placeholder="GST Rate" autocomplete="off" readonly="">
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
                    <input class="form-control pro" id="gst_amount" type="number" aria-describedby="emailHelp" value="{{ $edit->gst_amount  == '' ? '0' : $edit->gst_amount }}" name="gst_amount" placeholder="Gst Amount" autocomplete="off" readonly="">
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                     <label for="gross_total_invoice_value">Gross Invoice(Invoice value)</label>
                    <input class="form-control pro" id="gross_total_invoice_value" name="gross_total_invoice_value"  type="number" value="{{ $edit->gross_total_invoice_value == '' ? '0' : $edit->gross_total_invoice_value }}" aria-describedby="emailHelp" placeholder="Enter Gross Total" autocomplete="off" readonly="">
                  </div>
                </div>
              </div>
              @php  $s_no= 1 @endphp
              @foreach($ckamt as $cmaot)
              <div class="row" id="{{ "row".$s_no }}">
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">Payment  Date</label>
                      <input type="text" id="" class="form-control cheque_date2" name="cheque_date_[]" value="{{ $cmaot->cheque_date }}" placeholder="cheque  date" autocomplete="off">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <input type="hidden" name="ckamtid[]" value="{{ $cmaot->id }}" id="{{ 'bal_id'.$s_no}}">
                <input type="hidden" name="sale_id" value="{{ $cmaot->sale_id }}">
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">Payment Amount</label>
                    <input class="form-control pro adamount cua redit" id="cheque_received_amount{{ $s_no }}" name="cheque_received_amount_[]" type="text" value="{{ $cmaot->cheque_amount }}" aria-describedby="emailHelp" placeholder="cheque received amount">
                  
                     @error('cheque_received_amount')
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
                <input type="hidden" name="saless" id="sale_id" value="{{ $edit->id }}">
                 <div id="Content">
                  <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
              <div id="dynamic_field"></div>
              {{-- {{ count(old('cheque_date_')) }} --}}
             {{--  @if(old('cheque_date_.1'))
              @for($i = 1 ;$i < count(old('cheque_date_')) ; $i++)
               <div class="row" >
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">Payment  Date{{ $i }}</label>
                      <input type="text" id="" class="form-control cheque_date2 dectdate" name="cheque_date_[]" value="{{ old('cheque_date_.'.$i)}}" placeholder="Cheque Date" autocomplete="off" required="">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">Actual Received Payment</label>
                    <input class="form-control pro adamount  pay redit" id="cheque_received_amount" name="cheque_received_amount_[]" type="number" value="{{ old('cheque_received_amount_.'.$i) }}" aria-describedby="emailHelp" placeholder="Cheque Received Amount" autocomplete="off">
                  
                     @error('cheque_received_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
                 <div class="col-lg-3 mt-4">
                <div id="Content">
                  <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
                </div>
              </div>
              @endfor
              @endif
              <div id="dynamic_field"></div> --}}
              <div class="row">
               <div class="col-lg-3">
                    <label for="tds">Tds Rate(%)</label>
                    <input class="form-control" id="tds" value="{{ $edit->job->tds->tds_tax }}" name="tds" type="number" placeholder="Tds Rate (%)" readonly>
                     @error('tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                <div class="col-lg-3">
                    <label for="tds_amount">Tds Deduction Amount</label>
                    <input class="form-control pro" id="tds_amount" type="number" aria-describedby="emailHelp" value="{{ $edit->tds_amount == '' ? '0' : $edit->tds_amount }}" name="tds_amount" placeholder="Tds Amount" readonly="">
                     @error('tds_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                   <div class="col-lg-3">
                  <div class="form-group">
                    <label for="five_percrnt_sd">Security  Deposite Rate(%)</label>
                    <input class="form-control" id="five_percrnt_sd" name="five_percrnt_sd" type="number" aria-describedby="emailHelp" value="{{ $edit->job->sd_percentage}}" placeholder="Security Deposite Rate" readonly>
                     @error('five_percrnt_sd')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                    <label for="five_percrnt_sd_amount">Security  Deposite Amount</label>
                    <input class="form-control pro mob tobereceived" id="five_percrnt_sd_amount" type="number" aria-describedby="emailHelp" value="{{ $edit->five_percrnt_sd_amount == '' ? '0' : $edit->five_percrnt_sd_amount }}" name="five_percrnt_sd_amount" placeholder="Security Deposite amount" readonly="">
                    @error('five_percrnt_sd_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="retent_amount">Retention Money</label>
                    <input class="form-control mob dect tobereceived" id="retent_amount" name="retent_amount" type="number" aria-describedby="emailHelp" value="{{ $edit->retent_amount == '' ? '0' : $edit->retent_amount }}" placeholder="Enter Retention Money">
                     @error('retent_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="other_deduct_amount">Other Deduction1</label>
                    <input class="form-control mob dect" id="other_deduct_amount" type="number" aria-describedby="emailHelp" value="{{ $edit->other_deduct_amount == '' ? '0' :  $edit->other_deduct_amount }}" name="other_deduct_amount" placeholder="Enter Other Deduction1">
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
                    <input class="form-control mob dect" id="tds_on_gst_2per" name="tds_on_gst_2per"  type="number" aria-describedby="emailHelp" value="{{  $edit->tds_on_gst_2per == '' ? '0' :  $edit->tds_on_gst_2per }}" placeholder="Enter Mobilization Deduction Amount" min='0'>
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
                    <input class="form-control mob dect" id="lab_cess_1per" name="lab_cess_1per" type="number" aria-describedby="emailHelp" value="{{ $edit->lab_cess_1per == '' ? '0' : $edit->lab_cess_1per }}" placeholder="Enter Retention Money">
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
                    <input class="form-control mob dect tobereceived" id="hold_for_royalty" type="number" aria-describedby="emailHelp" value="{{ $edit->hold_for_royalty == '' ? '0' : $edit->hold_for_royalty }}" name="hold_for_royalty" placeholder="Enter Other Deduction1">
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
                    <label for="deb_late_submission_on_car_151day">DEB LATE Submission On  CAR 151 DAY</label>
                    <input class="form-control mob dect" id="deb_late_submission_on_car_151day" name="deb_late_submission_on_car_151day"  type="number" aria-describedby="emailHelp" value="{{ $edit->deb_late_submission_on_car_151day == '' ? '0' : $edit->deb_late_submission_on_car_151day }}" placeholder="Enter DEB LATE submission on car 151 day" min='0'>
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
                    <input class="form-control mob dect" id="electricity" name="electricity" type="number" aria-describedby="emailHelp" value="{{ $edit->electricity == '' ? '0' :  $edit->electricity }}" placeholder="Enter Retention Money">
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
                    <input class="form-control mob dect" id="rent" type="number" aria-describedby="emailHelp" value="{{ $edit->rent == '' ? '0' : $edit->rent }}" name="rent" placeholder="Enter Rent">
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
                    <input class="form-control mob" id="other2" name="other2"  type="number" aria-describedby="emailHelp" value="{{ $edit->other2 == '' ? '0' : $edit->other2 }}" placeholder="Enter Total Deduction Amount">
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
                    <input class="form-control dect" id="total_deduct_amount" name="total_deduct_amount"  type="number" aria-describedby="emailHelp" value="{{ $edit->total_deduct_amount == '' ? '0' : $edit->total_deduct_amount }}" placeholder="Enter Total Deduction Amount" readonly="">
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
                    <input class="form-control mob dect tobereceived" id="gst_hold" name="gst_hold" type="number" aria-describedby="emailHelp" value="{{ $edit->gst_hold == '' ? '0' : $edit->gst_hold }}" placeholder="Enter Gst Hold (if any)" >
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
                    <input class="form-control" id="balance_to_be_billed" name="balance_to_be_billed"  type="number" aria-describedby="emailHelp" value="{{ $edit->balance_to_be_billed == '' ?  '0' : $edit->balance_to_be_billed }}" placeholder="Enter Balance To Be Billed" readonly="">
                    @error('balance_to_be_billed')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="work_value">Total Order Value</label>
                    <input class="form-control" id="work_value" name="work_value" type="number" aria-describedby="emailHelp" value="{{ $edit->work_value == '' ? '0' : $edit->work_value }}" placeholder="" readonly>
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
                    <input class="form-control dect" id="amount_to_be_received" type="number" aria-describedby="emailHelp" value="{{ $edit->amount_to_be_received == '' ? '0' : $edit->amount_to_be_received }}" name="amount_to_be_received" placeholder="Enter Amount To Be Received" readonly="">
                    @error('amount_to_be_received')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
              {{-- new columns added end--}}
              <div class="row">
              <div class="col-lg-3">
                  <div class="form-group">
                    <label for="outstanding">Current Outstanding</label>
                    <input class="form-control pro dect" id="outstanding" name="outstanding" type="number" aria-describedby="emailHelp" value="{{ $edit->outstanding == '' ? '0' : $edit->outstanding }}" placeholder="Enter Outstanding" readonly="">
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
                     <textarea class="form-control" id="description"   name="description" rows="3" placeholder="Enter Details About Bill if Required" required="">{{ $edit->description }}</textarea>
                      @error('description')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
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
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
              </div>
            </form>
        </div>
      </div>
        <div class="col-md-4" style="border-left: 1px solid">
              <div class="container">
                <form action="{{ route('sale-sheet-import') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="text-center mt-3">Excel Import</h2><br><br>
                  <input type="file" name="excel_data" id="imgupload" style="display:none">
                  <img src="https://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Microsoft-Excel-2013-icon.png" id="OpenImgUpload"><br>
                  <span class="text-muted">
                    <a class="float-right" href="" title="Excel Download">Click Here to download sheet format</a>
                  </span>
                  <br><br>
                  <button type="submit" class="btn btn-info">Import</button>
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
                 url: "{{ route('assign-client') }}?id="+rec_id,
                 success: function(res){
                  if(res){
                    $("#client_id").empty();
                    $("#client_id").append('<option value="">Select Client</option>');
                    $.each(res,function(index, recev){
                    $("#client_id").append('<option value='+recev.client['id']+'>'+recev.client['name']+'</option>');
              });
                  }
}

 });
 });
   var i=1;
  $('#add').click(function(){
    // var osfinal = document.getElementById('outstanding'). value;
    // if(i <= 5){
    $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-lg-5"><div class="form-group"><label for="cheque_date">Cheque  Date</label><input type="text" id="cheque_date'+i+'" class="form-control cheque_date2 dectdate" name="cheque_date_[]" value="" placeholder="cheque  date" autocomplete="off">@error('cheque_date')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="col-lg-4"><div class="form-group"><label for="cheque_received_amount">Actual Payment Amount</label><input class="form-control pro adamount pay redit" id="cheque_received_amount'+i+'" name="cheque_received_amount_[]" type="text" value="0" aria-describedby="emailHelp" placeholder="cheque received amount">@error('cheque_received_amount')<span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>@enderror</div></div><div class="col-lg-3 mt-4"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');
    i++;
 
  });
  // $(document).on('click', '.btn_remove', function(){
  //   var button_id = $(this).attr("id");
  //   $('#row'+button_id+'').remove();
  //   $(".dect").val(0);
      
  // });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    var bal_id = $('#bal_id'+button_id).val();
    var det = $("#cheque_received_amount"+button_id).val();
    //console.log(det);
    var sout = $('#outstanding').val();
    $.ajax({
                url: "{{  route('delete-add-row')}}",
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':bal_id},
                success: function (data){
                 console.log(data);

                  
                }
           })
    $('#outstanding').val(parseFloat(sout)+parseFloat(det));
    $('#row'+button_id+'').remove();
  
  });
  // $(document).on('click', '.reedit', function(){
  //   $(".dect").val(0);
      
  // });
  $(document).on('blur', '.redit', function(){
      var redit = 0;
      $('.redit').each(function(){
                    redit = parseFloat(redit) + parseFloat(($(this).val()));
                });
          var goors =  $('#gross_total_invoice_value').val();
          var kpise =  $('#total_deduct_amount').val();
           $('#outstanding').val(parseFloat(goors)-parseFloat(redit)-parseFloat(kpise));

      
  });

  $('#bill_imposted').on('change',function(){
    alert("etetr");
    if($(this).val() != ''){
      $('#invoive_number').removeAttr("readonly");
      $('input').removeClass('mob');
    }else{

        $('#invoive_number').attr("readonly", "readonly");
        $('input').addClass('mob');
    }
  });



 $("#client_id").on('change',function(){
       
       var cl_id = $(this).val();
       // var old =  old('client_id')}};
       var cmp_id = document.getElementById('comp_id').value;
       //console.log(old);
      
      $.ajax({
                url: "{{  route('get-work')}}",
                type: 'GET',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':cl_id,'cid':cmp_id},
                success: function (data) {
                  //console.log(data);
                  $("#job_id").empty();
                  $("#job_id").append('<option value="">Work Name</option>');
                  $.each(data,function(index, recev){
                  $("#job_id").append('<option value='+recev.id+'>'+recev.job_describe+'-||-'+recev.job_code+'</option>');
              });
                 
                }
            })
       

 });

 $("#job_id").on("change",function(){
        $(".pro").val("");
           var id = $(this).val();
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-receiver') }}?id="+id,
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
                        $("#gsstin_uin_of_recipient").val(res.client['gstin']);
                        $("#workname").empty();
                        $("#workname").val(res.job_describe);
                        $("#five_percrnt_sd").empty();
                        $("#five_percrnt_sd").val(res.sd_percentage);
                        $("#e_commerce_gstin").empty(res.gstn);
                        $("#e_commerce_gstin").val(res.gstn['gstin']);
                        $("#work_value").empty();
                        $("#work_value").val(res.work_value);
                        $("#jobcat").empty();
                        $("#jobcat").val(res.jobcat['name']);
                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });

            
      });
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

     $("#mobilize_amount").on('blur',function (){
      //alert("pg");
        var gross  = gross_total();
        //console.log(gross);
       $("#gross_total_invoice_value").val("");
       $("#gross_total_invoice_value").val(gross[0]);
       $("#taxable_valueeeee").val(0);
       $("#taxable_valueeeee").val(gross[3]);
       $("#gst_amount").val(0);
       $("#gst_amount").val(gross[1]);
       $("#tds_amount").val(0);
       $("#tds_amount").val(gross[4]);
       $("#total_amount").val(0);
       $("#cheque_received_amount").val(0);
       $("#outstanding").val(0);
       $("#five_percrnt_sd_amount").val(0);
       $("#five_percrnt_sd_amount").val(gross[5]);
       $("#balance_to_be_billed").empty();
       $("#balance_to_be_billed").val(gross[2]);
       $(".dect").val(0);
       $(".dectdate").val("");
       $('.cheque_date2').attr('readonly', false);
       $('.pay').attr('readonly', false);
       $(add).removeProp('disabled', false);
       $(".btn_remove").removeProp('disabled', false);

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
            var tdeductamount = parseFloat(mob)+parseFloat(tds_deduct_amount);//-parseFloat(gsthold);
            $('#total_deduct_amount').val(tdeductamount);
            $('.adamount').each(function(){
                    checkpay = parseFloat(checkpay) + parseInt(($(this).val()));
                });
            $('#outstanding').val(parseFloat(givtv)-parseFloat(tdeductamount)-parseFloat(checkpay));
            $('.tobereceived').each(function(){
                    bereceived = parseFloat(bereceived) + parseInt(($(this).val()));
                });
            $('#amount_to_be_received').val(bereceived);
             })


     $(".gross").on("blur", function() {
        var gross  = gross_total();
        var outstand = outstanding();
        var other_charges = $(this).val();


    });


        function gross_total(){
            var billon =  $('#bill_imposed_on').val();
           var gst = $('#gst_rate').val();
           var tdsr = $('#tds').val();
           var sdr = $('#five_percrnt_sd').val();
           var batv = $('#base_amount_taxable_value').val();
           var work_order_value = $('#work_value').val();
           var bal_to_bill = (parseFloat(work_order_value)-parseFloat(batv)).toFixed(2);
           var mobil_amount = $('#mobilize_amount').val();
           var taxble_amount = (parseFloat(batv)-parseFloat(mobil_amount))
           var gstrate = (taxble_amount * gst)/100;
           var total = (parseFloat(batv) + parseFloat(gstrate)).toFixed(2);
            if(billon == 'OBA'){
           var tdsrate = (taxble_amount * tdsr)/100;
           var sdrate = (taxble_amount * sdr)/100;
           }else if(billon == 'OGA'){
            var total = (parseFloat(batv) + parseFloat(gstrate)).toFixed(2);
            var tdsrate = (total * tdsr)/100;
            var sdrate = (total * sdr)/100;

           }
           return [total,gstrate,bal_to_bill,taxble_amount,tdsrate,sdrate];
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
           outst = parseFloat(tcar)+parseFloat(fivesd);
           total = document.getElementById('gross_total_invoice_value').value;
           outs = (parseFloat(total)-parseFloat(outst)).toFixed(2);
           return [tdsam,fivesd,outs];

        }
      }
     });
</script>


             <script type="text/javascript">
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
</script>
     
@endsection

