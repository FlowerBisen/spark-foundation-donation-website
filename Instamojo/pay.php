<?php 
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Amount=$_POST['Amount'];
$Phone=$_POST['phone'];
$purpose='Donation';

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_40064dae38583c699628f34233a', 'test_347264b2ca60bd4c954629b8418','https://test.instamojo.com/api/1.1/');


try {
   $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $Amount,
        "send_email" => true,
        "email" => $Email,
        "buyer_name" =>$Name,
        "phone"=>$Phone,
        "send_sms" => true,
        "allow_repeated_payments" =>false,
        "redirect_url" => "https://donation88.000webhostapp.com/Instamojo/thankyou.php",
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    header("location: $pay_ulr");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>