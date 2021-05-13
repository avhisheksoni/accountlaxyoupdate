@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Beneficiary Update</h1>
          <p>Beneficiary Update</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Beneficiary Update</li>
          <li class="breadcrumb-item"><a href="{{ route('benef-list') }}">Beneficiary Update List</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('benef-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-3">
                 
                </div>
                <div class="col-lg-6">
                   @php 
                    $comp = App\Company_mast::all();
                    @endphp
                   <div class="form-group">
                    <label for="beneficiary_id">Company</label>
                   <select name="comp_id" class="form-control" id="comp_id">
                    <option vlaue="">Choose</option>
                    @foreach($comp as $sname)
                    <option value="{{ $sname->id }}" {{ $edit->comp_id == $sname->id ? 'selected' : '' }}>{{ $sname->name }}</option>
                    @endforeach
                  </select>
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                 <input type="hidden" name="bg_request_id" id="bg_request_id" value="" class="form-control">
                </div>
              </div>
              <div class="row">
              <div class="col-lg-6">
                   <div class="form-group">
                    <label for="client_id">Add Beneficiary</label>
                     <select name="client_id" class="form-control client" id="client_id" style="display: none">
                    <option value="">Choose</option>
                   </select>
                   <input type="text" class="form-control" name="client_name" id="client_old" value="{{ $edit->beneficiary->name.'||'.$edit->bg_request_id }}">
                   <input type="hidden"  name="client_id" id="client_hid" value="{{ $edit->beneficiary->id.'||'.$edit->bg_request_id }}" class="form-control" >
                     @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                   <div class="col-lg-6">
                   <div class="form-group">
                     
                    <label for="job_id">Job/Work Name</label>
                     <input class="form-control" type="text"  value="" name="job_name" placeholder="Enter Gstin No." autocomplete="off"  readonly="" id="job_id"> 
                     @error('client_id')
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
                    <label for="job_id">Gstin No.</label>
                    <input class="form-control client" type="text"  value="" name="gstin_no" placeholder="Enter Gstin No." autocomplete="off" id="gstin_no" readonly="">
                     @error('gstin_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="form-group">
                    <label for="request_type_id">Pan No.</label>
                   <input class="form-control client" type="text"  value="" name="pan_no" placeholder="Enter Pan No." autocomplete="off" id="pan_no" readonly="">
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
                    <label for="invoive_number">Email</label>
                   <input class="form-control client" type="text" value="" name="email" placeholder="Enter Email Address" autocomplete="off" id="email" readonly="" autocomplete="on">
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-4">
                  <div class="form-group">
                    <label for="invoive_number">State</label>
                    <input type="text" name="state" class="form-control client" id="state" readonly="">
                     @error('state')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-4">
                  <div class="form-group">
                    <label for="contract">City</label>
                   <input type="text" name="city_code" value="" id="city" class="form-control client" readonly="">
                     @error('city_code')
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
                    <label for="invoive_number">Correspondence Address</label>
                    <textarea class="form-control client" name="correspondance_address"  rows="4"  autocomplete="off" placeholder="Enter Correspondence Address Details" id="correspondance" readonly=""></textarea>
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Registered Address</label>
                   <textarea class="form-control client" name="registered_address"  rows="4"  autocomplete="off" placeholder="Enter Registered Address Details" id="register" readonly=""></textarea>
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
                    <label for="contact">Contact</label>
                  <input class="form-control client" type="text" value="" name="contact" placeholder="Enter Contact no." autocomplete="off" id=
                   "contact" readonly="">
                     @error('contact')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contract">Note</label>
                   <textarea class="form-control client" name="note"  rows="4" placeholder="Enter description" autocomplete="off" readonly="" id="note"></textarea>
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
    </main>

     <script>
$(document).ready(function(){

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
 //$("#client_id").on("load",function(){

  gross_total();
  $("#comp_id").on('change',function(){

             $(".client").val('');
             var id = $(this).val();
             //alert(id);
              $.ajax({
                 type: "GET",
                 url: "{{ route('get-client-bene') }}?id="+id,
                 success: function(res){
                 if(res){
               //console.log(res);
              $("#client_old").hide();
              $("#client_hid").attr("disabled","disabled");
              $("#client_id").show();
               $("#client_id").empty();
                    $("#client_id").append('<option value="0">Select Receiver</option>');
                    $.each(res,function(index, recev){
                    $("#client_id").append('<option value='+recev.client.id+'||'+recev.request_code+'>'+recev.client.name+'||'+recev.request_code+'</option>');
                  });
                       

                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });
          })

  
   $("#client_id").on('change',function(){
      var id= $(this).val();
      //alert(id);
      $.ajax({
                 type: "GET",
                 url: "{{ route('get-benfi-details') }}?id="+id,
                 success: function(res){
                 if(res){
              //console.log(res);
                        $("#email").empty('');
                        $("#email").val(res.client.email);
                        $("#job_id").empty();
                        $("#job_id").val(res.job.job_describe);
                        $("#bg_request_id").empty();
                        $("#bg_request_id").val(res.bg);
                        $("#note").empty('');
                        $("#note").val(res.client.note);
                        $("#register").val('');
                        $("#register").html(res.client.Registered_address);
                        $("#correspondance").empty('');
                        $("#correspondance").html(res.client.correspondence_address);

                        $("#pan_no").empty();
                        $("#pan_no").val(res.client.pan_no);
                        $("#gstin_no").empty();
                        $("#gstin_no").val(res.client.gstin);
                        $("#contact").empty();
                        $("#contact").val(res.client.contact);
                        $("#state").empty();
                        $("#state").val(res.state.state_name);
                        $("#city").empty();
                        $("#city").val(res.city.city_name);
              //           $.each(res,function(index, city){
              //           $("#city").append('<option value="'+city.city_code+'">'+city.city_name+'</option>');
              // });

                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });
   });
  function gross_total(){
           var id = $("#client_hid").val();
          // alert(id);
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-benfi-details') }}?id="+id,
                 success: function(res){
                 if(res){
              //console.log(res);
                        $("#email").val('');
                        $("#email").val(res.client.email);
                        $("#job_id").empty();
                        $("#job_id").val(res.job.job_describe);
                        $("#bg_request_id").empty();
                        $("#bg_request_id").val(res.bg);
                        $("#note").empty('');
                        $("#note").val(res.client.note);
                        $("#register").val('');
                        $("#register").html(res.client.Registered_address);
                        $("#correspondance").empty('');
                        $("#correspondance").html(res.client.correspondence_address);

                        $("#pan_no").empty();
                        $("#pan_no").val(res.client.pan_no);
                        $("#gstin_no").empty();
                        $("#gstin_no").val(res.client.gstin);
                        $("#contact").empty();
                        $("#contact").val(res.client.contact);
                        $("#state").empty();
                        $("#state").val(res.state.state_name);
                        $("#city").empty();
                        $("#city").val(res.city.city_name);
              //           $.each(res,function(index, city){
              //           $("#city").append('<option value="'+city.city_code+'">'+city.city_name+'</option>');
              // });

                      }
                      else{
                      $("#district").empty();
                      }
                    }
                      });
        }

          

            
      //});
});
</script>

@endsection

