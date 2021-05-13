@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Job/Work Update</h1>
          <p>Job/Work Name</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Job/Work Edit</li>
          <li class="breadcrumb-item"><a href="{{route('job-list')}}">Job/Work List</a></li>
        </ul>
      </div>
      
        <div class="col-md-12">
          <div class="tile">
            <form action="" method="post">
              @csrf
            <div class="row">
              <div class="col-lg-4">
                 <div class="form-group">
                    <label for="job_describe">Job/Work Name</label>
                    <input class="form-control" id="job_describe" name="job_describe" type="text" value="{{ $edit->job_describe }}" placeholder="Enter Job/Work Name" readonly="">
                     @error('job_describe')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">Client</label>
                     <input class="form-control" id="client_id" value="{{ 
                      $edit->client->name }}" name="client_id" type="text" placeholder="Enter tender no"  readonly="">
                     @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="gsstin_uin_of_recipient">Client Gstin</label>
                    <input class="form-control" id="gsstin_uin_of_recipient" name="gsstin_uin_of_recipient" value="{{ $edit->client->gstin }}" type="text" aria-describedby="emailHelp" placeholder="Enter GSTIN"  readonly="" >
                     @error('gsstin_uin_of_recipient')
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
                    <label for="comp_id">Our Company</label>
                    <input class="form-control" id="comp_id" value="{{ 
                      $edit->company->name }}" name="comp_id" type="text" placeholder="Enter tender no" readonly="">
                     @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e_commerece_gstin">State Gstin</label>
                      <input class="form-control" id="tender_no" value="{{ 
                      $edit->gstin->gstin }}" name="e_commerece_gstin" type="text" placeholder="Enter tender no" readonly="">
                     @error('e_commerece_gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="e_commerece_gstin">Category</label>
                      <input class="form-control" id="tender_no" value="{{ $edit->job_cat_id == '' ?  '' : $edit->job_cat->name }}" name="e_commerece_gstin" type="text" placeholder="Enter Category" readonly="">
                     @error('e_commerece_gstin')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
                 <h4>Tendor Details</h4>
              <div class="row">
             <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tender_no">Tender No.</label>
                    <input class="form-control" id="tender_no" value="{{ $edit->tender_no }}" name="tender_no" type="text" placeholder="Enter tender no" readonly>
                     @error('tender_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tender_value">Tendor Value</label>
                   <input class="form-control" id="tender_value" value="{{ $edit->tender_value }}" name="tender_value" type="number" placeholder="Enter tender Value" readonly>
                     @error('tender_value')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="tender_rate">Tendor Rate(%)</label>
                    <input class="form-control" id="tender_rate" value="{{ $edit->tender_rate }}" name="tender_rate" type="number" placeholder="Enter tender Rate" readonly>
                     @error('tender_rate')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div> 
              <h4>Work Order Details</h4>
              <div class="row">
             <div class="col-lg-6">
                   <div class="form-group">
                    <label for="work_order_no">Work Order No.</label>
                    <input class="form-control" id="work_order_no" value="{{ $edit->work_order_no }}" name="work_order_no" type="text" placeholder="Enter Work Order" readonly>
                     @error('work_order_no')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="work_value">Work Order Value</label>
                   <input class="form-control" id="work_value" value="{{ $edit->work_value }}" name="work_value" type="number" placeholder="Enter Work value" readonly>
                     @error('work_value')
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
                    <label for="work_s_data">Work Start Date</label>
                    <input class="form-control jobdate" id="cheque_date2" value="{{ $edit->work_s_data }}" name="work_s_data" type="text" placeholder="Choose Work start Date" readonly>
                     @error('work_s_data')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="Work_end_date">Work End Date</label>
                   <input class="form-control jobdate" id="Work_end_date" value="{{ $edit->Work_end_date }}" name="Work_end_date" type="text" placeholder="Choose Work End Date" readonly>
                     @error('Work_end_date')
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
                    <label for="tax_gst">Set Tax-Gst</label>
                     <input class="form-control" id="tender_no" value="{{ 
                      $edit->gst->tax_gst }}" name="tax_gst" type="text" placeholder="Enter tender no" readonly="">
                     @error('tax_gst')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="tax_tds">Set Tax-Tds</label>
                    <input class="form-control" id="tax_tds" value="{{ 
                      $edit->tds->tds_tax }}" name="tax_tds" type="text" placeholder="Enter tender no" readonly="">
                     @error('tax_tds')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                   <div class="form-group">
                    <label for="sd_percentage">set Sd %</label>
                    <input class="form-control" id="sd_percentage" type="text" aria-describedby="emailHelp" name="sd_percentage" value="{{ $edit->sd_percentage }}" placeholder="Enter invoice type" readonly="">
                     @error('sd_percentage')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div><div class="row">
              <div class="col-lg-6">
                   <div class="form-group">
                    <label for="place_of_supply">PLace of Supply</label>
                     <textarea class="form-control" id="place_of_supply"   name="place_of_supply" rows="3" readonly="">{{ $edit->place_of_supply }}</textarea>
                      @error('place_of_supply')
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="location">Note</label>
                     <textarea class="form-control" id="location"   name="location" rows="3" readonly="">{{ $edit->location }}</textarea>
                      @error('location')
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
@endsection

