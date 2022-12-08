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
        <table id="order_list" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Order Status</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($orders as $order )
                @if($order->smart!=null)
                    <tr>
                        <td>{{$no++}}</td>
                        
                            @if($order->smart->type==1)
                            <td>{{$order->smart->service_name}}</td>
                            @elseif($order->smart->type==2)
                            <td>{{$order->smart->part_name}}</td>
                            @elseif($order->smart->type==3)
                            <td>{{$order->smart->vehicle_name}}</td>
                            @endif
                        
                        
                        
                        <td>{{$order->price}}</td>
                        <td>
                            @if($order->order_status==2)
                                <select class="form-control" disabled>
                                    
                                    <option value="2" {{$order->order_status==2?'selected':''}}>Completed</option>
                                    
                                </select>

                            @else
                                <select name="order_status" id="order_status" data-id="{{$order->id}}" class="form-control">
                                    <option value="1" {{$order->order_status==1?'selected':''}}>Pending</option>
                                    <option value="2" {{$order->order_status==2?'selected':''}}>Completed</option>
                                    <option value="3" {{$order->order_status==3?'selected':''}}>Approval</option>
                                </select>
                            @endif
                            
                        </td>
                    </tr>
                    @endif
                @endforeach
                
            </tbody>
        </table>
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#order_list').DataTable();
        });

        $('#order_status').change(function(){
            var value = $(this).val();
            var order_id = $(this).data('id');

            console.log(value,order_id);
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

    </script>
    @endsection