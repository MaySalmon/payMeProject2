@extends('layouts.app')

@section('content')


<form action="saleupdate/{{$sales[0]->product_name}}" method="POST">
<ul class="form-style-1">
    <h1>Edit Sale</h1>
    {{ csrf_field() }}
    <li>
        <label>Edit Product Name </label>
        <input type="text" name="productname" value="{{$sales[0]->product_name}}" class="field-divided" />
        <span style="color: red">@error('productname'){{$message}}@enderror</span>
    </li>
    <li>
        <label>Edit Product Price</label>
        <input type="number"  name="price" value="{{$sales[0]->sale_price}}" class="field-long" />
        <span style="color: red">@error('price'){{$message}}@enderror</span>
        <small class="text-muted">The price has to be a valid whole or decimal number.</small>
    </li>
    <li>
        <label for="currency">Edit Currency</label>
        <select name="currency" value="{{$sales[0]->currency}}" class="field-select">
            <option value= "ils">ILS</option>
            <option value= "usd">USD</option>
            <option value= "eur">EUR</option>
        </select>
        
    </li>
    <li>
        <input type="submit" value="Update" />
    </li>

</form>

@endsection 
