<title>My Order</title>
<link rel="icon" href="logo.png">

@extends('layouts.CustomerNavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: khaki">
                    <h3 align="center"><strong>My Order</strong></h3>
{{--                     <span style="float: right">
                        <a href="/supervisor/register/volunteer" class="btn btn-primary text-right">Add</a>
                    </span> --}}
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover" id="delete_terminal" border="6">
                        <thead class="thead-dark">
                            <hr style="margin-bottom: 0px; margin-top: 0px">
                            <tr style="opacity: 0.5; text-transform: uppercase; background-color: #F5F5F5">
                                <th>Date</th>
                                <th>Time</th>
                                <th>Address</th>
                                <th>Flavour</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            @foreach($custOrders as $custOrder)
                                <tr>
                                    <td>{{ $custOrder->order->date }}</td>
                                    <td>{{ $custOrder->order->time }}</td>
                                    <td>{{ $custOrder->order->address }}</td>
                                    <td>{{ $custOrder->item->flavour }}</td>
                                    <td>{{ $custOrder->quantity }}</td>
                                    <td>{{ $custOrder->order->status }}</td>
                                    <td><a href="/invoice/{{$custOrder->order->id}}"><button class="btn btn-warning">Receipt</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
