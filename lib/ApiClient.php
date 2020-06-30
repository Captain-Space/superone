<?php

require 'phar://'.ROOT.'lib/HttpClient.phar';
use GuzzleHttp\Client;
use GuzzleHttp\Promise;

class ApiClient
{
    
  static function get($url,$access,$type="cn"){
   
    if($type=="cn"){
        $api="https://microsoftgraph.chinacloudapi.cn/v1.0/";
    }else{
          $api="https://graph.microsoft.com/v1.0/";
    }
     $apc=new Client([
    'base_uri' => $api,
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' =>     $access,
        'Content-Type' => 'application/json',
    ],
    'http_errors' => false
]);

    return json_decode($apc->get($url)->getBody());
    
    
    
}

static function driveid($token,$name="/me",$type="cn")
{
    
 $apc=self::get($name,$token,$type);
    
    
    
      $hostname=json_decode($apc->get("sites/root"))->siteCollection->hostname;
     $siteid=json_decode(($apc->get("sites/". $hostname.":".$name)->getBody()))->id;
   return  $driveid=json_decode($apc->get("sites/".($siteid."/drive"))->getBody());
    
}
    
    
    
    
    
    
    
    
    
    
}
