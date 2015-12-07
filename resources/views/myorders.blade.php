@extends('layout.main')
@section('content')
	<div style = "width:900px;margin:auto;margin-bottom:100px;">
<form class="pure-form pure-form-aligned" enctype="multipart/form-data" style = "margin-top:30px" action = '' method = 'post'>
	{!! csrf_field() !!}
	
    <fieldset>
        @if (session('affirm'))
            <b style = "color:green;font-size:25px">{{session('affirm')}}</b>
            
        @endif
            
        <legend>My orders</legend>
        <table  class="pure-table">
        <thead>
            <th>Order number</th>
            <th>Date ordered</th>
            <th>Deadline</th>
           
            <th>Status</th>
            <th>Action</th>
        </thead>
@foreach($purchaseorders as $purchaseorder)
<?php
$deadlineColor = "";
if($purchaseorder->status == "pending" || $purchaseorder->status == "on-delivery-process"){

        $datetime1 = new DateTime(date("Y-m-d"));
        $datetime2 = new DateTime($purchaseorder->deadline);
        $interval = $datetime1->diff($datetime2);
        $days =$interval->days;


        if($days < 3){
            $deadlineColor = "red";
        }else if($days < 5){
            $deadlineColor = "orange";

        }
        else if($days == 7){
            $deadlineColor = "green";

        }
}
?>
    <tr  style = "display:table-row;color:{{$deadlineColor}}"><td>{{$purchaseorder->id}}</td>
        <td>{{$purchaseorder->created_at->format("Y-m-d")}}</td>
        <td>{{$purchaseorder->deadline}}</td>
        
        <td>{{$purchaseorder->status}}</td>
        <td>
            <a href = "/order/{{$purchaseorder->id}}">View order details</a>
        </td>
    </tr>
@endforeach
    </table>

    	
	</fieldset>
</div>
@stop