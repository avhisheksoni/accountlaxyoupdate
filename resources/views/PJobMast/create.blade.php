@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Petty-Job/Work Name</h1>
          <p>Petty-Job/Work Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty-Job/Work Form</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Petty-Job/Work List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('PJobMast.store')}}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="job_describe">Job/Work Name</label>
                    <input class="form-control" id="job_describe" name="name" type="text" value="{{ old('name') }}" placeholder="Enter Job/Work Name" >
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="client_id">Petty Contractor</label>
                    <select name="client_id" class="form-control" id="client_id">
                      <option value="">Choose Name</option>
                      @foreach($Pclient as $cli)
                      <option @if($cli->id == old('client_id')) selected  @endif value="{{ $cli->id }}"
                >{{ $cli->firm_name }}</option>
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
                    <label for="gsstin_uin_of_recipient">Petty Contractor Gstin</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ old('gsstin_uin_of_recipient') }}" type="text" aria-describedby="emailHelp" placeholder="choose receiver"  readonly="" >
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
                    <label for="comp_id">our Company</label>
                    @php 
                    $comp = App\Company_mast::all();
                    @endphp
                    <select name="comp_id" class="form-control" id="comp_id">
                      <option value="">Choose Name</option>
                      @foreach($comp as $com)
                       <option @if($com->id == old('comp_id')) selected  @endif value="{{ $com->id }}"
                >{{ $com->name }}</option>
                      @endforeach
                    </select>
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e_commerece_gstin">State gstin</label>
                    @php 
                    $gstin = App\Gstin::all();
                    @endphp
                     <select name="e_commerece_gstin" class="form-control">
                      <option value="">Choose Name</option>
                      @foreach($gstin as $com)
                      <option @if($com->id == old('e_commerece_gstin')) selected  @endif value="{{ $com->id }}"
                >{{ $com->gstin }}</option>
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
                    <label for="cat_id">Category</label>
                    @php 
                    $jcat = App\job_categorgy::all();
                    @endphp
                    <select name="cat_id" class="form-control" id="cat_id">
                      <option value="">Choose Name</option>
                      @foreach($jcat as $cat)
                       <option @if($cat->id == old('cat_id')) selected  @endif value="{{ $cat->id }}"
                >{{ $cat->name }}</option>
                      @endforeach
                    </select>
                     @error('cat_id')
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
                    <input class="form-control" id="tender_no" value="{{ old('tender_no')}}" name="tender_no" type="text" placeholder="Enter tender no" >
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
                   <input class="form-control" id="tender_value" value="{{ old('tender_value')}}" name="tender_value" type="number" placeholder="Enter tender Value" >
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
                    <input class="form-control" id="tender_rate" value="{{ old('tender_rate')}}" name="tender_rate" type="number" placeholder="Enter tender Rate" >
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
                    <input class="form-control" id="work_order_no" value="{{ old('work_order_no')}}" name="work_order_no" type="text" placeholder="Enter Work Order" >
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
                   <input class="form-control" id="work_value" value="{{ old('work_value')}}" name="work_value" type="number" placeholder="Enter Work value" >
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
                    <input class="form-control jobdate" id="cheque_date2" value="{{ old('work_s_data')}}" name="work_s_data" type="text" placeholder="Choose Work start Date" autocomplete="off">
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
                   <input class="form-control jobdate" id="Work_end_date" value="{{ old('Work_end_date')}}" name="Work_end_date" type="text" placeholder="Choose Work End Date" autocomplete="off">
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
                    $gst = App\tax_gst::all();
                    @endphp
                    <select name="tax_gst" class="form-control">
                      <option value="">choose gst rate</option>
                    @foreach( $gst as $perm )
                   <option @if($perm->id == old('tax_gst')) selected  @endif value="{{ $perm->id }}"
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
                    $tds = App\TaxTdsmodel::all();
                    @endphp
                   <select name="tax_tds" class="form-control">
                    <option value="">choose tds rate</option>
                    @foreach( $tds as $perm )
                    <option @if($perm->id == old('tax_tds')) selected  @endif value="{{ $perm->id }}"
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
                    <input class="form-control" id="sd_percentage" type="text" aria-describedby="emailHelp" name="sd_percentage" value="{{ old('sd_percentage') }}" placeholder="Enter invoice type" >
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
                     <textarea class="form-control" id="place_of_supply"   name="place_of_supply" rows="3">{{ old('place_of_supply')}}</textarea>
                      @error('place_of_supply')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="location">Note</label>
                     <textarea class="form-control" id="location"   name="location" rows="3">{{ old('location')}}</textarea>
                      @error('location')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
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
       <div class="col-md-4" style="border-left: 1px solid">
              <div class="container">
                <form action="{{ route('pjov_excel') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="text-center mt-3">Excel Import</h2><br><br>
                  <input type="file" name="excel_data" id="imgupload" style="display:none">
                  <img src="https://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Microsoft-Excel-2013-icon.png" id="OpenImgUpload"><br>
                  <span class="text-muted">
                    <a class="float-right" href="{{ route('petty-job-format') }}" title="Excel Download">Click Here to download sheet format</a>
                  </span>
                  <br><br>
                  <button type="submit" class="btn btn-info">Import</button>
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
                 url: "{{ route('get-Pclient') }}?id="+rec_id,
                 success: function(res){
                 	console.log(res);
                 $("#gsstin_uin_of_recipient").empty();
                 $("#gsstin_uin_of_recipient").val(res.Pgsin['gst_number']);
                 $("#comp_id").empty();
                    $("#comp_id").append('<option value="">Select Receiver</option>');
                    $.each(res.Pac,function(index, recev){
                      //console.log(recev.company['name']);
                    $("#comp_id").append('<option value='+recev.company['id']+'>'+recev.company['name']+'</option>');
              });
              
                        
                   }
                      });

            
      
       });
    });

    </script>
    <script type="text/javascript">
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
</script>
@endsection

