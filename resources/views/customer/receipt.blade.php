<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">
    body {
    margin-top: 20px;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <table>
                        <tr>
                            <td>Name</td><td>:</td><td><strong>{{ $order->user->name }}</strong></td></tr>
                            <tr><td>Address</td><td>:</td><td>{{ $order->user->address }}</td></tr>
                            <tr><td>Phone</td><td>:</td><td>{{ $order->user->phone_number }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Order ID: {{ $order->id }}</em>
                    </p>
                    <p>
                        <em>Date: {{ $order->date }}</em>
                    </p>
                    <p>
                        <em>Time: {{ $order->time }}</em>
                    </p>
                    
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>INVOICE</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Flavour</th>
                            <th></th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->order_details as $order_detail)
                            <tr>
                                <td class="col-md-9"><em>{{ $order_detail->item->flavour }}</em></h4></td>
                                <td class="col-md-1" style="text-align: center">  </td>
                                <td class="col-md-1 text-center">{{ $order_detail->quantity }}</td>
                                <td class="col-md-1 text-center">{{ $order_detail->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>{{ $order->order_details->sum('price') }}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-lg btn-block" onClick="window.print()">
                    Print Receipt   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div>