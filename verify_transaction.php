<?php session_start(); ?>
<?php
$ref = $_GET['reference'];


if ($ref == ""){
    header("Location:javascript://history.go(-1)");
    exit;
}
?>
<?php
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: ",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $result = json_decode($response);
  }
  if($result->data->status == 'success'){
    $status = $result->data->status;
    $reference = $result->data->reference;
    $channel = $result->data->channel;
    $ip_address = $result->data->ip_address;
    $email = $result->data->customer->email;
    $amount = $result->data->amount;
    $start_time = $result->log->start_time;
    date_default_timezone_set('Africa/Lagos');
    $cdate = date('m/d/Y h:i:s a', time());

    include 'connect.php';
    $usemail = $_SESSION['email'];
    $query1 = mysqli_query($con, "SELECT * FROM users WHERE email ='$usemail'");
    $row1 = mysqli_fetch_array($query1);
    $locat = $row1['location'];
    $sql = $con->query("INSERT INTO payment (cdate, email, amount, locat, channel, reference_id, ip_address) VALUES ('$cdate', '$email', '$amount', '$locat', '$channel', '$reference', '$ip_address')") or die(mysqli_error($conn));
    $con->query("UPDATE product_detail SET prod_id = '$reference', status = '1' WHERE user='$email' and status='0'") or die(mysqli_error($con));

    if(!$sql){
        echo 'There is an error'.mysqli_error($con);
    }else{
        header("Location:confirmation.php");
        exit;
    }
    
  }else{
    header("Location:error.php");
    exit;
  }
?>
