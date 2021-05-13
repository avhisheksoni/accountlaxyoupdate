@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Guarantee Request Details</h1>
          <p>Guarantee Details</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Guarantee Details</li>
          <li class="breadcrumb-item"><a href="">Guarantee List</a></li>
        </ul>
      </div>
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('guarantee-update',[$edit['bg_code']->id]) }}" method="post" enctype="multipart/form-data" >
              @csrf
            <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="bg_type">BG Type</label>
                   <input class="form-control" type="text" value="{{$edit['req']->bg_type_mast->name }}" name="bg_name" placeholder="Enter Bank bg_name" autocomplete="off" readonly>
                   <input type="hidden" value="" name="bg_type" >
                     @error('bg_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="base_amount_taxable_value">BG Code</label>
                   <input class="form-control" type="text" value="{{$edit['bg_code']->bg_code}}" name="bg_code" placeholder="Enter BG code" autocomplete="off" readonly>
                     @error('bg_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    @php 
                    $bank = App\Bank::all();
                    @endphp
                    <label for="bank_code">Bank</label>
                     <input class="form-control" type="text" value="{{$edit['bg_code']->bank->name}}" name="bank" placeholder="Enter Bank" autocomplete="off" readonly>
                     @error('bank_code')
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
                    <label for="bank_branch">Bank Branch</label>
                    <input class="form-control" type="text" value="{{ $edit['bg_code']->bank->branch }}" id="branch"  name="bank_branch" readonly="">
                     @error('bank_branch')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="amended_from_bg_code">BG Amended-1</label>
                      <input type="text" class="form-control" name="amended_from_bg_code"  autocomplete="off" value="{{ $edit['bg_code']->amended_from_bg_code }}" placeholder="Amended BG from Code" readonly="">
                     @error('amended_from_bg_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="amended_by_bg_no">BG Amended-2</label>
                    <input class="form-control" id="amended_by_bg_no" name="amended_by_bg_no" type="text" value="{{ $edit['bg_code']->amended_by_bg_no }}" placeholder="Enter Amended BG By Code" readonly="">
                     @error('amended_by_bg_no')
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
                    <label for="bg_no">Bank BG No.</label>
                    <input class="form-control" id="bg_no" name="bg_no" type="number" aria-describedby="emailHelp" value="{{ $edit['bg_code']->bg_no }}" placeholder="Bg No.."  readonly="">
                     @error('bg_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="bg_date">BG Date</label>
                    <input class="form-control" id="bg_date" name="bg_date" type="text" value="{{ $edit['bg_code']->bg_date }}" aria-describedby="emailHelp" placeholder="choose bg date" readonly="">
                  
                     @error('bg_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                     <div class="form-group">
                    <label for="application_no">Application No. && Date</label>
                    <input class="form-control" id="application_no" type="text" aria-describedby="emailHelp" value="{{ $edit['bg_code']->application_no }}" name="application_no" placeholder="Enter Application No.." readonly="">
                     @error('application_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
              <div class="col-lg-4">
                    <div class="form-group">
                    <label for="application_note">Application Note</label>
                  <textarea class="form-control" name="application_note"  rows="4"  autocomplete="off" placeholder="Enter Application Note  Or Details" readonly="">{{ $edit['bg_code']->application_note }}</textarea>
                     @error('application_note')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="bg_note">BG Note</label>
                   <textarea class="form-control" name="bg_note"  rows="4"  autocomplete="off" placeholder="Enter Bg Notes  Or Details" readonly="">{{ $edit['bg_code']->bg_note }}</textarea>
                     @error('bg_note')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="beneficiary_address">Beneficiary Address</label>
                   <textarea class="form-control" name="beneficiary_address"  rows="4" placeholder="Enter Details" autocomplete="off" readonly>{{ $edit['bg_code']->beneficiary_address }}</textarea>
                     @error('beneficiary_address')
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
                    <label for="job_name">Job_Name/work_Name</label>
                    <input class="form-control" type="text"  value="{{ $edit['req']->workname->job_describe }}" name="job_name" placeholder="Enter Bank Branch" autocomplete="off" readonly>
                     @error('job_name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                 <div class="form-group">
                    <label for="tender_no">Tender No.</label>
                   <input type="text" id="" class="form-control" name="tender_no" value="{{ $edit['req']->workname->tender_no }}" placeholder="Enter Tender No." autocomplete="off" readonly>
                     @error('tender_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="beneficiary_id">Beneficiary Name</label>
                   <input class="form-control" type="text"  value="{{ $edit['req']->benef->name }}" name="beneficiary" placeholder="Enter Bank Branch" autocomplete="off" readonly>
                   <input type="hidden" name="beneficiary_id" value="{{ $edit['req']->beneficiary_id }}">
                     @error('beneficiary_id')
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
                    <label for="bg_value">BG Value</label>
                   <input type="number" id="bg_value" class="form-control" name="bg_value" value="{{ $edit['bg_code']->bg_value }}" placeholder="Enter BG Value" autocomplete="off" readonly="">
                     @error('bg_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="exchange_rate">Exchange Rate of Interest</label>
                   <input type="number"  class="form-control" name="exchange_rate" value="{{ $edit['bg_code']->exchange_rate }}" placeholder="Exchange Rate" autocomplete="off" readonly="">
                     @error('exchange_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="expiry_date">Expiry Date</label>
                   <input type="text" id="expiry_date" class="form-control" name="expiry_date" value="{{ $edit['bg_code']->expiry_date }}" placeholder="choose expiry date" autocomplete="off" readonly="">
                     @error('expiry_date')
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
                    <label for="claim_expiry_date">Claim Expiry Date</label>
                   <input type="text" id="claim_date" class="form-control" name="claim_expiry_date" value="{{ $edit['bg_code']->claim_expiry_date }}" placeholder="Choose Claim Expiry date" autocomplete="off" readonly="">
                     @error('claim_expiry_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
              <div class="form-group">
                    <label for="status">Status</label>
                    @php
                    $bg = App\bg_set_status::all();
                    @endphp
                     <input type="text" id="claim_date" class="form-control" name="claim_expiry_date" value="{{ $edit['bg_code']->bgstatus->name }}" placeholder="Choose Claim Expiry date" autocomplete="off" readonly="">
                     @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              {{--   <div class="col-lg-4">
                      <div class="form-group">
                  @if($edit['bg_code']->file != '')
                  <img src="{{ Illuminate\Support\Facades\Storage::url($edit['bg_code']->file) }}" style="height:80px;width:100px;">
                  @else
                  <img src="{{ Illuminate\Support\Facades\Storage::url('guarantee/download.png') }}" style="height:80px;width:100px;">
                  @endif
                  <input type="hidden" name='old_file' value="{{ $edit['bg_code']->file }}">
                  <input class="form-control" type="file" name="file" value="">
                </div>
                </div> --}}
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
        $("#bank").on('click',function(){
        var id = $(this).val();
          $.ajax({
                 type: "GET",
                 url: "{{ route('get-branch') }}?id="+id,
                 success: function(res){
                 //if(res){
              //console.log(res);
                        $("#branch").empty();
                        $("#branch").val(res);

                      //}
                      //else{
                      //$("#branch").empty();
                      }
                    //}
                      });

            
      });

        })

    </script>
@endsection

