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
                        <h2 class="card-title">Spare Parts List</h2>
                        <div class="table-responsive">
                            @if(isset($records) && $records->count() > 0)
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <thead>
                                    <tr>
                                        <th>Sr#</th>
                                        <th>Vehicle Name</th>
                                        <th>Part Name</th>
                                        <th>Part ID</th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($records as $record)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{ $record->vehicle_name }}</td>
                                            <td>{{ $record->part_name }}</td>
                                            <td>{{ $record->part_id }}</td>
                                            <td>{{ $record->phone }}</td>
                                            <td>{{ $record->price }}</td>
                                            <td>
                                                <div style="display: flex;">
                                                    <a href="{{route('dealers.spare.parts.view',[$record->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    &nbsp;
                                                    <form method="POST" action="{{route('dealers.spare.parts.delete',[$record->id])}}">
                                                        @csrf
                                                        <a class="btn btn-primary" href="{{route('dealers.spare.parts.delete',[$record->id])}}" onclick="event.preventDefault();
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
                                        <th>Part Name</th>
                                        <th>Part ID</th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                    </tr>
                                </tfoot>
                            </table>
                            @else
                            {{__("No Spare Parts Found")}}
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection