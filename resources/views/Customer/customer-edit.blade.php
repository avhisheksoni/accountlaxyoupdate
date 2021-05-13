@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Customer</h1>
          <p>Edit Customer</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Customer</li>
          <li class="breadcrumb-item"><a href="">Customer List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('customer-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Customer</b></label>
                  <div class="col-md-8">
                  <input class="form-control" type="text" value="{{ $edit->customer_desc }}" name="customer_desc" placeholder="Enter Customer Name" autocomplete="off">
                     @error('customer_desc')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Designation</b></label>
                  <div class="col-md-8">
                 <input class="form-control" type="text" value="{{ $edit->designation }}" name="designation" placeholder="Enter Designation" autocomplete="off">
                     @error('designation')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Email</b></label>
                  <div class="col-md-8">
                     <input class="form-control" type="text" value="{{ $edit->email }}" name="email" placeholder="Enter Email Address" autocomplete="off">
                     @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>GSTIN</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->gstin }}" name="gstin" placeholder="Enter GSTIN" autocomplete="off">
                     @error('gstin')
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
                     <select name="state" class="form-control" id="state">
                    @foreach($state as $ven)
                   <option @if($ven->state_code == App\state::find($edit->state)->state_code) selected  @endif value="{{ $ven->state_code }}"
                >{{ $ven->state_name }}</option>
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
                    <select name="district" id="city" class="form-control">
                      <option value="{{ App\City::find($edit->district)->city_code }}">{{ App\City::find($edit->district)->city_name }}</option>
                    </select>
                     @error('district')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Postal-Address</b></label>
                  <div class="col-md-8">
                   <input class="form-control" type="text" value="{{ $edit->postal_code }}" name="postal_code" placeholder="Enter Postal-Address" autocomplete="off">
                     @error('postal_code')
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
                    <input class="form-control" type="text" value="{{ $edit->pan_number }}"  id="pan_number" name="pan_number" placeholder="Enter Pan No." autocomplete="off">
                     @error('pan_number')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Vat</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  value="{{ $edit->vat }}" id="" name="vat" placeholder="Enter Vat" autocomplete="off">
                     @error('vat')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Contact-1</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->contact1 }}" name="contact1" placeholder="Enter Contact No" autocomplete="off">
                     @error('contact1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Conatct-2</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->contact2 }}" name="contact2" placeholder="Enter Contact No." autocomplete="off">
                     @error('contact2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Address</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->address }}" name="address" placeholder="Enter  Address" autocomplete="off">
                     @error('address')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Note</b></label>
                  <div class="col-md-8">
                  <textarea class="form-control" name="notes"  rows="4" placeholder="Enter Details" autocomplete="off">{{ $edit->notes }}</textarea>
                     @error('notes')
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
           //alert(id);
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
    