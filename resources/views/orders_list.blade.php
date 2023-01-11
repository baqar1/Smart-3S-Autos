@extends('layouts.app')
    @section('content')
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-success">
            {{ session()->get('error') }}
        </div>
        @endif

        <h1>All Orders</h1>
        <div class="row mb-4">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4>Filter Order Status</h4>
                <select class="form-control" name="filter_status" id="filter_status">
                    <option value="">All</option>
                    <option value="1">Pending</option>
                    <option value="2">Completed</option>
                    <option value="3">Approval</option>
                </select>
            </div>
           
            <div class="col-md-4"></div>
        </div>
        <div id="table_render">
            @include('layouts.partial')
        </div>
        
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#order_list').DataTable();
        });

        $('.order_status').change(function(){
            var value = $(this).val();
            var order_id = $(this).data('id');

            $.ajax({
                url: "{{route('order.status')}}",
                data: {value:value,order_id:order_id},
                success:function(response){
                    if(response.flag=='1'){
                        toastr.success(response.message);
                    }
                    else if(response.flag=='2'){
                        toastr.success(response.message);
                        $('#order_status').prop('disabled', 'disabled');

                    }
                    else{
                        toastr.danger('Something went wrong');
                    }
                }
            });
        });

        //onchange filter status
        $(document).on('change','#filter_status',function(){
            var value = $(this).val();
            $.ajax({
                url: "{{route('orders.filter')}}",
                data: {value:value},
                success:function(response){
                    if(response.status==true){
                        toastr.success(response.message);
                        $('#table_render').html(response.orders);
                    }
                    
                }
            });
        });

    </script>
    @endsection