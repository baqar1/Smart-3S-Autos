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
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="select_status" data-id="{{$dealer->id}}" value="1" {{($dealer->status =='1')?'checked':''}}>
                                <span class="slider round"></span>
                              </label>
                        </td>
                        <td>
                            <a href="{{route('dealer.edit',[$dealer->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function () {
            $('#dealer_list').DataTable();
        });

        $('.select_status').click(function(){
            var value = $(this).is(':checked');
            var dealer_id = $(this).data('id');
            $.ajax({
                url: "{{route('dealer.status')}}",
                data: {value:value,dealer_id:dealer_id},
                success:function(response){
                    if(response.result=='1'){
                        toastr.success(response.success);
                    }
                    else if(response.result=='0'){
                        toastr.info(response.info);

                    }
                    else{
                        toastr.danger('Something went wrong');
                    }
                }
            });
        });

    </script>
    @endsection