<?php

namespace App\Helpers;
use App\Models\User;
use Mail;
use Twilio\Rest\Client;

class Helper
{
   
  public static function sendOtp($mobile,$message) {
    $AccountSid   =  "ACe5c9848220ee0a457b2db6f60d10d085";
    $AuthToken    =  "848d8c423ec14711d33a0e240bb38263";
    $client       =  new Client($AccountSid, $AuthToken);
    $contact      =  '+91'.$mobile;
    try{          
     $r =  $client->account->messages->create(
        $contact,
        array(
            'from'=>"+19722365814", 
            //'from' => "+16467621242",
            'body' => $message
        )
      );
      
      $response     =  [
        'message' => 'success',
        'status'  => 1,
      ];
      return $response;

    } catch(\Twilio\Exceptions\RestException $e){
      $response = [
        'message' => $e->getMessage(),
        'status'  => 0,
      ];
      return $response;
    }
  }


}
