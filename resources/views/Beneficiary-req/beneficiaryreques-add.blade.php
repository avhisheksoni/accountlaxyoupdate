@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Add Beneficiary Request</h1>
          <p>Add Beneficiary Request</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Add Beneficiary Request</li>
          <li class="breadcrumb-item"><a href="{{-- {{route('salelist')}} --}}">Add Beneficiary Request</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('beneficiary-store') }}" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="user_id">User</label>
                   <input class="form-control" type="text" name="user_name"  value="{{ Auth::user()->name }}" readonly="">
                   <input class="form-control" type="hidden" name="user_id"  value="{{ Auth::user()->id }}">
                     @error('beneficiary_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    @php 
                    $benf = App\Client::all();
                    @endphp
                    <label for="beneficiary_id">Beneficiary</label>
                    <select name="beneficiary_id" class="form-control" id="beneficiary">
                    <option value="">choose</option>
                    @foreach( $benf as $bene)
                    <option value="{{ $bene->id }}" {{ old('beneficiary_id') == $bene->id ? 'selected' : '' }}>{{ $bene->name }}</option>
                    @endforeach
                  </select>
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
                    <input class="form-control" type="text" name="on_behalf_of" value="{{ old('on_behalf_of')}}" placeholder="Enter Email Address" autocomplete="off">
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
                   <div class="form-group">
                    <label for="job_id">Job</label>
                    <select name="job_id" class="form-control" id="job_id">
                    <option value="">choose</option>
                  </select>
                     @error('job_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  @php 
                  $bg_request_type =  App\bg_request_type::all();
                  @endphp
                  <div class="form-group">
                    <label for="request_type_id">Request-Type</label>
                     <select name="request_type_id" class="form-control" id="">
                    <option value="">choose</option>
                    @foreach( $bg_request_type as $bene)
                    <option value="{{ $bene->id }}" {{ old('request_type_id') == $bene->id ? 'selected' : ''}}>{{ $bene->name }}</option>
                    @endforeach
                  </select>
                     @error('request_type_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  @php 
                  $bg_type = App\bg_type_mast::where('status_lc', '!=' , 'False')->get();
                  @endphp
                <div class="form-group">
                    <label for="bg_type_id">BG-Type</label>
                     <select name="bg_type_id" class="form-control" id="">
                    <option value="">choose</option>
                    @foreach( $bg_type as $bene)
                    <option value="{{ $bene->id }}" {{ old('bg_type_id') == $bene->id ? 'selected' : ''}}>{{ $bene->name }}</option>
                    @endforeach
                  </select>
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
                     <input class="form-control" type="text" name="amount" value="{{ old('amount') }}" placeholder="Enter Contact Name" autocomplete="off">
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
                    <input class="form-control" type="text" name="bg_request_date" value="{{ old('bg_request_date') }}" id="sales_date" placeholder="Enter Contact Name" autocomplete="off">
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
                    <input class="form-control" type="text" name="submission_date" value="{{ old('submission_date') }}" placeholder="Enter Contact Name" autocomplete="off" id="purchase_date">
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
                      <input class="form-check-input" type="radio" value="domestic" {{ old('adoption_type') == 'domestic' ? 'checked' : ''}} name="adoption_type"><b>Domestic</b>
                    </label>
                    <div class="clear-fix"></div>
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="international" {{ old('adoption_type') == 'international' ? 'checked' : ''}} name="adoption_type"><b>Internation</b>
                    </label>
                  </div>
                  </div>
                </div>
                 <div class="col-lg-7">
                   <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" name="note"  rows="4" placeholder="Enter Details" autocomplete="off">{{ old('note') }}</textarea>
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
       // alert(rec_id);
       $.ajax({
                 type: "GET",
                 url: "{{ route('get-job-sale') }}?id="+rec_id,
                 success: function(res){
                  console.log(res);
                 $("#job_id").empty();
                 $("#job_id").val();
                    $("#job_id").append('<option value="">Job/Workname</option>');
                    $.each(res,function(index, recev){
                      //console.log(recev.company['name']);
                    $("#job_id").append('<option value='+recev.id+'>'+recev.job_describe+'</option>');
              });
              
                        
                   }
                      });

            
      
       });
    });

    </script>
@endsection

