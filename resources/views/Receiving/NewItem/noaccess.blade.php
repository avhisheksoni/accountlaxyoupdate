@extends('layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>No Acess Page</h1>
          <p>All Record till Now</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">No Acess Page</li>
          <li class="breadcrumb-item active"><a href="">No Acess Page</a></li>
        </ul>
      </div>
      <div class="row">
      </div>
         <center class="mt-5"><h5 style="font-size: 70px; color: crimson;">Hii..{{ Auth()->user()->name  }}</h5></center><br>
          <center class="mt-5"><h5 >You Dont have this Page Access</h5></center>

        </div>
      </div>
    </main>

@endsection