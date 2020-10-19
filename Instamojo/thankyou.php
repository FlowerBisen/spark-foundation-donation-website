<!DOCTYPE html>
<<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Thanking you</title>
      <link rel="stylesheet" href="assets/css/url.css">
  </head>
  <body>
  <main>  <h1>Thank you for donating us</h1>
    <h3>Check your email for details.
    </h3>
    <h3>Stay Safe, Stay healthy</h3>
      
      </main>

    

 <?php

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_40064dae38583c699628f34233a', 'test_347264b2ca60bd4c954629b8418','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);


    echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;

  echo "<pre>";
   print_r($response);
echo "</pre>";
    ?>


    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



  ?>



  </body>
</html>