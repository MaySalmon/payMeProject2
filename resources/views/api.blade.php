<!-- 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payme";

//$product_name= $_POST['productname'];
//$sale_price= $_POST['price'];
//$currency= $_POST['currency'];



use Illuminate\Support\Facades\Http;

 

$response = Http::post('https://preprod.paymeservice.com/api/generate-sale', [

    'seller_payme_id' => 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N',

    'sale_price' =>  '12300',

    'currency' => $_POST['currency'],

    'product_name' => $_POST['productname'],

    'installments' => '1',

    'language' => 'en'

]);

$obj = json_decode($response->body());



 
  




 //Create connection

 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection

 if ($conn->connect_error) {

   die("Connection failed: " . $conn->connect_error);

}                                




 $sql = "INSERT INTO sales(payme_sale_id, product_name, sale_price, currency, sale_url) VALUES ('".$obj->payme_sale_id."','".$_POST['productname']."', '12300', '".$_POST['currency']."', '".$obj->sale_url."')";

 

 if ($conn->query($sql) === TRUE) {

   echo "New record created successfully";

 } else {

   echo "Error: " . $sql . "<br>" . $conn->error;

 }

 

 $conn->close(); 

 


<br></br>
<a href="salecreation">Go Back To Sale Creation Page</a>
{{print_r($obj)}}


 
 -->
