@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Beneficiary Request Details</h1>
          <p>Beneficiary Request Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Beneficiary Request</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Beneficiary Request Details</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">User</label>
                   <input class="form-control" type="text" name="user_name"  value="{{ $edit->username->name }}" readonly="">
                   <input class="form-control" type="hidden" name="user_id"  value="">
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="beneficiary_id">Beneficiary</label>
                   <input class="form-control" type="text" name="user_name"  value="{{ $edit->benef->name }}" readonly="">
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="on_behalf_of">On Behalf  of</label>
                    <input class="form-control" type="text" name="on_behalf_of" value="{{ $edit->on_behalf_of }}" placeholder="Enter Email Address" autocomplete="off" readonly="">
                     @error('on_behalf_of')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-4">
                    <label for="job_id">Job</label>
                 <input type="text" name="job_name" class="form-control" value="{{ $edit->workname->job_describe }}" id="job_id_old" readonly="">
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="request_type_id">Request-Type</label>
                     <input class="form-control" type="text" name="user_name"  value="{{ $edit->bgtype->name }}" readonly="">
                     @error('request_type_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                <div class="form-group">
                    <label for="bg_type_id">BG-Type</label>
                   <input class="form-control" type="text" name="user_name"  value="{{ $edit->bg_type_mast->name }}" readonly="">
                     @error('bg_type_id')
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
                    <label for="invoive_number">Amount</label>
                     <input class="form-control" type="text" name="amount" value="{{ $edit->amount}}" placeholder="Enter Contact Name" autocomplete="off" readonly="">
                     @error('amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="contract">Generate Date</label>
                    <input class="form-control" type="text" name="bg_request_date" id="sales_date" placeholder="Enter Contact Name" value="{{ $edit->bg_request_date }}" autocomplete="off" readonly="">
                     @error('bg_request_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="note">Submission Date</label>
                    <input class="form-control" type="text" name="submission_date" placeholder="Enter Contact Name" autocomplete="off" value="{{ $edit->submission_date }}" id="purchase_date" readonly="">
                     @error('submission_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
                  <div class="col-lg-5">
                   <div class="form-group">
                    <label for="tender_no"></label>
                    <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" {{ ($edit->adoption_type == 'domestic') ? ("checked") : ( '' ) }} value="domestic" name="adoption_type"><b>Domestic</b>
                    </label>
                    <div class="clear-fix"></div>
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" {{ ($edit->adoption_type == 'international') ? ("checked") : ( '' ) }} value="international" name="adoption_type"><b>Internation</b>
                    </label>
                  </div>
                  </div>
                </div>
                 <div class="col-lg-7">
                   <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details" autocomplete="off" readonly="">{{ $edit->note }}</textarea>
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
       $("#beneficiary").on("change",function(){
       var rec_id = $(this).val();
        $("#job_id_old").hide();
        $("#job_id_new").show();
        alert(rec_id);

       $.ajax({
                 type: "GET",
                 url: "{{ route('get-job-sale') }}?id="+rec_id,
                 success: function(res){
                  console.log(res);
                 $("#job_id_new").empty();
                 $("#job_id_new").val();
                    $("#job_id_new").append('<option value="">Job/Workname</option>');
                    $.each(res,function(index, recev){
                      //console.log(recev.company['name']);
                    $("#job_id_new").append('<option value='+recev.id+'>'+recev.job_describe+'</option>');
              });
              
                        
                   }
                      });

            
      
       });
    });

    </script>
@endsection

