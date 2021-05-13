@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Central Party Add</h1>
          <p>Add Central Party</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Add Central Party Form</li>
          <li class="breadcrumb-item"><a href="">Central Party</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('central-party-store') }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Party Name</b></label>
                  <div class="col-md-8">
                   <input class="form-control" type="text" value="{{ old('party_name') }}" name="party_name" placeholder="Enter Central Party Name" autocomplete="off">
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
                  @php  
                  $company = App\Company_mast::all();
                  @endphp
                  <select name="company_id" class="form-control" id="company">
                    <option value="">Choose</option>
                    @foreach($company as $perm)
                    <option value="{{ $perm->id }}">{{ $perm->name }}</option>
                    @endforeach
                  </select>
                     @error('company_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Party-Name</b></label>
                  <div class="col-md-8">
                    <select name="party_id" id="party" class="form-control">
                      <option value="">Party-Name</option>
                    </select>
                     @error('party_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>State</b></label>
                  <div class="col-md-8">
                    @php  
                    $state  =  App\state::all();
                    @endphp
                     <select name="state_code" class="form-control" id="state">
                     @foreach($state as $states)
                <option value="{{ $states->state_code }}" {{ old('state')== $states->state_code ? 'selected' : '' }}>{{ $states->state_name }}</option>
                @endforeach
                     </select>
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
                    <select name="city_code" id="city" class="form-control">
                      <option value="">Select State First</option>
                    </select>
                     @error('district')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Contact</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ old('contact') }}" name="contact" placeholder="Enter Contact No." autocomplete="off">
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
                    <input class="form-control" type="text"  value="{{ old('pan_no') }}" name="pan_no" placeholder="Enter Pan No." autocomplete="off">
                     @error('pan_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Desciption</b></label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="note"  rows="4"  autocomplete="off" placeholder="Enter Details" ></textarea>
                     @error('postal_address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Postal Address</b></label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="postal_address"  rows="4"  autocomplete="off" placeholder="Enter Postal Address Details" >{{ old('postal_address') }}</textarea>
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
           <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
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
              // console.log(res);
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
 $("#company").on("change",function(){
           var cmp_id = $(this).val();
           //alert(cmp_id);
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-party') }}?cmp_id="+cmp_id,
                 success: function(result){
                  if(result){
              // console.log(res);
                        $("#party").empty();
                        $("#party").append('<option value="0">Select Party</option>');
                        $.each(result,function(index, city){
                        $("#party").append('<option value="'+city.id+'">'+city.company_party+'</option>');
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