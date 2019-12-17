@extends('layouts.OwnerNavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-16">
            <div class="card">
                <div class="card-header">
                    {{-- <strong >A.O Soft Ice Cream Order</strong> --}}
                    <h4 align="center"><b>Customer Order</b></h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET">
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right"><b>{{ __('ORDER ID') }}</b></label>

                            <div class="col-md-2">
                                <input id="address" type="text" class="form-control" name="id" value="{{ Request::input('id') }}"  autocomplete="off" required style="background:#FAF6D9;" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            
                            </div>
                        <button class="btn btn-primary btn-sm" type="submit" >Search</button></div>
                    </form>

                    <table class="table table-striped" id="delete_terminal" border="3">

                        
                        <thead>
                            <hr style="margin-bottom: 0px; margin-top: 0px">
                            <tr style="opacity: 0.5; text-transform: uppercase; background-color: #F5F5F5">
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Phone Number</th>
                                <th style="text-align: center">Date</th>
                                <th style="text-align: center">Time</th>
                                <th style="text-align: center">Address</th>
                                <th style="text-align: center">Flavour</th>
                                <th style="text-align: center">Quantity</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center" style="columns:300px">Action</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            @foreach($order_details as $order_detail)
                                <tr>
                                    <td>{{ $order_detail->order->user->name }}</td>
                                    <td>{{ $order_detail->order->user->phone_number }}</td>
                                    <td>{{ $order_detail->order->date }}</td>
                                    <td>{{ $order_detail->order->time }}</td>
                                    <td>{{ $order_detail->order->address }}</td>
                                    <td>{{ $order_detail->item->flavour }}</td>
                                    <td>{{ $order_detail->quantity }}</td>
                                    <td>{{ $order_detail->order->status }}</td>
                                    <td style="text-align: center; columns:300px ">
                                        <form method=POST action="/owner/updateStatus2/{{ $order_detail->order->id }}">
                                            {{csrf_field()}}
                                            <button class="btn btn-success" name="status" value="Approved">Approve</button>
                                            <button class="btn btn-danger" name ="status" value="Reject">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$order_details->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    function refreshPage(){
    window.location.reload();
} 
</script>
@endpush