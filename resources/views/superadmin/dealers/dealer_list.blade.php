@extends('layouts.app')
    @section('content')
        <h1>Dealers list</h1>
        <table id="dealer_list" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($dealers as $dealer )
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dealer->name}}</td>
                        <td>{{$dealer->email}}</td>
                        <td>active</td>
                        <td>View Edit</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    @endsection
    @section('scripts')
    $(document).ready(function () {
        $('#dealer_list').DataTable();
    });
    @endsection