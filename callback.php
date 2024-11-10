<?php
header("Content-Type: application/json");

$stkCallbackResponse = file_get_contents('php://input');

$logFile = "response.json";
$log = fopen($logFile, "a");
fwrite($log, $stkCallbackResponse);
fclose($log);

// Decode the response to get individual data

$data = json_decode($stkCallbackResponse);

$CheckoutRequestID = $data->Body->stkCallback->CheckoutRequestID;
$MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
$ResultCode = $data->Body->stkCallback->ResultCode;
$Amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$TrdansactionId = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$PhoneNumber = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;

