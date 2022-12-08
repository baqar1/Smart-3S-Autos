<table id="order_list" class="table table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>Product Name</th>
            <th>Dealer Name</th>
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
                <td>{{$order->dealer->name}}</td>
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