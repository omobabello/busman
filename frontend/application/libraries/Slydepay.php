<?php
defined('BASEPATH') or exit('No direct access allowed');

class Slydepay {


  public function create_token($email,$key,$price,$code,$desc,$name,$cmail,$mobile){

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/create",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_SSL_VERIFYHOST => 2,
      CURLOPT_SSL_VERIFYPEER => FALSE,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\n    \"emailOrMobileNumber\":\"$email\", \n    \"merchantKey\":\"$key\",\n    \"amount\": $price,\n
         \"orderCode\":\"$code\",\n    \"description\":\"$desc\",\n    \"sendInvoice\":true,\n    \"customerName\":\"$name\",\n    \"customerEmail\":\"$cmail\",\n    \"customerMobileNumber\":\"$mobile\"\n}\n",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));
    $response = curl_exec($curl);
    $error = curl_error($curl);

    return ($error) ? 'Curl Error '.$error : $response;
  }

  public function get_payment_options($email, $key){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/payoptions",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_SSL_VERIFYHOST => 2,
      CURLOPT_SSL_VERIFYPEER => FALSE,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{     \"emailOrMobileNumber\":\"$email\", \r\n    \"merchantKey\":\"$key\"\r\n}\r\n",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    return ($error) ? 'Curl Error '.$error : $response;
  }


  public function create_invoice($email,$key,$price,$code,$desc,$name,$cmail,$mobile){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n    \"emailOrMobileNumber\":\"$email']\", \n    \"merchantKey\":\"$key\",\n    \"amount\": $price,\n
           \"orderCode\":\"$code\",\n    \"description\":\"$desc\",\n    \"sendInvoice\":false,\n
          \"customerName\":\"$name\",\n    \"customerEmail\":\"$cmail\",\n    \"customerMobileNumber\":\"$mobile\"\n}\n",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    return ($error) ? 'Curl Error '.$error : json_decode($response);
  }

  public function send_user_bill($email,$key,$price,$token,$code,$option,$name,$cmail,$mobile){


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/send",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,

    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_SSL_VERIFYPEER => FALSE,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{   \"emailOrMobileNumber\":\"thisisobt@gmail.com\", \n    \"merchantKey\":\"1482277768375\",,\n    \"amount\":10.00,\n    \"payToken\" : \"7e15e7fa-4f1d-46d8-81a6-ead7bc7f3676\",\n    \"orderCode\":\"7e15e7fa-4f1d-46d8-81a6-ead7bc7f3676\",\n    \"payOption\":\"SLYDEPAY\",\n    \"customerName\":\"Bello Opeyemi\",\n    \"customerEmail\":\"integrations@slydepay.com.gh\",\n    \"customerMobileNumber\":\"233557470294\"\n}\n",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json"
    ),
  ));


      $response = curl_exec($curl);
      $error = curl_error($curl);

      return ($error) ? 'Curl Error '.$error : $response;
  }

  public function check_status($email,$key,$price,$code,$token){

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/invoice/checkstatus",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n   \"emailOrMobileNumber\":\"$email\", \n    \"merchantKey\":\"$key\",\n    \"amount\":\"$price\",\n
           \"orderCode\":\"$code\",\n    \"payToken\":\"$token\",\n    \"confirmTransaction\" : TRUE\n    \n}\n",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $errer = curl_error($curl);

      curl_close($curl);

      return ($error) ? 'Curl Error '.$error : $response;
  }

  public function confim_trasaction($email,$key,$amount,$code,$token){
    $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/transaction/confirm",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n    \"emailOrMobileNumber\":\"$email\", \n    \"merchantKey\":\"$key\",\n
          \"amount\":\"$amount\",\n    \"orderCode\":\"$code\",\n    \"payToken\":\"$token\",\n
           \"transactionId\":\"$token\"\n}\n",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $error = curl_error($curl);

      curl_close($curl);

    return ($error) ? 'Curl Error '.$error : $response;
  }

  public function cancel_transaction($email,$key,$price,$code,$token){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.slydepay.com/api/merchant/transaction/cancel",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n    \"emailOrMobileNumber\":\"$email\", \n    \"merchantKey\":\"$key\",\n    \"amount\":\"$price\",\n
            \"orderCode\":\"$code\",\n    \"payToken\":\"$token\",\n    \"transactionId\":\" $token\"\n}\n",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    return ($error) ? 'Curl Error '.$error : $response;
  }
}
