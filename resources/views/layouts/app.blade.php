<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Smart 3S Autos - DASHBAORD</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="www.sigitechnologies.com">

    <link rel="icon" href="{{asset('assets/images/logo/3S_logo.png')}}" type="image/x-icon">
        <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/charts-c3/plugin.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dropify/css/dropify.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/dist/summernote.css')}}" />
    
    
        <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
    
        <!--toastr-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        /* ===== Scrollbar CSS ===== */
        /* Firefox */
        * {
            scrollbar-width: auto;
            scrollbar-color: #8f54a0 #ffffff;
        }
        /* Chrome, Edge, and Safari */
        *::-webkit-scrollbar {
            width: 16px;
        }
        *::-webkit-scrollbar-track {
            background: #ffffff;
        }
        *::-webkit-scrollbar-thumb {
            background-color: #8f54a0;
            border-radius: 10px;
            border: 3px solid #ffffff;
        }


        .switch {
          position: relative;
          display: inline-block;
          width: 52px;
          height: 24px;
        }
        
        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 16px;
          width: 16px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #01c7b8;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #01c7b8;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
        .error{
            color: red;
        }
    </style>
    @yield('styles')
</head>
<body class="theme-orange">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('assets/images/logo/3S_logo.png')}}" alt="Smart 3S Autos"></div>
        <p>Please wait...</p>
    </div>
</div>

