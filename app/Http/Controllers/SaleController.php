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
         echo $req->sale_url;
         echo $req->payme_sale_code;
         echo $_POST['currency'];
         echo $_POST['productname'];
        // foreach($quizzes as $quiz){
        //         $question = new Question;
        //         $question->question = $quiz->question;
        //         $question->answer_a = $quiz->answers->answer_a;
        //         $question->answer_b = $quiz->answers->answer_b;
        //         $question->answer_c = $quiz->answers->answer_c;
        //         $question->answer_d = $quiz->answers->answer_d;
        //         $question->save();
         //}
        // return "DONE";
        
        $sale= new Sale;
        $sale->payme_sale_id=Input::get['$req->payme_sale_id'];
        //$sale->product_name=$_POST['productname'];
        //$sale->sale_price= 13200;
        //$sale->currency= $_POST['currency'];
        //$sale->sale_url= "d";
        $result=$sale->save();


        return view('salecreationwithpayment');

    }
}

    
 


