@extends('layouts.master')
@section('content')
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Assign Company Edit</h1>
          <p>Assign Company Update</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Assign Company Edit</li>
          <li class="breadcrumb-item"><a href="">Assigned Company List</a></li>
        </ul>
      </div>
       <p><a class="btn btn-primary icon-btn" href="{{  route('assign-client-list') }}">Back</a></p>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="{{ route('update-ac',[$edit->id]) }}" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
          <div class="tilk">
            <h3 class="tile-title">Assign Company</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Company</label>
                  <div class="col-md-8">
                    @php
                    $cmp = App\Company_mast::all();
                    @endphp
                   <select name="comp_id" class="form-control" id="compid">
                    <option value="">choose</option>
                    @foreach($cmp as $states)
                <option value="{{ $states->id }}" {{ $edit->company->id == $states->id ? 'selected' : '' }}>{{ $states->name }}</option>
                @endforeach
                   </select>
                   @error('comp_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                  <div class="form-group row">
                  <label class="control-label col-md-3">Client</label>
                  <div class="col-md-8">
                   <select name="client_id" class="form-control" id="client_id">
                    <option value="{{ $edit->client_id }}">{{ $edit->client->name }}</option>
                   </select>
                     @error('client_id')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
              </form>
          </div>
        </div>
        </div>
      </form>
        </div>
          </div>
        </div>
    </main>
     <script>
      $(document).ready(function(){
       $('#compid').on('change',function(){
        var state_id = $('#compid').val();
        $.ajax({
                url: "{{  route('get-client-id')}}",
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':state_id},
                success: function (data) {
                  console.log(data);
                  $("#client_id").empty();
                    $("#client_id").append('<option value="0">Select Receiver</option>');
                    $.each(data,function(index, recev){
                    $("#client_id").append('<option value='+recev['id']+'>'+recev['name']+'</option>');
              });
                }
            })
       })

      })
      
  </script>
@endsection