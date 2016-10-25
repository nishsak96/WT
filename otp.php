 <?php
 ob_start();
if(isset($_POST['ot']))
{

  $otp=$_POST['ot'];
  $pin=$_POST['pin'];
  $aadhar=$_COOKIE['aadhar'];
  $data=array(
        "consent"=> "Y",
        "auth-capture-request" => array(
            "aadhaar-id"=> $aadhar,
            "location"=> array(
                "type" =>"pincode",
                "pincode" => $pin
            ),
            "modality"=> "otp",
            "certificate-type"=> "preprod",
            "otp"=>$otp
        )
    ); 

$url ="http://139.59.30.133:9090/kyc/raw";
$payload = json_encode($data);

$ch = curl_init( $url );
# Setup request to send json via POST.
curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);

//echo $result;
curl_close($ch);

$ress=json_decode($result, true);
$x2=$ress['success'];
$data=$ress['kyc']['photo'];
$x=true;
echo '<br><img src="data:image/jpg;base64,'.$data.'"/>';
if($x==true){
  //echo "true";
  //header("Location: naya.php");
}else{
echo "nahi hua na";
}
}
?>