<div id="wrapper">
    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="#"><img src="{{asset('assets/images/logo/3S_logo.png')}}" alt="Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
            </div>

            <div class="navbar-right">
                {{-- <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form> --}}

                <div class="dropdown mt-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="{{route('profile',[ Auth::user()->id])}}">Profile</a>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                        this.closest('form').submit();">Log Out</a>
                        
                        </form>
                    </div>
                  </div>
            </div>
        </div>
    </nav>


    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand text-center">
            <a href="{{route('dashboard')}}"><img src="{{asset('assets/images/logo/3S_logo.png')}}" alt="Smart 3S Dealership Logo" class="img-fluid" width="90"></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="active"><a href="{{route('dashboard')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>

                    <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-users"></i><span>&nbsp; Dealers Management </span></a>
                        <ul @if(\Request::route()->getName() == 'dealers_list' || \Request::route()->getName() == 'add_dealer') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'dealer.list') class="active" @endif><a href="{{route('dealer.list')}}">All Dealers</a></li>
                            <li @if(\Request::route()->getName() == 'dealer.add') class="active" @endif><a href="{{route('dealer.add')}}">Add New Dealers</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-users"></i><span>&nbsp; SpareParts </span></a>
                        <ul @if(\Request::route()->getName() == 'spare.parts.list' || \Request::route()->getName() == 'spare.parts.view') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'spare.parts.list') class="active" @endif><a href="{{route('spare.parts.list')}}">SpareParts List</a></li>
                            <li @if(\Request::route()->getName() == 'spare.parts.view') class="active" @endif><a href="{{route('spare.parts.view')}}">Add New SparePart</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-users"></i><span>&nbsp; Vehicle </span></a>
                        <ul @if(\Request::route()->getName() == 'vehicle.list' || \Request::route()->getName() == 'vehicle.view') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'vehicle.list') class="active" @endif><a href="{{route('vehicle.list')}}">Vehicle List</a></li>
                            <li @if(\Request::route()->getName() == 'vehicle.view') class="active" @endif><a href="{{route('vehicle.view')}}">Add New Vehicle</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-users"></i><span>&nbsp; Service </span></a>
                        <ul @if(\Request::route()->getName() == 'service.list' || \Request::route()->getName() == 'service.view') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'service.list') class="active" @endif><a href="{{route('service.list')}}">Service List</a></li>
                            <li @if(\Request::route()->getName() == 'service.view') class="active" @endif><a href="{{route('service.view')}}">Add New Service</a></li>
                        </ul>
                    </li>
                 
                    {{-- <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-users"></i><span>&nbsp; Users </span></a>
                        <ul @if(\Request::route()->getName() == 'add_user' || \Request::route()->getName() == 'all_user') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'add_user') class="active" @endif><a href="#">Add Users</a></li>
                            <li @if(\Request::route()->getName() == 'users_list') class="active" @endif><a href="#">All Users</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li>
                        <a href="#forms" class="has-arrow mb-1"><i class="fa fa-car"></i><span>Dealer Management</span></a>
                        <ul @if(\Request::route()->getName() == 'adds_driver' || \Request::route()->getName() == 'all_drivers' || \Request::route()->getName() == 'driver_pendingrequests') class="collapse in" aria-expanded="true" @endif>
                            <li @if(\Request::route()->getName() == 'adds_driver') class="active" @endif><a href="{{route('adds_driver')}}">Adds Dealer</a></li>
                        <li @if(\Request::route()->getName() == 'driver_pendingrequests') class="active" @endif><a href="{{route('driver_pendingrequests')}}">Pending Requests</a></li>
                        </ul>
                    </li> --}}
                   
                    {{-- <li @if(\Request::route()->getName() == 'autocustomer_invoices') class="active" @endif> <a href="#"><i class="fa fa-money"></i><span>charges Management</span></a></li>
                    <li @if(\Request::route()->getName() == 'autocustomer_invoices') class="active" @endif><a href="#"><i class="fa fa-file-text"></i><span>Auto/Customer Invoices</span></a></li>
                    <li @if(\Request::route()->getName() == 'referral_code') class="active" @endif><a href="#"><i class="fa fa-tags"></i><span>Add Promo Code</span></a></li>
                    <li @if(\Request::route()->getName() == 'all_referralcode') class="active" @endif><a href="#"><i class="fa fa-ticket"></i><span>All Promo Code</span></a></li>
                    <li @if(\Request::route()->getName() == 'customer_notifications') class="active" @endif><a href="#"><i class="fa fa-bell-o"></i><span>Push Notifications</span></a></li>
                    <li @if(\Request::route()->getName() == 'customer_notifications') class="active" @endif><a href="#"><i class="fa fa-bell"></i><span>Customer Notications</span></a></li>
                    <li @if(\Request::route()->getName() == 'driver_notifications') class="active" @endif ><a href="#"><i class="fa fa-asterisk"></i><span>Driver Notifications </span></a></li>
                    <li @if(\Request::route()->getName() == 'retailer_notifications') class="active" @endif><a href="#"><i class="fa fa-bell"></i><span>Retailer Notification</span></a></li>
                    <li @if(\Request::route()->getName() == 'settings') class="active" @endif><a href="#"><i class="fa fa-wrench"></i><span> Website Settings</span></a></li>
                    <li @if(\Request::route()->getName() == 'front_end_settings') class="active" @endif><a href="#"><i class="fa fa-cog"></i><span>Front End Settings</span></a></li> --}}
                </ul>
            </nav>
        </div>
    </div>
    <div id="main-content">
        <div class="block-header">
            @yield('content')
        </div>
    </div>

</div>


<script>
    
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{!! session('error') !!}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"positionClass": "toast-bottom-full-width"
  }
  		toastr.info("{{ session('info') }}");
  @endif
  
  @if (Session::has('success'))
        toastr.options.positionClass = 'toast-top-right';
        toastr.success("{{ Session::get('success') }}");
  @endif
  
  
  @if (Session::has('alert'))
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.alert("{{ Session::get('alert') }}");
  @endif


  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true,
  	"positionClass": "toast-bottom-right"
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
 
</script>
@yield('scripts')


<!-- Javascript -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/index.js')}}"></script>


<!--Table/Data Table JS-->
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>


<!--Image Uplaod And View JS -->
<script src="{{asset('assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>

<!--Multi Select JS -->
<script src="{{asset('assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script><!-- Multi Select Plugin Js -->
<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

<!--Summer Notes JS -->
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/summernote/dist/summernote.js')}}"></script>

<script>
    

//     $(function () {
//     // Summernote
//     $('.textarea').summernote()
//   })
  </script>

  
 

</body>
</html>
