@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div class="row">
          <h1><i class="fa fa-th-list"></i>&nbsp Application (new items)</h1>
            &nbsp&nbsp
          <div><a href="{{ route('request-new-item.create') }}"><button class="btn btn-primary">Add Request</button></a></div>
        </div>
        </div>
        <!--<ul >
          <a href=""><button class="btn btn-info" >back </button></a>
        </ul> -->
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
                      <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                 @php $count = 0; @endphp
                 
                    <tr>
                      <td class="text-center">{{ ++$count }}</td>
                      <td></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center">
                        
                      </td>
                      <td class="text-center">
                       
                      </td>
                      <td class="text-center">
                      
                      </td>
                      <td class="text-center">
                        
                       
                      </td>
                    </tr>

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