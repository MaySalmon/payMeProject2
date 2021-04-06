@extends('layouts.app')

@section('content')
<ul class="nav">
    <img src="/img/PayMe_logo.png" alt="paymelogo" height="70" width="150">
    <li><a href="/">Back to Home page</a></li>
</ul>

<div class="block">

        <h3>Sales<h3>
        <table  class="table-content">
            <thead>
            <tr>
                <td>DateTime</td>
                <td>Sale Number</td>
                <td>Description</td>
                <td>Amount</td>
                <td>Currency</td>
                <td>Payment Link</td>
                <td>Edit Product</td>   
                <td>Delete Product</td>
            </tr>
            </thead>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale['datetime']}}</td>
                <td>{{ $sale['payme_sale_id']}}</td>
                <td>{{ $sale['product_name']}}</td>
                <td>{{ $sale['sale_price']}}</td>
                <td>{{ $sale['currency']}}</td>
                <td>{{ $sale['sale_url']}}</td>
                <td><a href="/click_edit/{{$sale->product_name}}">Edit</a></td>
                <td><a href="/click_delete/{{$sale->product_name}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
</div>
@endsection 