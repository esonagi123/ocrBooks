<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ocrAPI extends Controller
{

  public function ocrApi($imgSrc)
  {
      $client_secret = "aWt4eWJQTXdUVElHQUpWY01PTkxZSUhaS2RsVXZRWXU=";
      $url = "https://h1yuxsvpe1.apigw.ntruss.com/custom/v1/29371/130fb10bf35ee72e690c488e7db7c22e913c974dc4e80c2f7049a38e4f7622c3/infer";
      
      // 객체 초기화
      $params = new \stdClass();
      $image = new \stdClass();  
    
      $image_url = $imgSrc;
      // $image_file = "YOUR_IMAGE_FILE";
    
      $params->version = "V2";
      $params->requestId = uniqid();
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
    
      return response()->json($status_code);
      // echo $status_code;
      if($status_code == 200) {
        $data = json_decode($response, true);
        return view('m_books.scanResult', compact('data'));

      } else {
        $data = '{"error": "에러!!"}';
        return redirect('/m_main');
      }
  }

  public function upload(Request $request)
  {
      if ($request->hasFile('image')) {
          $images = $request->file('image');
  
          foreach ($images as $image) {
              // 파일 확장자 확인
              $extension = $image->getClientOriginalExtension();
              
              // 파일 확장자가 허용된 확장자인지 확인
              $allowedExtensions = ['png', 'jpeg', 'jpg'];
              if (!in_array(strtolower($extension), $allowedExtensions)) {
                  return response()->json(['success' => false, 'message' => '업로드할 수 없는 파일 형식입니다.']);
              }
  
              // 파일을 저장하고 파일 정보를 데이터베이스에 저장
              $fileName = time() . '.' . $extension;
              $file_path = 'uploads';
              $image->storeAs($file_path, $fileName);
  
              // // 파일 정보를 데이터베이스에 저장 (주석 해제)
              // $fileModel = new File();
              // // 파일 정보 설정
              // // $fileModel->qid = $request->input('questionID'); // 이 부분은 질문 ID 등 필요한 정보에 따라 설정해야 합니다.
              // $fileModel->fileName = $fileName;
              // // $fileModel->fileSize = $request->input('fileSize'); // 파일 크기 정보가 필요한 경우에는 요청에서 파일 크기 정보를 받아와야 합니다.
              // $fileModel->src = Storage::url($file_path . '/' . $fileName);
              // $fileModel->state = "임시"; // 파일 상태 등 추가 정보가 필요한 경우에는 설정해야 합니다.
              // $fileModel->save();
  
              
  

          }
  
          // 처리 완료 후 반환할 응답
          // 업로드된 이미지로 ocrApi 요청
          $result = $this->ocrApi($file_path . '/' . $fileName);
       
          // return response()->json(['success' => true, 'message' => '이미지 업로드 및 처리가 완료되었습니다.']);
      } else {
        return response()->json(['success' => false, 'message' => '이미지가 전송되지 않았습니다.']);
      }
  
      
  }
    
// 끝
}
