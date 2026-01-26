<?php
namespace models ;
final class Zoom{
private static string $accountId = "rPBJ0Fd4T6m-pO-l2UCJ3A";
private static string $clientId  = "FTnWmfB_R1mUF0ks9tDavQ";
private static string $clientSecret = "ejlrvt67QLSMhNXCdVF2Jo8esdbk5gC2";
private string $token ;
private string $MeetingPassword ;

public function getTokenByUrl(){
    $info = base64_encode(self::$clientId.':'.self::$clientSecret);
$curl = curl_init();
curl_setopt_array($curl,[
    CURLOPT_URL => 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id='.self::$accountId,
    CURLOPT_POST => true ,
    CURLOPT_RETURNTRANSFER => true ,
    CURLOPT_HTTPHEADER => ['Authorization: Basic '.$info,
                           "Content-Type: application/x-www-form-urlencoded"],
]);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($curl) ;
if($response === false){
    echo 'cURL error: ' . curl_error($curl);
    $this -> token = false ;
}
else{
    curl_close($curl);
    $data = json_decode($response,true);
    $this->token = $data['access_token'] ;
}
}
public function getTheMeetingLink(){
$this->getTokenByUrl();
if($this->token){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.zoom.us/v2/users/me/meetings",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n  \"agenda\": \"My Meeting\",\r\n  \"default_password\": false,\r\n  \"duration\": 60,\r\n  \"password\": \"123456\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer  ".$this->token,
        "Content-Type: application/json"
      ),
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($curl);
    if($response === false){
        echo 'cURL error: ' . curl_error($curl);
    }
    curl_close($curl);
    $meetingRepot = json_decode($response)  ;
    $this->MeetingPassword = $meetingRepot -> password ;
    return $meetingRepot -> join_url ;
}
}
public function getMeetingPassword(){
    return $this->MeetingPassword;
}
}