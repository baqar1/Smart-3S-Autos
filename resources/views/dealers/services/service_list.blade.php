@extends('layouts.dealers')
    @section('content')
    <div class="page-content">
        <div class="main-wrapper">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-5">
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="float-lg-end">
                                </div>
                            </div>
                        </div>
                        <h2 class="card-title">Service List</h2>
                        <div class="table-responsive">
                            @if(isset($records) && $records->count() > 0)
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Service Name</th>
                                        <th>Service Charges</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Service Date</th>
                                        <th>Service Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($records as $record)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{ $record->service_name }}</td>
                                            <td>{{ $record->service_charges }}</td>
                                            <td>{{ $record->vehicle_type }}</td>
                                            <td>{{ $record->vehicle_number }}</td>
                                            <td>{{ $record->service_date }}</td>
                                            <td>{{ $record->service_time }}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="{{route('dealers.service.view',[$record->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    &nbsp;
                                                    <form method="POST" action="{{route('dealers.service.delete',[$record->id])}}">
                                                        @csrf
                                                        <a class="btn btn-primary" href="{{route('dealers.service.delete',[$record->id])}}" onclick="event.preventDefault();
                                                        this.closest('form').submit();"><i class="fa fa-trash"></i></a>
                                                        
                                                        </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Service Name</th>
                                        <th>Service Charges</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Service Date</th>
                                        <th>Service Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            {{__("No Services Found")}}
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection