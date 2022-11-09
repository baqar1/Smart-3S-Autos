@extends('layouts.dealers')
    @section('content')
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: 2px solid;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
        }
        .l-bg-cherry {
            background: linear-gradient(to right, #01c7b8, #f3e7a4) !important;
            /*background: linear-gradient(to right, #493240, #f09) !important;*/
            color: #fff;
        }
        
        .l-bg-blue-dark {
            background: linear-gradient(to right, #f3e7a4 , #01c7b8) !important;
            color: #fff;
        }
        
        .l-bg-green-dark {
            background: linear-gradient(to right, #0a504a, #38ef7d) !important;
            color: #fff;
        }
        
        .l-bg-orange-dark {
            background: linear-gradient(to right, #a86008, #ffba56) !important;
            color: #fff;
        }
        
        .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fa {
            font-size: 110px;
        }
        
        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: 4px;
            top: 20px;
            opacity: 0.1;
        }
        
        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }
        
        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }
        
        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }
        
        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }
        </style>
        
        
        
        
           
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <h2>Dashboard</h2>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />-->
                    <div class="col-md-12">
                        <div class="row ">
                            <div class="col-xl-3 col-lg-6">
                                <div class="card l-bg-cherry">
                                    <div class="card-statistic-3 p-4">
                                        <div class="card-icon card-icon-large"><i class="fa fa-shopping-cart"></i></div>
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Total Bookings</h5>
                                        </div>
                                        <div class="row align-items-center mb-2 d-flex">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    3,243
                                                </h2>
                                            </div>
                                            <!--<div class="col-4 text-right">-->
                                            <!--    <span>12.5% <i class="fa fa-arrow-up"></i></span>-->
                                            <!--</div>-->
                                        </div>
                                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card l-bg-cherry">
                                    <div class="card-statistic-3 p-4">
                                        <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Users</h5>
                                        </div>
                                        <div class="row align-items-center mb-2 d-flex">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    15,070
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                            <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card l-bg-cherry">
                                    <div class="card-statistic-3 p-4">
                                        <div class="card-icon card-icon-large"><i class="fa fa-ticket"></i></div>
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">No of Employees</h5>
                                        </div>
                                        <div class="row align-items-center mb-2 d-flex">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    578
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <div class="card l-bg-cherry">
                                    <div class="card-statistic-3 p-4">
                                        <div class="card-icon card-icon-large"><i class="fa fa-cubes"></i></div>
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Pending Bookings</h5>
                                        </div>
                                        <div class="row align-items-center mb-2 d-flex">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    Rs.11,610
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="row flex-row-reverse">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fa fa-database"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Admin Commision</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        Rs.30,243
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fa fa-dollar"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Total Earnings </h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                         Rs.1,10,620
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fa fa-thumbs-up"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Completed Orders</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        578
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-blue-dark">
                                        <div class="card-statistic-3 p-4">
                                            <div class="card-icon card-icon-large"><i class="fa fa-star"></i></div>
                                            <div class="mb-4">
                                                <h5 class="card-title mb-0">Over All User Ratings</h5>
                                            </div>
                                            <div class="row align-items-center mb-2 d-flex">
                                                <div class="col-8">
                                                    <h2 class="d-flex align-items-center mb-0">
                                                        4.5
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                                <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
        
        
    @endsection