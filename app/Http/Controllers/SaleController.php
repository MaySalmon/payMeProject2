<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;
use DB;
use App\Models\Sale;


class SaleController extends Controller
{
    function show()
    {    
       $data= Sale::all();
       return view('table', ['sales'=>$data]);
    }

    function showWitoutLinks()
    {    
       $data= Sale::all();
       return view('tableiframe', ['sales'=>$data]);
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'productname'=>'required',
            'price'=>'required',
            'currency'=>'required'
        ]);
        
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

    public function delete_function($product_name)
    {
        DB::delete('delete from sales where product_name = ?', [$product_name]);
        return redirect('table');
    }

    public function edit_function($product_name)
    {
        
        $sale= DB::select('select * from sales where product_name = ?',[$product_name]);
        return view('saleedit', ['sales'=>$sale]);
    }

    public function update_function(Request $req, $product_name)
    {
          $productnewname = $req->input('productname');
          $productnewprice = $req->input('price');
          $productnewcurrency = $req->input('currency');
          DB::update('update sales set product_name = ?, sale_price = ?, currency= ? where product_name = ?',
           [$productnewname, $productnewprice, $productnewcurrency, $product_name]);
         return redirect('table');
    }
}

    
 


