@extends('layouts.app')

@section('content')

<form action="creation" method="POST">

<ul class="form-style-1">
    <h1>New Sale Creation</h1>
    @csrf
    <li>
        <label>Product Name </label>
        <input type="text" name="productname" class="field-divided" />
        <span style="color: red">@error('productname'){{$message}}@enderror</span>
    </li>
    <li>
        <label>Product Price</label>
        <input type="number"  name="price" class="field-long" />
        <span style="color: red">@error('price'){{$message}}@enderror</span>
        <small class="text-muted">The price has to be a valid whole or decimal number.</small>
    </li>
    <li>
        <label for="currency">Currency</label>
        <select name="currency" class="field-select">
            <option value= "ils">ILS</option>
            <option value= "usd">USD</option>
            <option value= "eur">EUR</option>
        </select>
        
    </li>
    <li>
        <input type="submit" value="Insert payment details" />
    </li>
    <li>
        <a href="table" target="myFrame1">click here to see the sales table</a>
    </li>
</ul>
    <div class="iframe-container">
        <iframe name="myFrame1" height="600" width="600" frameborder="0"></iframe>
     </div>
</form>

@endsection 