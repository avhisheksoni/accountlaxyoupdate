@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>&nbsp Application (new items) History</h1>
            &nbsp&nbsp
          <!-- <div><a href="{{ route('request-new-item.create') }}"><button class="btn btn-sm btn-primary">+ Request</button></a></div> -->
        </div>
        <ul >
        <a href="{{ route('request-new-item.index') }}"><button class="btn btn-sm btn-info" > Back </button></a>
      </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
           @if($message = Session::get('message'))
      <div class="alert alert-success">  {{$message}}
      </div>
      @endif
          <div class="tile">

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-bordered thead-dark" id="sampleTable">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">FROM</th>
                      <th class="text-center">TO</th>
                      <th class="text-center">DATE</th>
                      <th class="text-center">MANAGER</th>
                      <th class="text-center">ADMIN</th>
                      <th class="text-center">SUP-ADMIN</th>
                      <th class="text-center">VIEW</th>
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 @php $count = 0; @endphp
                  @foreach($applications as $application)
                    <tr>
                      <td class="text-center">{{ ++$count }}</td>
                      <td class="text-center">{{ $application['site']->job_describe }}</td>
                      <td class="text-center">{{ $application['warehouse']->name }}</td>
                      <td class="text-center">{{ $application->date }}</td>
                      <td class="text-center">
                        <b>PENDING</b>
                      </td>
                      <td class="text-center">
                       <b>PENDING</b>
                      </td>
                      <td class="text-center">
                      <b>PENDING</b>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('request-new-item.show', $application->id ) }}"><button class="btn btn-sm btn-primary " id="requestShow" data-toggle="modal" data-target="#reqModal"><i class="fa fa-lg fa-eye"></i></button></a>
                      </td>
                      <td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
               
              </div>
            </div>
          </div>
        </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection