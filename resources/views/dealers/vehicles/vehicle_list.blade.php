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
                        <h2 class="card-title">Vehicle List</h2>
                        <div class="table-responsive">
                            @if(isset($records) && $records->count() > 0)
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Vehicle Name</th>
                                        <th>Model Name</th>
                                        <th>Price</th>
                                        <th>Color</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($records as $record)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->model_name }}</td>
                                            <td>{{ $record->price }}</td>
                                            <td>{{ $record->color }}</td>
                                            <td>{{ $record->phone }}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="{{route('dealers.vehicle.view',[$record->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    &nbsp;
                                                    <form method="POST" action="{{route('dealers.vehicle.delete',[$record->id])}}">
                                                        @csrf
                                                        <a class="btn btn-primary" href="{{route('dealers.vehicle.delete',[$record->id])}}" onclick="event.preventDefault();
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
                                        <th>Vehicle Name</th>
                                        <th>Model Name</th>
                                        <th>Price</th>
                                        <th>Color</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            {{__("No Vehicles Found")}}
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection