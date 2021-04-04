@extends('layouts.app')

@section('content')
<div class="block">
        <h3>Created Sales<h3>
        <table  class="table-content">
            <thead>
            <tr>
                <td>DateTime</td>
                <td>Sale Number</td>
                <td>Description</td>
                <td>Amount</td>
                <td>Currency</td>
                <td>Payment Link</td>
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
            </tr>
            @endforeach
        </table>
</div>
@endsection 