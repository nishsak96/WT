<?php
    function aadharcheck($aadhar)
    {

      //if(isset($_POST['adhar']))
        //{  
          //$aadhar=$_POST['adhar'];

      $data= array( 
              'aadhaar-id' => $aadhar,
              'device-id' => "",
              'certificate-type' => "preprod",
              'channel' => "SMS",
              'location' =>array( 
                  'type' => "",
                  'latitude' => "",
                  'longitude' => "",
                  'altitude' => "",
                  'pincode' => "",
              ),
          
      );
      $url ="http://139.59.30.133:9090/otp";
      $payload = json_encode($data);

      $ch = curl_init( $url );
      # Setup request to send json via POST.
      curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
      curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      # Return response instead of printing.
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
      # Send request.
       $result = curl_exec($ch);
      curl_close($ch);
      $ress=json_decode($result, true);
      $x=$ress['success'];
        if($x==true)
        {
          echo $result;

          setcookie("aadhar",$aadhar,time()+36000);
        }else
        {
          echo 'Wrong Aadhar';
        }
      }
aadharcheck()
?>