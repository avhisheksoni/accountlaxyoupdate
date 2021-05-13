@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Client Info</h1>
          <p>Add Client Info</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Add Client</li>
          <li class="breadcrumb-item"><a href="{{  route('client-list') }}">Add Client List</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('client-store') }}" method="post">
              @csrf
              <h3><b>Client Details</b></h3>
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">Client</label>
                   <input class="form-control" type="text" name="name" value="{{ old('name')}}" placeholder="Enter Client name">
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
                    <label for="user_id">Technical Head</label>
                   <input class="form-control" type="text" name="tech_head" value="{{ old('tech_head')}}" placeholder="Enter Technical Head">
                     @error('tech_head')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Account Person</label>
                   <input class="form-control" type="text" name="account_person" value="{{ old('account_person') }}" placeholder="Enter  Account Person">
                     @error('account_person')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Billing Person</label>
                    <input class="form-control" type="text" name="billing_person" value="{{ old('billing_person') }}" placeholder="Enter Billing Person" autocomplete="off">
                     @error('billing_person')
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
                    <label for="user_id">Technical Head Contact</label>
                   <input class="form-control" type="number" name="tech_head_ctect" value="{{ old('tech_head_ctect')}}" placeholder="Enter Technical Head Contact">
                     @error('tech_head_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Account Person Contact</label>
                   <input class="form-control" type="number" name="account_person_ctect" value="{{ old('account_person_ctect') }}" placeholder="Enter  Account Person Contact">
                     @error('account_person_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Billing Person Contact</label>
                    <input class="form-control" type="number" name="billing_person_ctect" value="{{ old('billing_person_ctect') }}" placeholder="Enter Billing Person Contact" autocomplete="off">
                     @error('billing_person_ctect')
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
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Enter Communication Email " autocomplete="off">
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
                   <textarea class="form-control" name="Registered_address"  rows="4" placeholder="Enter Communication Address" autocomplete="off">{{ old('Registered_address') }}</textarea>
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
                    <label for="invoive_number">R-Email address</label>
                      <input class="form-control" type="text" name="remail" value="{{ old('remail') }}" placeholder="Enter R-Email address" autocomplete="off">
                     @error('remail')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Address of Registered office</label>
                   <textarea class="form-control" name="note"  rows="4" placeholder="Enter Address of Registered office" autocomplete="off">{{ old('note') }}</textarea>
                     @error('Registered_address')
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
                    <label for="user_id">Laxyo Contact Person-I</label>
                   <input class="form-control" type="text" name="our_contact_person1" value="{{ old('our_contact_person1')}}" placeholder="Enter Laxyo Contact Person-I">
                     @error('our_contact_person1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Laxyo Contact Person-II</label>
                   <input class="form-control" type="text" name="our_contact_person2" value="{{ old('our_contact_person2') }}" placeholder="Enter  Laxyo Contact Person-II">
                     @error('our_contact_person2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Laxyo HR</label>
                    <input class="form-control" type="text" name="our_hr" value="{{ old('our_hr') }}" placeholder="Enter Laxyo HR" autocomplete="off">
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
                    <label for="user_id">Laxyo Contact Person-I Mobile</label>
                   <input class="form-control" type="number" name="our_contact_person1_ctect" value="{{ old('our_contact_person1_ctect')}}" placeholder="Enter Laxyo Contact Person-I Mobile">
                     @error('our_contact_person1_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Laxyo Contact Person-II Mobile</label>
                   <input class="form-control" type="number" name="our_contact_person2_ctect" value="{{ old('our_contact_person2_ctect') }}" placeholder="Enter  Laxyo Contact Person-II Mobile">
                     @error('our_contact_person2_ctect')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">Laxyo HR Mobile</label>
                    <input class="form-control" type="number" name="our_hr_ctect" value="{{ old('our_hr_ctect') }}" placeholder="Enter Laxyo HR Mobile" autocomplete="off">
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
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">CIN No.</label>
                   <input class="form-control" type="text" name="cin_no" value="{{ old('cin_no')}}" placeholder="Enter Other Information">
                     @error('cin_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
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
                     @error('on_behalf_of')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
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
                    <option value = '0'>--select--</option>
                    <option value = 'Government'>Government</option>
                    <option value = 'Limited'>Limited</option>
                    <option value = 'Private'>Private</option>
                    <option value = 'Proprietary'>Proprietary</option>
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
                    <option value = 'Proprietary'>--select--</option>
                    <option value = '1year'>For 1 year</option>
                    <option value = '2year'>For 2 year</option>
                    <option value = '3year'>For 3 year</option>
                    <option value = '4year'>For 4 year</option>
                    <option value = '5year'>For 5 year</option>
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
                   <textarea class="form-control" name="tenure_accelration"  rows="4" placeholder="Enter Annual Escalation details" autocomplete="off">{{ old('tenure_accelration') }}</textarea>
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
                   <textarea class="form-control" name="note"  rows="4" placeholder="Enter description" autocomplete="off">{{ old('note') }}</textarea>
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
        <div class="col-md-4" style="border-left: 1px solid">
              <div class="container">
                <form action="{{ route('import_client')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="text-center mt-3">Excel Import</h2><br><br>
                  <input type="file" name="excel_data" id="imgupload" style="display:none">
                  <img src="https://icons.iconarchive.com/icons/dakirby309/simply-styled/256/Microsoft-Excel-2013-icon.png" id="OpenImgUpload"><br>
                  <span class="text-muted">
                    <a class="float-right" href="{{ route('client-format') }}" title="Excel Download">Click Here to download sheet format</a>
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
   
    var cityid = $("#city").val();
    //alert(cityid);
    if(cityid != ''){
       
       $.ajax({
                 type: "GET",
                 url: "{{ route('get-city-name') }}?id="+cityid,
                 success: function(res){
                 if(res){
              //console.log(res);
                        $("#city").empty();
                        //$("#city").append('<option value="0">Select City</option>');
                        $("#city").append('<option value="'+res.city_code+'">'+res.city_name+'</option>');
            

                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });

    }

 $("#state_code").on("change",function(){
           var id = $(this).val();
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

            
      });


});
</script>
<script type="text/javascript">
  $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
</script>

@endsection

