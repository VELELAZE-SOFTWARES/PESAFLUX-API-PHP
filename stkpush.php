<?php

//INCLUDE THE SECURE CONFIG AND PAYMENT PROCESSOR FILES HERE
include 'secure_config.php';
include 'payment_processor.php';

if(isset($_POST['submit']))
{
    $phone = $_POST['mpesaNumber'];
    $amount = $_POST['amount'];
    $reference = $_POST['accountNumber'];
    
    //CALL makepayment FUNCTION HERE
    $result = makePayment($api_key, $email,  $amount, $phone, $reference);
  
    if(isset($result->success) && $result->success == '200')
    {

    $result_code = $result-> success;
    $message = $result-> message;
    $transaction_request_id = $result -> tranasaction_request_id;

    //GET THE TRANSACTION ID
    echo "transaction_request_id = ".$transaction_request_id;
   

    }
    
    else
    {
    
        echo "Transaction Failed. Please retry";
        
    }
}
?>