<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ocrAPI extends Controller
{

  // 이미지 업로드 → API 요청 → 데이터 반환 → 이미지 삭제
  public function upload(Request $request)
  {
      if ($request->hasFile('image')) {
        $images = $request->file('image');
        $datas = [];
        foreach ($images as $image) {
          $response = null; // 초기화

          // 파일 확장자 확인
          $extension = $image->getClientOriginalExtension();
          
          // 파일 확장자가 허용된 확장자인지 확인
          $allowedExtensions = ['png', 'jpeg', 'jpg'];
          if (!in_array(strtolower($extension), $allowedExtensions)) {
              return response()->json(['success' => false, 'message' => '업로드할 수 없는 파일 형식입니다.']);
          }

          // 파일 저장
          $fileName = time() . '.' . $extension;
          $file_path = 'public/uploads';
          $image->storeAs($file_path, $fileName);

          // ** NAVER CLOVA OCR API **
          $client_secret = "aWt4eWJQTXdUVElHQUpWY01PTkxZSUhaS2RsVXZRWXU=";
          $url = "https://h1yuxsvpe1.apigw.ntruss.com/custom/v1/29371/130fb10bf35ee72e690c488e7db7c22e913c974dc4e80c2f7049a38e4f7622c3/infer";
          
          // 객체 초기화
          $params = new \stdClass();
          $image = new \stdClass();
        
          $image_url = asset(Storage::url($file_path . '/' . $fileName));
          // $image_file = "YOUR_IMAGE_FILE";
        
          $params->version = "V2";
          $params->requestId = uniqid();
          $params->timestamp = time();
          $image->format = "jpg";
          // $image->url = $image_url;
          $image->data = base64_encode(file_get_contents($image_url));
          $image->name = $fileName;
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
          // return response()->json($status_code);

          if($status_code == 200) {
            // JSON 문자열을 PHP 배열로 변환
            $datas[] = json_decode($response, true);
          
            $datas[count($datas)-1]['shop'] = $datas[count($datas)-1]['images'][0]['fields'][0]['inferText']; // 상호명
            $datas[count($datas)-1]['date'] = $datas[count($datas)-1]['images'][0]['fields'][1]['inferText']; // 날짜
            $datas[count($datas)-1]['total'] = $datas[count($datas)-1]['images'][0]['fields'][2]['inferText']; // 총액
            $datas[count($datas)-1]['image'] = $image_url;
            $datas[count($datas)-1]['number'] = count($datas);
            // return response()->json($data);
    
          } else {
            // 에러 발생 시
            return redirect('/m_main');
          }
        }
          // foreach가 끝나면
          return view('m_books.scanResult', ['datas' => (object)$datas]);
    } else {
      return response()->json(['success' => false, 'message' => '이미지가 전송되지 않았습니다.']);
    }
  }
}
