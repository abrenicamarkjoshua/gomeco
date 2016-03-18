@extends('layout.main')
@section('content')
<div style = "width:900px;margin:auto;margin-bottom:100px;">
<h1>Order details</h1>

    
    <fieldset>
        <legend>Order Summary ({{$totalquantity}} item{{($totalquantity > 1) ? 's':''}})</legend>
        <table  class="pure-table" style = "margin-bottom:15px;">
        <thead>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            
        </thead>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->productName}}</td>
                <td>{{$order->quantity}}</td>
                <td>₱{{$order->amount}}</td>
            </tr>
        @endforeach
        </table>
        <div class="pure-control-group">
            <label for="name">Total:</label>
           
            <b>₱{{formatMoney($total, true)}}</b>
        </div>
        <div class="pure-control-group">

            @if($purchaseOrder->status == "pending" || $purchaseOrder->status == "on-delivery-process")
                Deadline: <b style = "color:{{$deadlineColor}}">{!! $purchaseOrder->deadline !!}</b><br>
            @endif
                Status: {!! $purchaseOrder->status !!}
            @if($purchaseOrder->status == "pending")
                <form action = '' method = 'post'>
                    {!! csrf_field() !!}
                    <input type = 'submit' name = 'btnCancelOrder' value = 'cancel order'/>
                    
                </form>
            @endif
        </div>
        
    </fieldset>
</div>
@stop