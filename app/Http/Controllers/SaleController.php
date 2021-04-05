<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Sale;


class SaleController extends Controller
{
    function show()
    {    
       $data= Sale::all();
       return view('table', ['sales'=>$data]);
    }
    public function fetch()
    {
        $response = Http::post('https://preprod.paymeservice.com/api/generate-sale', [
            'seller_payme_id' =>'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N',
            'seller_payme_id' => 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N', 
            'sale_price' => '12300',  
            'currency' => $_POST ['currency'], 
            'product_name' => $_POST ['productname'], 
            'installments' => '1', 
            'language' => "en" 
        ]);
         $req = json_decode($response->body());
        
        
          $sale= new Sale;
          $sale->payme_sale_id= $req->payme_sale_id;
          $sale->product_name=$_POST['productname'];
          $sale->sale_price= $_POST['price'];
          $sale->currency= $_POST['currency'];
          $sale->sale_url= $req->sale_url;
          $sale->seller_payme_id= "MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N";
          $sale->installments =1;
          $sale->payme_sale_code = $req->payme_sale_code;
          $sale->sale_paymet_method="abc";
          $sale->transaction_id ="";
          $sale->language="en";
          $result=$sale->save();
        
        //redirect to salecreation page with an open iframe of payment form 
        return view('salecreationwithpayment');

    }
}

    
 


