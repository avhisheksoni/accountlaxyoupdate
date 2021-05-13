@extends('layouts.master')
@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Edit Bank</h1>
          <p>Edit Bank Info</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Edit Bank Info</li>
          <li class="breadcrumb-item"><a href="{{  route('purchaselist') }}">Banks</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('bank-update',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <div class="tile-body">
              {{-- <form class="form-horizontal"> --}}
                   <div class="form-group row">
                  <label class="control-label col-md-3"><b>Bank code</b></label>
                  <div class="col-md-8">
                   <input class="form-control" type="text" value="{{ $edit->bank_code  }}" name="bank_code" placeholder="Enter Bank code" autocomplete="off" readonly>
                     @error('bank_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Bank</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->name }}" name="name" placeholder="Enter Bank name" readonly>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Ifsc-code</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->ifsc_code }}" name="ifsc_code" placeholder="Enter IFSC code" readonly>
                     @error('ifsc_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Branch</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text"  value="{{ $edit->branch }}" name="branch" placeholder="Enter Bank Branch" readonly>
                     @error('branch')
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
                  <label class="control-label col-md-3"><b>Account No.</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="Number" value="{{ $edit->account_no }}" name="account_no" placeholder="Enter Account Number" readonly>
                     @error('account_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3"><b>Account Holder</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->account_holder }}" name="account_holder" placeholder="Enter Account holder name" id="person" readonly="">
                     @error('account_holder')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Contact-Person</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->contact_person }}" name="contact_person" placeholder="Enter Contact  Person  Name" id="contact" readonly>
                     @error('contact_person')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                {{--  <div class="form-group row">
                  <label class="control-label col-md-3"><b>Contact No.</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="number" value="{{ $edit->contact }}" name="contact" placeholder="Enter mobile of Contact-person" id="person" readonly>
                     @error('contact')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div> --}}
                <div class="form-group row">
                  <label class="control-label col-md-3"><b>Email</b></label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ $edit->email }}" name="email" placeholder="Enter Email Address" readonly>
                     @error('email')
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
           {{-- <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Save</button>
            </div> --}}
      </form>
        </div>
          </div>
        </div>
    </main>
    <script type="text/javascript">
    $(document).ready(function(){
$("#contact").on('blur',function(){
  alert("tyr");
  $('#person').val("");

});
});
  </script>
@endsection