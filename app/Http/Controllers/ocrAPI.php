<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ocrAPI extends Controller
{

    public function index()
    {
        $client_secret = "YOUR_SECRET_KEY";
        $url = "YOUR_API_URL";
        $image_url = "YOUR_IMAGE_URL";
        // $image_file = "YOUR_IMAGE_FILE";
      
        $params->version = "V2";
        $params->requestId = "uuid";
        $params->timestamp = time();
        $image->format = "jpg";
        $image->url = $image_url;
        // $image->data = base64_encode(file_get_contents($image_file));
        $image->name = "demo";
        $images = array($image);
        $params->images = $images;
        $json = json_encode($params);
      
        $is_post = true;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $headers = array();
        $headers[] = "X-OCR-SECRET: ".$client_secret;
        $headers[] = "Content-Type:application/json; charset=utf-8";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
      
        echo $status_code;
        if($status_code == 200) {
          echo $response;
        } else {
          echo "ERROR: ".$response;
        }
    }

 
}
