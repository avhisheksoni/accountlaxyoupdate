@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Guarantee Request Edit</h1>
          <p>Guarantee Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Guarantee Form</li>
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
                  <div class="col-lg-4">
                   <div class="form-group">
                    <label for="job_name">Job_Name/work_Name</label>
                    <input class="form-control" type="text"  value="{{ old('job_name') ?? $edit['req']->workname->job_describe != '' ? $edit['req']->workname->job_describe : '' }}" name="job_name" placeholder="Enter Bank Branch" autocomplete="off" readonly>
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
              </div>
              <div class="row">
                  <div class="col-lg-4">
                  <div class="form-group">
                    <label for="bg_type">BG Type</label>
                   <input class="form-control" type="text" value="{{$edit['req']->bg_type_mast->name }}" name="bg_name" placeholder="Enter Bank bg_name" autocomplete="off" readonly>
                   <input type="hidden" value="" name="" >
                     @error('bg_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                    <label for="bg_no">Bank BG No.</label>
                    <input class="form-control" id="bg_no" name="bg_no" type="number" aria-describedby="emailHelp" value="{{ old('bg_no') ?? ($edit['bg_code']->bg_no != '' ? $edit['bg_code']->bg_no : '' ) }}" placeholder="Bg No.."  >
                     @error('bg_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="bg_value">BG Value</label>
                   <input type="number" id="bg_value" class="form-control" name="bg_value" value="{{ old('bg_value') ?? ($edit['bg_code']->bg_value != '' ? $edit['bg_code']->bg_value : '') }}" placeholder="Enter BG Value" autocomplete="off" >
                     @error('bg_value')
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
                    @php 
                    $bank = App\Bank::all();
                    @endphp
                    <label for="bank_code">Bank</label>
                    <select name="bank_code" class="form-control" id="bank">
                    <option value="">choose</option>
                   @foreach($bank as $ven)
                   <option @if($ven->id == $edit['bg_code']->bank_code || old('bank_code') == $ven->id ) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                  </select>
                     @error('bank_code')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="bank_branch">Bank Branch</label>
                    <input class="form-control" type="text" value="{{ old('bank_branch') ??  ($edit['bg_code'] !='' ? $edit['bg_code']->bank_branch : '')}}" id="branch"  name="bank_branch" >
                     @error('bank_branch')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                     <div class="form-group">
                    <label for="application_no">Application No.</label>
                    <input class="form-control" id="application_no" type="text" aria-describedby="emailHelp" value="{{ old('application_no') ?? ($edit['bg_code']->application_no != '' ? $edit['bg_code']->application_no : '' ) }}" name="application_no" placeholder="Enter Application No.." >
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
                    <label for="bg_date">BG Issue Date</label>
                    <input class="form-control" id="bg_date" name="bg_date" type="text" value="{{ old('bg_date') ?? ($edit['bg_code']->bg_date != '' ? $edit['bg_code']->bg_date  : '') }}" aria-describedby="emailHelp" placeholder="choose bg date" >
                  
                     @error('bg_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="expiry_date">BG Expiry Date</label>
                   <input type="text" id="expiry_date" class="form-control" name="expiry_date" value="{{ old('expiry_date') ?? ($edit['bg_code']->expiry_date != '' ? $edit['bg_code']->expiry_date : '') }}" placeholder="choose expiry date" autocomplete="off" >
                     @error('expiry_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="claim_expiry_date">BG Claim Expiry Date</label>
                   <input type="text" id="claim_date" class="form-control" name="claim_expiry_date" value="{{ old('claim_expiry_date') ?? ($edit['bg_code']->claim_expiry_date != '' ? $edit['bg_code']->claim_expiry_date : '' ) }}" placeholder="Choose Claim Expiry date" autocomplete="off" >
                     @error('claim_expiry_date')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="expiry_date">Margin Rate(%)</label>
                    @php 
                    $mr = App\margine_rate::all();
                    @endphp
                     <select name="margrin_percentage" class="form-control">
                      <option value="0">choose</option>
                     @foreach($mr as $ven)
                   <option @if($ven->id == $edit['bg_code']->margrin_percentage) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->rate }}</option>
                    @endforeach
                     </select>
                     @error('margrin_percentage')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="claim_expiry_date">Margin Amount</label>
                   <input type="number" id="claim_date" class="form-control" name="margin_amount" value="{{ old('margin_amount') ?? ($edit['bg_code']->margin_amount != '' ? $edit['bg_code']->margin_amount : '' ) }}" placeholder="Enter Margin Amount" autocomplete="off" >
                     @error('margin_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                    <label for="bg_commission">BG Commission Rate(%)</label>
                    @php 
                    $bcr = App\bg_comm_mast::all();
                    @endphp
                     <select name="bg_commission" class="form-control">
                      <option value="0">choose</option>
                     @foreach($bcr as $ven)
                   <option @if($ven->id == $edit['bg_code']->bg_commission) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->bg_comm_per }}</option>
                    @endforeach
                     </select>
                     @error('bg_commission')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="bg_commission_amount">BG Commission Amount</label>
                   <input type="number" id="claim_date" class="form-control" name="bg_commission_amount" value="{{ old('bg_commission_amount') ?? ($edit['bg_code']->bg_commission_amount != '' ? $edit['bg_code']->bg_commission_amount : '' ) }}" placeholder="Enter BG Commission Amount" autocomplete="off" >
                     @error('bg_commission_amount')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>

              </div>
               <div class="row">
                 <div class="col-lg-3">
                    <div class="form-group">
                    <label for="amended_from_bg_code">BG Amended-1</label>
                      <input type="text" class="form-control cheque_date2" name="bg_date1"  autocomplete="off" value="{{ old('bg_date1') ?? ($edit['bg_code']->bg_date1 != '' ? $edit['bg_code']->bg_date1 : '' ) }}" placeholder="Amended BG Date 1" >
                     @error('bg_date1')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="col-lg-3">
                   <div class="form-group">
                    <label for="amended_by_bg_no">BG Amended-2</label>
                    <input class="form-control cheque_date2" id="amended_by_bg_no" name="bg_date2" type="text" value="{{ old('bg_date2') ?? ($edit['bg_code']->bg_date2 != '' ? $edit['bg_code']->bg_date2 : '' ) }}" placeholder="Enter Amended Date 2" autocomplete="off">
                     @error('bg_date2')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-3">
                   <div class="form-group">
                    <label for="amended_by_bg_no">BG Amended-3</label>
                    <input class="form-control cheque_date2"  name="bg_date3" type="text" value="{{ old('bg_date3') ?? ($edit['bg_code']->bg_date3 != '' ? $edit['bg_code']->bg_date3 : '' ) }}" placeholder="Enter Amended Date 3" autocomplete="off">
                     @error('amended_by_bg_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-3">
                   <div class="form-group">
                    <label for="amended_by_bg_no">BG Amended-4</label>
                    <input class="form-control cheque_date2"  name="bg_date4" type="text" value="{{ old('bg_date4') ?? ($edit['bg_code']->bg_date4 != '' ? $edit['bg_code']->bg_date4 : '' ) }}" placeholder="Enter Amended Date 4" autocomplete="off">
                     @error('amended_by_bg_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
               <div class="row">
                 <div class="col-lg-3">
                  <div class="form-group">
                    <label for="bg_type">Company</label>
                   <input class="form-control" type="text" value="{{$edit['bg_code']->company->name }}" name="bg_name" placeholder="Enter Bank bg_name" autocomplete="off" readonly>
                   <input type="hidden" value="" name="" >
                     @error('bg_type')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-3">
              <div class="form-group">
                    <label for="status">Status</label>
                    @php
                    $bg = App\bg_set_status::all();
                    @endphp
                    <select name="status" class="form-control">
                     <option value="">select</option>
                      @foreach($bg as $ven)
                   <option @if($ven->id == $edit['bg_code']->status) selected  @endif value="{{ $ven->id }}"
                >{{ $ven->name }}</option>
                    @endforeach
                     </select> 
                     @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="col-lg-6">
                   <div class="form-group">
                    <label for="bg_note">BG Note</label>
                   <textarea class="form-control" name="bg_note"  rows="4"  autocomplete="off" placeholder="Enter Bg Notes  Or Details" >{{ old('bg_note') ?? ($edit['bg_code']->bg_note != '' ? $edit['bg_code']->bg_note : '') }}</textarea>
                     @error('bg_note')
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
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Update</button>
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

