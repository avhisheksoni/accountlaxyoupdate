@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Petty contractors</h1>
          <p>Add Petty contractors</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty contractors</li>
          <li class="breadcrumb-item"><a href="">Petty contractors List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{  route('client-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{route('PurchaseClient.store')}}" method="post">
              @csrf
              <h3><b>Petty contractors Details</b></h3>
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">Petty Contractors</label>
                   <input class="form-control" type="text" name="name" value="{{ old('name')}}" placeholder="Enter Petty Contractors">
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">GSTIN/UIN of Recipient</label>
                   <input class="form-control" type="text" name="gstin" value="{{ old('gstin') }}" placeholder="Enter  Gstin">
                     @error('gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">PAN No.</label>
                    <input class="form-control" type="text" name="pan_no" value="{{ old('pan_no') }}" placeholder="Enter Pan No." autocomplete="off">
                     @error('pan_no')
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
                    <label for="user_id">Petty Contractor Owner Name</label>
                   <input class="form-control" type="text" name="petty_owner" value="{{ old('petty_owner')}}" placeholder="Enter Owner Name">
                     @error('petty_owner')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Contractor Owner Contact No.</label>
                   <input class="form-control" type="text" name="petty_owner_contact" value="{{ old('petty_owner_contact') }}" placeholder="Enter  Owner Contact No.">
                     @error('petty_owner_contact')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Contractor Owner Email Address</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Enter Owner Email" autocomplete="off">
                     @error('email')
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
                    <label for="user_id">Location</label>
                  <textarea class="form-control" name="Registered_address"  rows="4" placeholder="Enter Location" autocomplete="off">{{ old('Registered_address') }}</textarea>
                     @error('Registered_address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Correspondance Address</label>
                   <textarea class="form-control" name="correspondence_address"  rows="4" placeholder="Enter Correspondance Address" autocomplete="off">{{ old('correspondence_address') }}</textarea>
                     @error('correspondence_address')
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
                   <input class="form-control" type="text" name="bank_name" value="{{ old('bank_name')}}" placeholder="Enter Bank name">
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
                   <input class="form-control" type="text" name="branch_address" value="{{ old('branch_address') }}" placeholder="Enter  Bank Branch">
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
                   <input class="form-control" type="number" name="account_no" value="{{ old('account_no')}}" placeholder="Enter Bank A/c Number">
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
                   <input class="form-control" type="text" name="ifsc_code" value="{{ old('ifsc_code') }}" placeholder="Enter  IFSC- code">
                     @error('ifsc_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               <h3><b>Other Information</b></h3>
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
                    <option value="{{ $sname->state_code }}" {{ old('state_code') == $sname->state_code ? 'selected' : '' }}>{{ $sname->state_name }}</option>
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
                   <option value="{{ old('city_code') }}">choose</option>
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
                    <label for="comp_type">Type</label>
                  <select name="comp_type" class="form-control">
                    <option value = ''>-select-</option>
                    <option value = 'Limited'>proprietorship</option>
                    <option value = 'Private'>patnership</option>
                    <option value = 'Proprietary'>Private Limited</option>
                  </select>
                     @error('comp_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tenure">Tenure</label>
                  <select name="tenure" class="form-control">
                    <option value = ''>-select-</option>
                    <option value = '1year'>For 1 year</option>
                    <option value = '2year'>For 2 year</option>
                    <option value = '3year'>For 3 year</option>
                    <option value = '4year'>For 4 year</option>
                    <option value = '5year'>For 5 year</option>
                    <option value = '5year'>Add Item Rate</option>
                  </select>
                     @error('tenure')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Special term of  Contract</label>
                   <textarea class="form-control" name="tenure_accelration"  rows="4" placeholder="Enter Annual Escalation details" autocomplete="off">{{ old('tenure_accelration') }}</textarea>
                     @error('tenure_accelration')
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
                    <label for="contract">Other Details if any</label>
                   <textarea class="form-control" name="note"  rows="4" placeholder="Enter description" autocomplete="off">{{ old('note') }}</textarea>
                     @error('note')
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
        <div class="col-md-4" style="border-left: 1px solid">
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
          </div>
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
@endsection