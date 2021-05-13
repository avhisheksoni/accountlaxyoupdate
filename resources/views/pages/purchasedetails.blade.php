@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Reconcillation</h1>
          <p>Purchase Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Purchase Details</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Purchase List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="" method="post">
              @csrf
              <div class="row">
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="place_of_supply">Receiver</label>
                      <input class="form-control" id="comp_id" value="{{ $edit->job->Pcompany->name }}" name="comp_id" type="text" placeholder="E-commerce_gstin" readonly>
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-4">
                   <div class="form-group">
                    <label for="e_commerce_gstin">State Gstin</label>
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
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                  <label for="client_id">P-Company</label>
                  <select name="client_id" class="form-control" id="client_id" style="display: none">
                  <option value="">--select--</option>
                   </select> 
                   <input class="form-control" id="client_old" name="client" value="{{ $edit->job->Pclient->firm_name }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                   <input class="form-control" id="client_old_id" name="client_id" value="{{ $edit->job->client_id }}" type="hidden" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">GSTIN/UIN of Recipient</label>
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
                   <select name="job_id"  name="" id="job_id" class="form-control" style="display: none">
                    <option value="">--select--</option>
                   </select>
                    <input class="form-control" id="job_id_old" name="job_" value="{{ $edit->job->name."||".$edit->job->job_code }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    <input class="form-control" id="job_id_old_" name="job_id" value="{{ $edit->job->id }}" type="hidden" aria-describedby="emailHelp" placeholder="Enter GSTIN" readonly >
                    @error('job_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 

              <div class="row">
              <div class="col-lg-8">
                  <div class="form-group">
                    <label for="bill_desc">Work Name</label>
                    <input class="form-control" id="bill_desc" name="bill_desc" type="text" aria-describedby="emailHelp" value="{{ $edit->bill_desc }}" placeholder="Enter Work Name For Billing" readonly="">
                     @error('bill_desc')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cat_id">Category</label>
                    <input class="form-control" id="cat_id" type="text" aria-describedby="emailHelp" name="cat_id" value="{{ App\job_categorgy::find($edit->job->cat_id)->name }}" placeholder="" readonly="">
                     @error('invoice_type')
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
                    <input class="form-control" id="invoive_number" name="invoive_number" type="text" aria-describedby="emailHelp" value="{{ $edit->invoive_number }}" placeholder="Invoice No." readonly="">
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
                   <input type="text" id="sales_date" class="form-control" name="sales_date" value="{{ $edit->sales_date }}" placeholder="sales date" autocomplete="off" readonly="">
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
                    <input class="form-control" id="invoice_type" type="text" aria-describedby="emailHelp" name="invoice_type" value="Regular" placeholder="Enter invoice type" readonly="">
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
                    <label for="base_amount_taxable_value">Base Amount(taxable)</label>
                    <input class="form-control amount pro" id="base_amount_taxable_value" type="text" aria-describedby="emailHelp" value="{{ $edit->base_amount_taxable_value }}" name="base_amount_taxable_value" placeholder="Base amount taxable value" readonly="">
                     @error('base_amount_taxable_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <div class="row">
                    <div class="col-lg-6">
                    <label for="gst_rate">Gst Rate(%)</label>
                    <input class="form-control" id="gst_rate" value="{{ $edit->job->Pgst->tax_gst }}" name="gst_rate" type="text" placeholder="gst_rate" readonly>
                     @error('gst_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                    <div class="col-lg-6">
                    <label for="gst_amount">Gst Amount</label>
                    <input class="form-control pro" id="gst_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->gst_amount }}" name="gst_amount" placeholder="gst_amount" readonly="">
                     @error('gst_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                  </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gross_total_invoice_value">gross_total(Invoice value)</label>
                    <input class="form-control pro" id="gross_total_invoice_value" name="gross_total_invoice_value"  type="text" value="{{ $edit->gross_total_invoice_value}}" aria-describedby="emailHelp" placeholder="Enter gross total" readonly="">
                     @error('gross_total_invoice_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> @php  $s_no= 1 @endphp
              @foreach($ckamt as $cmaot)
              <div class="row" id="{{ "row".$s_no }}">
              <div class="col-lg-5">
                   <div class="form-group">
                    <label for="cheque_date">payment  Date</label>
                      <input type="text" id="" class="form-control cheque_date2" name="cheque_date_[]" value="{{ $cmaot->cheque_date }}" placeholder="cheque  date" autocomplete="off" readonly="">
                     @error('cheque_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <input type="hidden" name="ckamtid[]" value="{{ $cmaot->id }}" id="{{ 'bal_id'.$s_no}}">
                <input type="hidden" name="purchase_id" value="{{ $cmaot->purchase_id }}">
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="cheque_received_amount">payment Amount</label>
                    <input class="form-control pro adamount" id="cheque_received_amount{{ $s_no }}" name="cheque_received_amount_[]" type="text" value="{{ $cmaot->cheque_amount }}" aria-describedby="emailHelp" placeholder="cheque received amount" readonly="">
                  
                     @error('cheque_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                </div>
              </div>
              @php $s_no++ @endphp
               @endforeach
               <div id="Content">
                 
                </div>
              <div id="dynamic_field"></div>
              <div class="row">
               <div class="col-lg-4">
                    <label for="tds">TDS Rate(%)</label>
                    <input class="form-control" id="tds" value="{{ $edit->job->Ptds->tds_tax }}" name="tds" type="text" placeholder="tds" readonly>
                     @error('tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                <div class="col-lg-4">
                    <label for="tds_amount">Tds Amount</label>
                    <input class="form-control pro" id="tds_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->tds_amount }}" name="tds_amount" placeholder="tds_amount" readonly="">
                     @error('tds_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                    <div class="col-lg-4">
                    <label for="total_amount">Total Amount</label>
                    <input class="form-control total pro" id="total_amount" value="{{ $edit->total_amount }}" name="total_amount" type="number" placeholder="Amount " readonly="">
                     @error('total_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
              </div>
               <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="other">other charges(if any)</label>
                    <input class="form-control gross pro" id="other" name="other"  type="number" aria-describedby="emailHelp" value="{{ $edit->other }}" placeholder="Enter other" readonly="">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="five_percrnt_sd">Security Deposite Rate(%)</label>
                    <input class="form-control" id="five_percrnt_sd" name="five_percrnt_sd" type="text" aria-describedby="emailHelp" value="{{ $edit->job->sd_percentage }}" placeholder="Fixed Deposite Rate" readonly>
                     @error('five_percrnt_sd')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tds_amount">Security Deposite Amount</label>
                    <input class="form-control pro" id="five_percrnt_sd_amount" type="text" aria-describedby="emailHelp" value="{{ $edit->five_percrnt_sd_amount }}" name="five_percrnt_sd_amount" placeholder="sd amount cal" readonly="">
                  </div>
                </div>
              </div> <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="outstanding">Outstanding</label>
                    <input class="form-control pro" id="outstanding" name="outstanding" type="text" aria-describedby="emailHelp" value="{{ $edit->outstanding }}" placeholder="Enter Outstanding" readonly="">
                     @error('outstanding')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="description">Description</label>
                     <textarea class="form-control" id="description"   name="description" rows="3" readonly="">{{ $edit->description }}</textarea>
                      @error('description')
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
                 <button ><a href="{{ route('download-pdf',$edit->id) }}" class="btn btn-danger" >PDF</a></button>
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
            </div>
              </div>
            </form>
        </div>
      </div>
    </main>   
@endsection

