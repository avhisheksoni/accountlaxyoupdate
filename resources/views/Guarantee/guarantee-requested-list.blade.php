@extends('layouts.master')
@section('content')



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Guarantee Request  List</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Guarantee</li>
          <li class="breadcrumb-item active"><a href="{{ route('purchaseform') }}">Guarantee-From</a></li>
        </ul>
      </div>
      {{-- <p><a class="btn btn-primary icon-btn" href="{{ route('fund-request') }}"><i class="fa fa-plus"></i>Add Fund Request</a></p> --}}
      <div class="row">
        <div class="col-md-12">
        	 @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif 
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      {{-- <th>S.no.</th> --}}
                      <th>Code</th>
                      <th>Beneficiary</th>
                      <th>Beneficiary-Type</th>
                      <th>BG</th>
                      <th>BG Date</th>
                      <th>Job</th>
                      <th>Value</th>
                      <th>Expiry Date</th>
                      <th>Claim Expiry Date</th>
                      <th>Bank</th>
                      <th>status</th>
                      <th>view</th>
                      <th>Click To Approve</th>
                    </tr>
                  </thead>
                  <tbody>
                  	
                 <?php $s_no=1 ?>
                    @foreach( $gurt as $perm)
                    <tr>
                      {{-- <td>{{ $s_no }}</td> --}}
                      <td>{{ $perm->bg_code }}</td>
                      @if($perm->beneficiary_id != "")
                      <td>{{ App\Beneficiary::find($perm->beneficiary_id)->name }}</td>
                      @else
                       <td>{{ $perm->beneficiary_id }}</td>
                       @endif
                        @if($perm->bg_type != "")
                      <td>{{ App\bg_type_mast::find($perm->bg_type)->name }}</td>
                        @else
                       <td>{{ $perm->bg_type }}</td>
                       @endif
                      <td>{{ $perm->bg_no }}</td>
                      <td>{{ $perm->bg_date }}</td>
                       @if($perm->job_code != "")
                      <td>{{ App\job_master::find($perm->job_code)->job_describe }}</td>
                      @else
                       <td>{{ $perm->job_code }}</td>
                       @endif
                      <td>{{ $perm->bg_value }}</td>
                      <td>{{ $perm->expiry_date }}</td>
                      <td>{{ $perm->claim_expiry_date }}</td>
                       @if($perm->bank_code != "")
                      <td>{{ App\Bank::find($perm->bank_code)->name }}</td>
                       @else
                       <td>{{ $perm->bank_code }}</td>
                       @endif
                       <td>{{ $perm->status }}</td>
                      <td><a href="{{ route('guarantee-details',[$perm->id]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-eye"></i></button></a></td>
                      @if($perm->status == 'Draft')
                      <td><a href="{{ route('guarantee-request-edit',[$perm->bg_code]) }}"><button class="btn btn-primary"><i class="fa fa-lg fa-edit"></i></button></a>
                        <a href="{{ route('guarantee-request-delete',[$perm->id])}}"><button class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                      </td>
                      @elseif($perm->status == 'Requested')
                       <td > <a href="{{ route('guarantee-sa-approve',[$perm->id])}}"><button class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button></a>
                      </td>
                      @elseif($perm->status == 'Approved-level-1')
                       <td >{{ $perm->status }}</td>
                      @endif
                    </tr>
                    <?php $s_no++ ?>
                    @endforeach
                  </tbody>
                </table>
                {{ $gurt->links() }}
              </div>
            </div>
          </div>
             <div class="tile-footer">
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal">ADD New Request</button>
            </div>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Guarantee Request</h4>
        </div>
        <div class="modal-body">
          <p>Add Guarantee Request</p>
           <div class="tile-body">
              <form action="{{ route('guarantee-add') }}" method="post">
                  @csrf
                  <div class="form-group row">
                  <label class="control-label col-md-3">BG-Type</label>
                  <div class="col-md-8">
                   <select class="form-control" type="text" name="bg_type" placeholder="Enter user name">
                      @foreach($bg_type as $bg)
                      <option value="{{ $bg->id }}">{{ $bg->name }}</option>
                      @endforeach
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">job</label>
                  <div class="col-md-8">
                    <select class="form-control" type="text" name="job_code" placeholder="Enter user name">
                      @foreach($job as $jobs)
                      <option value="{{ $jobs->id }}">{{ $jobs->job_describe }}</option>
                      @endforeach
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Beneficiary</label>
                  <div class="col-md-8">
                   <select class="form-control" type="text" name="beneficiary_id" placeholder="Enter user name">
                      @foreach($beneficiary as $jobs)
                      <option value="{{ $jobs->id }}">{{ $jobs->name }}</option>
                      @endforeach
                    </select>
                     @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Add Details">
        </div>
              </form>
            </div>
        </div>
        
      </div>
      
    </div>
  </div>
    </main>

@endsection