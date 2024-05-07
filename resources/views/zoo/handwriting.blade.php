<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--부트스트랩 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!--커스텀-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/handwriting.css') }}">
    <script src="//code.jquery.com/jquery-latest.js"></script>

    <!--태그 관련 -->
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    
    <script>
      $.fn.setPreview = function(opt){
          "use strict"
              var defaultOpt = {
                  inputFile: $(this),
                  img: null,
                  w: 4 00,
                  h: 'auto'
          };
          $.extend(defaultOpt, opt);
          
          var previewImage = function(){
              if (!defaultOpt.inputFile || !defaultOpt.img) return;
      
              var inputFile = defaultOpt.inputFile.get(0);
              var img       = defaultOpt.img.get(0);
      
              // FileReader
              if (window.FileReader) {
                  // image 파일만
                  if (!inputFile.files[0].type.match(/image\//)) return;
      
                  // preview
                  try {
                      var reader = new FileReader();
                      reader.onload = function(e){
                          img.src = e.target.result;
                          img.style.width  = defaultOpt.w+'px';
                          img.style.height = defaultOpt.h;
                          img.style.display = '';
                      }
                      reader.readAsDataURL(inputFile.files[0]);
                  } catch (e) {
                      // exception...
                  }
              // img.filters (MSIE)
              } else if (img.filters) {
                  inputFile.select();
                  inputFile.blur();
                  var imgSrc = document.selection.createRange().text;
      
                  img.style.width  = defaultOpt.w+'px';
                  img.style.height = defaultOpt.h+'px';
                  img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\""+imgSrc+"\")";          
                  img.style.display = '';
              // no support
              } else {
                  // Safari5, ...
              }
          };
      
          // onchange
          $(this).change(function(){
              previewImage();
          });
      };
      
      
      $(document).ready(function(){
          var opt = {
              img: $('#img_preview'),
              w: 400,
              h: 800
          };
      
          $('#input_file').setPreview(opt);
      });
    </script>

    <title>Upload</title>
</head>

<body class="vertical-alignment ">
    <article>
        <div class="uploadBody">
            <h2 class="upload_h">수기작성</h2>
        </div>
        
        <div class="inputBox">
            <img class="preview" id="img_preview" style="display:none;"/>
            <label for="file"></label>
            <input type="file" class="form-control inputstyle" multiple="multiple" id="input_file" name="input_image" 
                   onchange="setDetailImage(event);" accept="image/png, image/jpeg, image/jpg" style="margin-left: 0.1em;">
        </div>
        
        <table class="table">
            <tbody>
                <colgroup>
                    <col width=10%>
                    <col width=50%>
                </colgroup>

                <tr>
                    <td class="date" >날짜</td>
                    <td>날짜 불러오기</td>
                </tr>
                <tr>
                    <td class = "category" >카테고리</td>
                    <td><select class="form-select form-select-md mb-3" name="type" style="font-size:1em;">
                        <option selected>카테고리를 지정하세요</option>
                        <option>문화</option>
                        <option>식비</option>
                        <option>교통비</option>
                        <option">생활용품</option>
                        <option>쇼핑</option>
                        <option>기타</option>
                        </select>
                    </td>
                </tr>
                <tr >
                    <td class="price" >금액</td>
                    <td><textarea class="price_input" name="info" maxlength="12" rows="1" cols="1" style="width:40%; border:none;" onkeyup="inputNumberFormat(this);" placeholder="금액을 입력해주세요"></textarea></td>
                </tr>
                <tr >
                    <td class="memo" >메모</td>
                    <td><textarea class="memo_input" name="info" rows="10" cols="60" style="width:40%; border:none;" placeholder="메모할 내용을 입력해주세요"></textarea></td>
                </tr>
                <!-- <tr>
                    <button>저장</button>
                </tr> -->
            </tbody>
        </table>
</article>

<script>
    $(document).ready(function(){
        // 이미지 보이도록
        function previewImage(input) {
            var imgElement = document.getElementById('img_preview');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                    imgElement.style.display = 'block'; 
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        // 파일 입력 요소에 이벤트 리스너 연결
        $('#input_file').change(function() {
            previewImage(this);
        });
    });

    function setDetailImage(event){
        for(var image of event.target.files){
            var reader = new FileReader();
            
            reader.onload = function(event){
                var img = document.createElement("img");
                img.setAttribute("src", event.target.result);
                img.setAttribute("class", "col-lg-6");
                document.querySelector("div#images_container").appendChild(img);
            };
            
            console.log(image);
            reader.readAsDataURL(image);
        }
    }

    //콤마
    function comma(str) {
        str = String(str);
        return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
    }

    function uncomma(str) {
        str = String(str);
        return str.replace(/[^\d]+/g, '');
    } 
    
    function inputNumberFormat(obj) {
        obj.value = comma(uncomma(obj.value));
    }
    
    function inputOnlyNumberFormat(obj) {
        obj.value = onlynumber(uncomma(obj.value));
    }
    
    function onlynumber(str) {
	    str = String(str);
	    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g,'$1');
	}
    </script>
</body>
</html>