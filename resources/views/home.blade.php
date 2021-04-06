@extends('layouts.app')

@section('content')
    
     <div class="form-style-2">
         <img src="/img/PayMe_logo.png" alt="paymelogo" height="150" width="400">
     <h1>Welcome to PayMe!</h1>
        <form method="get" action="/salecreation">
            <button type="submit">Navigate To Sale Creation</button>
        </form>
 @endsection 
