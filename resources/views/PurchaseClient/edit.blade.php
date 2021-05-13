@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Update Petty Contractor</h1>
          <p>Petty Contractor Edit</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Petty Contractor Edit</li>
          <li class="breadcrumb-item"><a href="{{  route('PurchaseClient.index') }}">Petty Contractor List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{  route('PurchaseClient.index') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{route('PurchaseClient.update',$edit->id)}}" method="post">
              @csrf
              @method('PATCH')           
              <h3><b>Petty Contractor Details Update</b></h3>
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">Petty Contractors</label>
                   <input class="form-control" type="text" name="name" value="{{ old('name') == '' ? $edit->name : old('name') }}" placeholder="Enter Client name">
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
                   <input class="form-control" type="text" name="gstin" value="{{ old('gstin') == '' ? $edit->gstin : old('gstin') }}" placeholder="Enter  Gstin">
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
                    <input class="form-control" type="text" name="pan_no" value="{{ old('pan_no') == '' ? $edit->pan_no : old('pan_no') }}" placeholder="Enter Pan No." autocomplete="off">
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
                    <label for="user_id">Petty Contractor Owner name</label>
                   <input class="form-control" type="text" name="petty_owner" value="{{ old('petty_owner') == '' ? $edit->petty_owner : old('petty_owner') }}" placeholder="Enter petty owner">
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
                   <input class="form-control" type="text" name="petty_owner_contact" value="{{ old('petty_owner_contact') == '' ? $edit->petty_owner_contact : old('petty_owner_contact') }}" placeholder="Enter  petty owner contact">
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
                    <input class="form-control" type="text" name="petty_owner_email" value="{{ old('petty_owner_email') == '' ? $edit->petty_owner_email : old('petty_owner_email') }}" placeholder="Enter Billing Person" autocomplete="off">
                     @error('petty_owner_email')
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
                    <label for="user_id">CIN No.</label>
                   <input class="form-control" type="text" name="cin_no" value="{{ old('cin_no') == '' ? $edit->cin_no : old('cin_no') }}" placeholder="Enter CIN No.">
                     @error('cin_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Communication Address</label>
                   <textarea class="form-control" name="Registered_address"  rows="4" placeholder="Enter Communication Address" autocomplete="off">{{ old('Registered_address') == '' ? $edit->Registered_address : old('Registered_address') }}</textarea>
                     @error('Registered_address')
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
                    <label for="job_id">Email</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') == '' ? $edit->email : old('email') }}" placeholder="Enter Communication Email " autocomplete="off">
                     @error('on_behalf_of')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Communication Address</label>
                   <textarea class="form-control" name="Registered_address"  rows="4" placeholder="Enter Communication Address" autocomplete="off">{{ old('Registered_address') == '' ? $edit->Registered_address : old('Registered_address') }}</textarea>
                     @error('Registered_address')
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
                    <label for="invoive_number">Optional Email</label>
                      <input class="form-control" type="text" name="email" value="{{ old('email') == '' ? $edit->email : old('email') }}" placeholder="Enter R-Email address" autocomplete="off">
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Address of Registered office</label>
                   <textarea class="form-control" name="note"  rows="4" placeholder="Enter Address of Registered office" autocomplete="off">{{ old('note') == '' ? $edit->note : old('note') }}</textarea>
                     @error('note')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               <h3><b>Laxyo Details</b></h3>
               <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">Contact Person-I</label>
                   <input class="form-control" type="text" name="our_contact_person1" value="{{ old('our_contact_person1') == '' ? $edit->our_contact_person1 : old('our_contact_person1') }}" placeholder="Enter Laxyo Contact Person-I">
                     @error('our_contact_person1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Contact Person-II</label>
                   <input class="form-control" type="text" name="our_contact_person2" value="{{ old('our_contact_person2') == '' ? $edit->our_contact_person2 : old('our_contact_person2') }}" placeholder="Enter  Laxyo Contact Person-II">
                     @error('our_contact_person2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of"> HR</label>
                    <input class="form-control" type="text" name="our_hr" value="{{ old('our_hr') == '' ? $edit->our_hr : old('our_hr') }}" placeholder="Enter Laxyo HR" autocomplete="off">
                     @error('our_hr')
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
                    <label for="user_id">Contact Person-I Mobile</label>
                   <input class="form-control" type="number" name="our_contact_person1_ctect" value="{{ old('our_contact_person1_ctect') == '' ? $edit->our_contact_person1_ctect : old('our_contact_person1_ctect') }}" placeholder="Enter Laxyo Contact Person-I Mobile">
                     @error('our_contact_person1_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Contact Person-II Mobile</label>
                   <input class="form-control" type="number" name="our_contact_person2_ctect" value="{{ old('our_contact_person2_ctect') == '' ? $edit->our_contact_person2_ctect : old('our_contact_person2_ctect') }}" placeholder="Enter  Laxyo Contact Person-II Mobile">
                     @error('our_contact_person2_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">HR Mobile</label>
                    <input class="form-control" type="number" name="our_hr_ctect" value="{{ old('our_hr_ctect') == '' ? $edit->our_hr_ctect : old('our_hr_ctect') }}" placeholder="Enter Laxyo HR Mobile" autocomplete="off">
                     @error('our_hr_ctect')
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
                    <option value="{{ $sname->state_code }}" {{ (old('state_code') ?? $edit->state_code )  == $sname->state_code ? 'selected' : '' }}>{{ $sname->state_name }}</option>
                    @endforeach

                   </select>
                     @error('on_behalf_of')
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
                    <option {{ (old('comp_type') ?? $edit->comp_type) == 'Limited' ? 'selected' :''}} value = 'Limited'>Limited</option>
                    <option {{ (old('comp_type') ?? $edit->comp_type) == 'Private' ? 'selected' :''}} value = 'Private'>Private</option>
                    <option {{ (old('comp_type') ?? $edit->comp_type) == 'Proprietary' ? 'selected' :''}} value = 'Proprietary'>Proprietary</option>
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
                    <label for="tenure">Tenure {{$edit->tenure}}</label>
                  <select name="tenure" class="form-control">
                    <option {{ $edit->tenure === '1year' ? 'selected' :''}} value = '1year'>For 1 year</option>
                    <option {{ $edit->tenure === '2year' ? 'selected' :''}} value = '2year'>For 2 year</option>
                    <option {{ $edit->tenure === '3year' ? 'selected' :''}} value = '3year'>For 3 year</option>
                    <option {{ $edit->tenure === '4year' ? 'selected' :''}} value = '4year'>For 4 year</option>
                    <option {{ $edit->tenure === '5year' ? 'selected' :''}} value = '5year'>For 5 year</option>
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
                    <label for="on_behalf_of">Annual Escalation details</label>
                   <textarea class="form-control" name="tenure_accelration"  rows="4" placeholder="Enter Annual Escalation details" autocomplete="off">{{ old('tenure_accelration') == '' ? $edit->tenure_accelration:old('tenure_accelration') }}</textarea>
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
                <div class="row">
             
               {{--  <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Service Tax no.</label>
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
                    <label for="on_behalf_of">Sales Tax no.</label>
                    <input class="form-control" type="text" name="pan_no" value="{{ old('pan_no') }}" placeholder="Enter Pan No." autocomplete="off">
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div> --}}
              </div>
               <div class="row">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="contract">Other Details if any</label>
                   <textarea class="form-control" name="note"  rows="4" placeholder="Enter description" autocomplete="off">{{ old('note') == '' ? $edit->note:old('note') }}</textarea>
                     @error('Registered_address')
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
        </div>
    </main>


<script>
 $(document).ready(function(){ 

  var id = "{{old('state_code') ?? $edit->state_code }}";
  var oldCityCode = "{{ old('city_code') ?? $edit->city_code}}"


  if(id!=null){
    city(id,oldCityCode);
  } 

  function city(id,oldCityCode=null){

  $.ajax({
         type: "GET",
         url: "{{ route('get-city') }}?id="+id,
         success: function(res){
         if(res){
      //console.log(res);
            $("#city").empty();
            $("#city").append('<option value="0">Select City</option>');
            $.each(res,function(index, city){
                $("#city").append('<option value="'+city.city_code+'" '+(city.city_code==oldCityCode ? "selected":"")+'>'+city.city_name+'</option>');
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