<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Laxyo - Account(Reconcillation)</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
 
  </head>

  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header style="background-color: #dbf4fd;" class="app-header"><a class="app-header__logo" href="http://laxyo.org" style="background-color: #dbf4fd "><img src="https://laxyo.org/images/logos/logo.png" height="25" ></img></a>

      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <div class="col text-center" style="font-size:20px; padding-top: 12px; color: #404040; font-weight: 500; font-family: lucida console, monospace; " >
    ACCOUNT RECONCILLATION </div>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>
              </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside style="background-color: #dbf4fd;" class="app-sidebar">
      @php $avatar = 'https://hrms.laxyo.org/storage/'.trim(Session::get('avatar'), 'public'); @endphp
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{$avatar}}" alt="User Image" width="100" height="100">
    <div>
      <span style="margin-right: 10px; font-family: bold; font-size: 15px; color: black;">{{ ucwords(auth()->user()->name) }}
      </span>
    </div>
  </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href=""><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        @role('acco_super_admin')
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">ACL</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('userlist') }}"><i class="icon fa fa-circle-o"></i>User</a></li>
            <li><a class="treeview-item" href="{{ route('rolelist') }}" target="" rel="noopener"><i class="icon fa fa-circle-o"></i>Role</a></li>
            <li><a class="treeview-item" href="{{ route('permissionlist') }}"><i class="icon fa fa-circle-o"></i>Permission</a></li>
          </ul>
        </li>
         @endrole
       {{--  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Request Approvals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('fund-list-draft') }}"><i class="icon fa fa-circle-o"></i>Fund Request</a></li>
            <li><a class="treeview-item" href="{{ route('guarantee-approval-list') }}" target="" rel="noopener"><i class="icon fa fa-circle-o"></i>Guarantee Request</a></li>
            <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i></a></li>
          </ul>
        </li> --}}
       

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Reconcilation-Form</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            {{-- @permission('read_pms_task','update_pms_task',' delete_pms_task') --}}
            <li><a class="treeview-item" href="{{ route('saleform') }}"><i class="icon fa fa-circle-o"></i>Bill Form</a></li>
            {{-- @endpermission --}}
            <li><a class="treeview-item" href="{{ route('salelist')}}" target="" rel="noopener"><i class="icon fa fa-circle-o"></i>Bill Details</a></li>
            <li><a class="treeview-item" href="{{ route('purchaseform') }}"><i class="icon fa fa-circle-o"></i>Payable Bill Form</a></li>
            <li><a class="treeview-item" href="{{ route('purchaselist') }}"><i class="icon fa fa-circle-o"></i>Payable Bill Details</a></li>
          </ul>
        </li>
   {{--      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Site Expenses</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('fund-request-list') }}"><i class="icon fa fa-circle-o"></i>Fund Request</a></li>
            <li><a class="treeview-item" href="{{ route('expense-list') }}"><i class="icon fa fa-circle-o"></i> Expenses</a></li>
            <li><a class="treeview-item" href="{{  route('expense-report-list') }}"><i class="icon fa fa-circle-o"></i> Expenses  Reports</a></li>
          </ul>
        </li> --}}
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Bank Guarantee</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            {{-- <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>Bank</a></li> --}}

            <li><a class="treeview-item" href="{{ route('bank-list') }}"><i class="icon fa fa-circle-o"></i> Bank Accounts</a></li>
            <li><a class="treeview-item" href="{{ route('beneficiary-request-list') }}"><i class="icon fa fa-circle-o"></i>BG Request</a></li>
            <li><a class="treeview-item" href="{{ route('guarantee-list') }}"><i class="icon fa fa-circle-o"></i>Guarantee Issued</a></li>
            <li><a class="treeview-item" href="{{ route('benef-list') }}"><i class="icon fa fa-circle-o"></i>Add Beneficiary</a></li>
          </ul>
        
        </li>

         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Client sites</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
               <li><a class="treeview-item" href="{{ route('client-list')}}"><i class="icon fa fa-circle-o"></i>Client Details</a></li>
             <li><a class="treeview-item" href="{{ route('assign-client-list')}}"><i class="icon fa fa-circle-o"></i>Assgin Company</a></li>
              <li><a class="treeview-item" href="{{route('job-list')}}"><i class="icon fa fa-circle-o"></i>Create New Job{{-- {{ Auth::user()->roles->first()->name }} --}}</a></li>
              
              <!--
              <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>Request For Items</a></li>
              -->
          </ul>
        
        </li>

           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Sub contractors Info</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
             {{--   <li><a class="treeview-item" href="{{route('PurchaseClient.index')}}"><i class="icon fa fa-circle-o"></i>Petty contractors</a></li> --}}
             <li><a class="treeview-item" href="{{route('petty-list')}}"><i class="icon fa fa-circle-o"></i>Sub Contractor's List</a></li>
              <li><a class="treeview-item" href="{{ route('PJobMast.index')}}"><i class="icon fa fa-circle-o"></i>Sub Contractor's Job</a></li>
               <li><a class="treeview-item" href="{{route('Passingn.index')}}"><i class="icon fa fa-circle-o"></i>Sub Contractor's Service Account</a></li>
          </ul>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Receiving Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('receiving-request.index')}}"><i class="icon fa fa-circle-o"></i>Application for Items</a></li>
            <li><a class="treeview-item" href="{{route('request-new-item.index')}}"><i class="icon fa fa-circle-o"></i>Application for New Items</a></li>
            <li><a class="treeview-item" href="{{route('receiving.log')}}"><i class="icon fa fa-circle-o"></i>Application Log</a></li>
             
          </ul>
        
        </li>

      {{--   <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Manage sites</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           {{--  @role('acco_super_admin')
            <li><a class="treeview-item" href="{{ route('master-page')}}"><i class="icon fa fa-circle-o"></i>Masters</a></li>
            @endrole --}}
           
         {{--    @role('acco_super_admin')
            <li><a class="treeview-item" href="{{ route('client-list')}}"><i class="icon fa fa-circle-o"></i>Client</a></li>
            @endrole
            <li><a class="treeview-item" href="{{ route('assign-client-list')}}"><i class="icon fa fa-circle-o"></i>Assgin Company</a></li>
            <li><a class="treeview-item" href="{{ route('PJobMast.index')}}"><i class="icon fa fa-circle-o"></i>P-Master</a></li>
            @role('acco_super_admin')
            <li><a class="treeview-item" href="{{route('PurchaseClient.index')}}"><i class="icon fa fa-circle-o"></i>P-Company</a></li>
            @endrole 
           
          </ul>
        </li> --}}
         @role('acco_super_admin')
           <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            {{-- <li><a class="treeview-item" href=""><i class="icon fa fa-circle-o"></i>Bank</a></li> --}}
            
            <li><a class="treeview-item" href="{{  route('Guarantee-type-list') }}"><i class="icon fa fa-circle-o"></i>Type</a></li>
            <li><a class="treeview-item" href="{{ route('bg-status') }}"><i class="icon fa fa-circle-o"></i>BG status List</a></li>
             <li><a class="treeview-item" href="{{ route('company-list') }}"><i class="icon fa fa-circle-o"></i>Company-Master</a></li>
            <li><a class="treeview-item" href="{{ route('tax-list') }}"><i class="icon fa fa-circle-o"></i>Tax Gst</a></li>
            <li><a class="treeview-item" href="{{ route('tds-list') }}"><i class="icon fa fa-circle-o"></i>Tax Tds</a></li>
            <li><a class="treeview-item" href="{{ route('gstin-list') }}"><i class="icon fa fa-circle-o"></i>Gstin</a></li>
            <li><a class="treeview-item" href="{{ route('BGComm.index') }}"><i class="icon fa fa-circle-o"></i>BG Commission (%)</a></li>
             <li><a class="treeview-item" href="{{ route('vendor.index')}}"><i class="icon fa fa-circle-o"></i>Vendor</a></li>
          </ul>
        
        </li>
         @endrole 
      </ul>
    </aside>
<style type="text/css">
  .app-sidebar__toggle {
    color: #404040;
  }

  .app-nav__item {
    color: #404040;
  }

  .app-menu__item {
    color: #404040;
  }
</style>