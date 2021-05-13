@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Central Party View</h1>
          <p>Central Party View</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">View Central Party Form</li>
          <li class="breadcrumb-item"><a href="">Central Party</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{ route('central-party-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Party Name</b></label>
                  <div class="col-md-8">
                   <input class="form-control" type="text" value="{{ $edit->party_name }}" name="party_name" placeholder="Enter Central Party Name" autocomplete="off" readonly>
                     @error('party_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Company</b></label>
                  <div class="col-md-8">
                     <input class="form-control" type="text" value="{{  App\Company_mast::find($edit->company_id)->name }}" name="contact" placeholder="Enter Contact No." autocomplete="off" readonly>
                     @error('company_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Party-Name</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{  App\CompanyPartyModel::find($edit->party_id)->company_party }}" name="contact" placeholder="Enter Contact No." autocomplete="off" readonly>
                     @error('city_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>State</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{  App\state::find($edit->state_code)->state_name }}" name="contact" placeholder="Enter Contact No." autocomplete="off" readonly>
                     @error('state')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>City</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{  App\City::find($edit->city_code)->city_name }}" name="contact" placeholder="Enter Contact No." autocomplete="off" readonly>
                     @error('city_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Contact</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->contact }}" name="contact" placeholder="Enter Contact No." autocomplete="off" readonly>
                     @error('contact')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                
             {{-- </form> --}}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Pan No.</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  value="{{ $edit->pan_no }}" name="pan_no" placeholder="Enter Pan No." autocomplete="off" readonly>
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Description</b></label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="note"  rows="4"  autocomplete="off" placeholder="Enter Postal Address Details" readonly>{{ $edit->note }}</textarea>
                     @error('note')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Postal Address</b></label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="postal_address"  rows="4"  autocomplete="off" placeholder="Enter Postal Address Details" readonly>{{ $edit->postal_address }}</textarea>
                     @error('postal_address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
             {{-- </form> --}}
            </div>
              
          </div>
        </div>
        </div>
          {{--  <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div> --}}
      </form>
        </div>
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
 $("#state").on("change",function(){
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
@endsection