<?php
//INCLUDE THE SECURE CONFIG AND PAYMENT PROCESSOR FILES HERE
include 'secure_config.php';
include 'payment_processor.php';

$transaction_request_id = "_paste the transaction_request_id here_";

//CALL verifypayment FUNCTION HERE
$result = verifyPayment($api_key, $email, $transaction_request_id);

//check if the transaction code exists and is not empty
if( isset($result ->TransactionCode ) && $result->TransactionCode != "")
{

  
        $transactionStatus = $result->TransactionStatus;
        $receipt = $result->TransactionReceipt;
        $amount = $result->TransactionAmount;
        $phone = $result->Msisdn;
        $transaction_description = $result->ResultDesc;  
        $Mpesa_receipt = $result -> TransactionReceipt;
        
        //to show the full response
        echo json_encode($result);
  
}
//no transaction code
else
{
      echo "Something went wrong!";
}

?>