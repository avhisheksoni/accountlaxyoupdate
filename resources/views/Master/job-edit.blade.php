@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Client Job/Work Name Update</h1>
          <p>Client Job/Work Update</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Client Job/Work Form</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Client Job/Work List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('job-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="job_describe">Job/Work Name</label>
                    <input class="form-control" id="job_describe" name="job_describe" type="text" value="{{ $edit->job_describe }}" placeholder="Enter Job/Work Name" >
                     @error('job_describe')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" class="form-control" id="client_id">
                      @php 
                      $client=  App\Client::all();
                      @endphp
                      <option value="">Choose Name</option>
                       @foreach($client as $ven)
                   <option @if($ven->id == $edit->client_id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                    </select>
                     @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">Client Gstin</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ $edit->client->gstin }}" type="text" aria-describedby="emailHelp" placeholder="choose receiver"  readonly="" >
                     @error('gsstin_uin_of_recipient')
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
                    <label for="comp_id">Our Company</label>
                    <select name="comp_id" class="form-control" id="comp_id" style="display: none">
                      <option value="">Choose Name</option>
                     {{--  @foreach($comp as $com)
                       <option @if($com->id == old('comp_id')) selected  @endif value="{{ $com->id }}"
                >{{ $com->name }}</option>
                      @endforeach --}}
                    </select>
                    <input class="form-control" id="comp_name" name="comp_name" value="{{ $edit->company->name }}" type="text" aria-describedby="emailHelp" placeholder="choose receiver"  readonly="" >
                    <input class="form-control" id="comp_old_id" name="comp_id" value="{{ $edit->company->id }}" type="hidden" aria-describedby="emailHelp" placeholder="choose receiver"  readonly="" >
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e_commerece_gstin">State Gstin</label>
                    @php 
                      $gstin=  App\Gstin::all();
                      @endphp
                     <select name="e_commerece_gstin" class="form-control">
                      <option value="">Choose Name</option>
                     @foreach($gstin as $ven)
                   <option @if($ven->id == $edit->e_commerece_gstin) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->gstin }}</option>
                    @endforeach
                    </select>
                     @error('e_commerece_gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e_commerece_gstin">Category</label>
                    @php 
                      $jc=  App\job_categorgy::all();
                      @endphp
                     <select name="job_cat_id" class="form-control">
                      <option value="">Choose Category/Department</option>
                     @foreach($jc as $ven)
                   <option @if($ven->id == $edit->job_cat_id) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                    </select>
                     @error('job_cat_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               <h4>Tendor Details</h4>
              <div class="row">
             <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tender_no">Tender No.</label>
                    <input class="form-control" id="tender_no" value="{{ $edit->tender_no }}" name="tender_no" type="text" placeholder="Enter tender no" >
                     @error('tender_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tender_value">Tendor Value</label>
                   <input class="form-control" id="tender_value" value="{{ $edit->tender_value }}" name="tender_value" type="number" placeholder="Enter tender Value" >
                     @error('tender_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tender_rate">Tendor Rate(%)</label>
                    <input class="form-control" id="tender_rate" value="{{ $edit->tender_rate }}" name="tender_rate" type="number" placeholder="Enter tender Rate" >
                     @error('tender_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
              <h4>Work Order Details</h4>
              <div class="row">
             <div class="col-lg-6">
                   <div class="form-group">
                    <label for="work_order_no">Work Order No.</label>
                    <input class="form-control" id="work_order_no" value="{{ $edit->work_order_no }}" name="work_order_no" type="text" placeholder="Enter Work Order" >
                     @error('work_order_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="work_value">Work Order Value</label>
                   <input class="form-control" id="work_value" value="{{ $edit->work_value }}" name="work_value" type="number" placeholder="Enter Work value" >
                     @error('work_value')
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
                    <label for="work_s_data">Work Start Date</label>
                    <input class="form-control jobdate" id="cheque_date2" value="{{ $edit->work_s_data }}" name="work_s_data" type="text" placeholder="Choose Work start Date" >
                     @error('work_s_data')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="Work_end_date">Work End Date</label>
                   <input class="form-control jobdate" id="Work_end_date" value="{{ $edit->Work_end_date }}" name="Work_end_date" type="text" placeholder="Choose Work End Date" >
                     @error('Work_end_date')
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
                    <label for="invoive_number">Set Tax-Gst</label>
                     @php 
                      $gst=  App\tax_gst::all();
                      @endphp
                    <select name="tax_gst" class="form-control">
                      <option value="">choose gst rate</option>
                    @foreach( $gst as $perm )
                   <option @if($perm->id == $edit->tax_gst) selected  @endif value="{{ $perm->id }}"
                >{{ $perm->tax_gst }}</option>
                    @endforeach
                     </select> 
                     @error('tax_gst')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="sales_date">Set Tax-Tds</label>
                    @php 
                      $tds=  App\TaxTdsmodel::all();
                      @endphp
                   <select name="tax_tds" class="form-control">
                    <option value="">choose tds rate</option>
                    @foreach( $tds as $perm )
                    <option @if($perm->id == $edit->tax_tds) selected  @endif value="{{ $perm->id }}"
                >{{ $perm->tds_tax }}</option>
                    @endforeach
                     </select> 
                     @error('tax_tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="sd_percentage">set Sd %</label>
                    <input class="form-control" id="sd_percentage" type="text" aria-describedby="emailHelp" name="sd_percentage" value="{{ $edit->sd_percentage }}" placeholder="Enter invoice type" >
                     @error('sd_percentage')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
              <div class="col-lg-6">
                   <div class="form-group">
                    <label for="place_of_supply">PLace of Supply</label>
                     <textarea class="form-control" id="place_of_supply"   name="place_of_supply" rows="3">{{ $edit->place_of_supply}}</textarea>
                      @error('place_of_supply')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="location">Note</label>
                     <textarea class="form-control" id="location"   name="location" rows="3">{{ $edit->location }}</textarea>
                      @error('location')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                </div>
              </div>  
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
              </div>
            </form>
        </div>
      </div>
    </main>
    <script type="text/javascript">
      $(document).ready(function (){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
       $("#client_id").on("change",function(){
       var rec_id = $(this).val();
       $.ajax({
                 type: "GET",
                 url: "{{ route('get-client') }}?id="+rec_id,
                 success: function(res){
                 $("#gsstin_uin_of_recipient").empty();
                 $("#gsstin_uin_of_recipient").val(res.rec['gstin']);
                 $("#comp_name").hide();
                 $("#comp_old_id").attr("disabled","disabled");
                 $("#comp_id").show();
                 $("#comp_id").empty();
                    $("#comp_id").append('<option value="0">Select Receiver</option>');
                    $.each(res.ac,function(index, recev){
                      //console.log(recev.company['name']);
                    $("#comp_id").append('<option value='+recev['comp_id']+'>'+recev.company['name']+'</option>');
              });
              
                        
                   }
                      });

            
      
       });
    });

    </script>
@endsection

