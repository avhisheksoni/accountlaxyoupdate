@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Vendor</h1>
          <p>Add Vendor</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Vendor-Form</li>
          <li class="breadcrumb-item"><a href="">Vendor List</a></li>
        </ul>
      </div>
     {{--   @if($message = Session::get('mgs'))
      <div class="alert alert-success">  {{$message}}
      </div>
       @endif --}}
       <p><a class="btn btn-primary icon-btn" href="{{  route('vendor.index') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('vendor.update',[$edit->id]) }}" method="post">
              @csrf
              @method('PATCH')
              <h3><b>Add Vendor Details</b></h3>
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">Vendor Type</label>
                     @php
                    $ven = App\vendor_type::all();
                    @endphp
                 <select name="vendor_type" id="vendor_type" class="form-control">
                    <option value="">Choose</option>
                    @foreach($ven as $sname)
                    <option value="{{ $sname->id }}" {{ $edit->vendor_type == $sname->id ? 'selected' : '' }}>{{ $sname->name }}</option>
                    @endforeach

                   </select>
                     @error('vendor_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Firm Type</label>
                     @php
                    $frm = App\firm_type::all();
                    @endphp
                  <select name="firm_type" id="firm_type" class="form-control">
                    <option value="">Choose</option>
                    @foreach($frm as $fname)
                    <option value="{{ $fname->id }}" {{ $edit->firm_type == $fname->id ? 'selected' : '' }}>{{ $fname->name }}</option>
                    @endforeach
                   </select>
                     @error('firm_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Firm Name</label>
                    <input class="form-control" type="text" name="firm_name" value="{{ $edit->firm_name }}" placeholder="Enter Firm Name" autocomplete="off">
                     @error('firm_name')
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
                    <label for="user_id">Email</label>
                   <input class="form-control" type="text" name="email" value="{{ $edit->email }}" placeholder="Enter Email">
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Mobile No.</label>
                   <input class="form-control" type="number" name="mobile" value="{{ $edit->mobile }}" placeholder="Enter  mobile No.">
                     @error('mobile')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Address</label>
                    <input class="form-control" type="text" name="address" value="{{ $edit->address }}" placeholder="Enter Address" autocomplete="off">
                     @error('address')
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
                    <label for="user_id">City</label>
                      <input class="form-control" type="text" name="city" value="{{ $edit->city  }}" placeholder="Enter City" autocomplete="off">
                     @error('city')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Postal Code</label>

                   <input class="form-control" type="text" name="postal_code" value="{{ $edit->postal_code }}" placeholder="Enter Postal Code" autocomplete="off">
                     @error('postal_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  @php 
                  $state = App\state::all();
                  @endphp
                  <div class="form-group">
                    <label for="request_type_id">State</label>
                   <select name="state_code" id="state_code" class="form-control">
                    <option value="">Choose</option>
                    @foreach($state as $sname)
                    <option value="{{ $sname->state_code }}" {{ $edit->state_code == $sname->state_code ? 'selected' : '' }}>{{ $sname->state_name }}</option>
                    @endforeach

                   </select>
                     @error('state_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="bg_type_id">City</label>
                  <select name="city_code" id="city" class="form-control">
                  {{--  <option value="{{ $edit->city_code }}">{{ App\City::find($edit->city_code)->city_name }}</option> --}}
                  </select>
                     @error('city_code')
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
                    <label for="comp_type">Contact Person</label>
                 <input class="form-control" type="text" name="name" value="{{ $edit->name }}" placeholder="Enter Contact Person" autocomplete="off">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="phone">Phone</label>
               <input class="form-control" type="number" name="phone" value="{{ $edit->phone }}" placeholder="Enter phone No." autocomplete="off">
                     @error('phone')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Fax</label>
                  <input class="form-control" type="text" name="fax" value="{{ $edit->fax }}" placeholder="Enter Fax No." autocomplete="off">
                     @error('fax')
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
                    <label for="contract">Website</label>
                   <input class="form-control" type="text" name="website" value="{{ $edit->website }}" placeholder="Enter Website" autocomplete="off">
                     @error('website')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pan_no">Pan No.</label>
                   <input class="form-control" type="text" id="pan_no" name="pan_no" value="{{ $edit->pan_no  }}" placeholder="Enter PAN No." autocomplete="off">
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="contract">Aadhar No.</label>
                   <input class="form-control" type="text" name="aadhar_no" value="{{ $edit->aadhar_no  }}" placeholder="Enter Aadhar No" autocomplete="off">
                     @error('aadhar_no')
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
                    <label for="contract">GSTIN</label>
                   <input class="form-control" type="text" id="gst_number" name="gst_number" value="{{ $edit->gst_number }}" placeholder="Enter Gst Number" autocomplete="off">
                   <span id="gstin"></span>
                     @error('gst_number')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="annual_turnover">Annual Turnover</label>
                   <input class="form-control" type="text" name="annual_turnover" value="{{ $edit->annual_turnover }}" placeholder="Enter Annual Turnover" autocomplete="off">
                     @error('annual_turnover')
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
                    <label for="contract">Reference Name 1</label>
                   <input class="form-control" type="text" name="reference_name1" value="{{ $edit->reference_name1 }}" placeholder="Enter Reference Name" autocomplete="off">
                     @error('reference_name1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="reference_name2">Reference Name 2</label>
                   <input class="form-control" type="text" name="reference_name2" value="{{ $edit->reference_name2 }}" placeholder="Enter Reference Name 2" autocomplete="off">
                     @error('reference_name2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
             <h3><b>Bank Details</b></h3>
               <div class="row">
              <div class="col-lg-6">
                 <div class="form-group">
                    <label for="user_id">Bank</label>
                   <input class="form-control" type="text" name="bank_name" value="{{ $edit->bank_name }}" placeholder="Enter Bank name">
                     @error('bank_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="beneficiary_id">Branch Name</label>
                   <input class="form-control" type="text" name="branch_address" value="{{ $edit->branch_address }}" placeholder="Enter  Bank Branch">
                     @error('branch_address')
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
                    <label for="user_id">Bank A/c Number</label>
                   <input class="form-control" type="number" name="account_no" value="{{ $edit->account_no }}" placeholder="Enter Bank A/c Number">
                     @error('account_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="beneficiary_id">IFSC- code</label>
                   <input class="form-control" type="text" name="ifsc_code" value="{{ $edit->ifsc_code }}" placeholder="Enter  IFSC- code">
                     @error('ifsc_code')
                    <span class="invalid-feedback d-block" role="alert">
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
      {{--   <div class="col-md-4" style="border-left: 1px solid">
              <div class="container">
                <form action="{{ route('import_purchase_client')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="text-center mt-3">Excel Import</h2><br><br>
                  <input type="file" name="excel_data" id="imgupload" style="display:none">
                  <img src="https://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Microsoft-Excel-2013-icon.png" id="OpenImgUpload"><br>
                  <span class="text-muted">
                    <a class="float-right" href="{{ route('client_sheet') }}" title="Excel Download">Click Here to download sheet format</a>
                  </span>
                  <br><br>
                  <button type="submit" class="btn btn-info">Import</button>
      </form>
        </div>
          </div> --}}
        </div>
           
    </main>

<script type="text/javascript">
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
$(document).ready(function(){
  function city(id,oldCityCode=null){
    //alert(id)
  $.ajax({
         type: "GET",
         url: "{{ route('get-city') }}?id="+id,
         success: function(res){
         if(res){
      //console.log(res);
            $("#city").empty();
            $("#city").append('<option value="0">Select City</option>');
            $.each(res,function(index, city){
                $("#city").append('<option value="'+city.city_code+'">'+city.city_name+'</option>');
            });

        }
        else{
          $("#district").empty();
        }
      }
  });
}




   $("#state_code").on("change",function(){
      var id = $(this).val();
     
      city(id);
         
    });

})

</script>
<script type="text/javascript">
    $(document).ready(function(){
$("#gst_number").on('blur',function(){
   var gstin = $(this).val()
   var reggst = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/;
               // "/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/"
   if(!reggst.test(gstin) && gstin!=''){
        alert('GST Identification Number is not valid. It should be in this "11AAAAA1111Z1A1" format');
        $('#gst_number').val("");
        $('#gstin').html("This Gstin No. is not valid").css("color", "#B82E16");
     }else{
       $('#gstin').html("");
     }


});
$("#pan_no").on('blur',function(){
   var pan_no = $(this).val()
   var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
               // "/^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$/"
   if(!regpan.test(pan_no) && pan_no!=''){
        alert('PAN No. is not valid. It should be in this "AAAAA1111A" format');
        $('#pan_no').val("");
        $('#pan_no').html("This PAN No. is not valid").css("color", "#B82E16");
     }else{
       $('#pan_no').html("");
     }


});
});

</script>
@endsection