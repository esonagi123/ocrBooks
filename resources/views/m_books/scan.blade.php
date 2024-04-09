@extends('m_base')

@section('content')
<style>
    .uploaded-image {
        width: 50%;
        margin-top: 10px;
        margin-right: 10px;
        border-radius: 5px;
    }
    .delete-button {
            color: red;
    }
    .file-name {
            margin-top: 5px;
    }    
</style>
<div class="container mt-4">
    <form id="uploadForm" enctype="multipart/form-data">
        <div class="billUpload shadow-lg d-flex justify-content-center mt-4">
            <div class="row align-items-center">
                <label for="uploadInput" class="fw-medium text-center fs-5" style="color: #9b7aff;">
                    영수증 첨부하기 &nbsp;<i class="fa-solid fa-images"></i></i>
                </label>
                <input type="file" id="uploadInput" name="files[]" multiple style="display: none;">
            </div>
        </div>

        <div class="row mt-4" id="imageContainer"></div>

        <div id="uploadButton" class="position-fixed bottom-0 start-50 translate-middle-x" style="display: none; margin-bottom: 100px;">
            <button type="submit" class="btn btn-success" style="">업로드</button>
        </div>
        
    </form>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch("{{ url('api/requsetOCR') }}", {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // console.log(data); // 서버에서 온 응답을 콘솔에 출력
            // 업로드 후 이미지 컨테이너 초기화 등 추가 동작 수행 가능
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    const uploadButton = document.getElementById('uploadButton');
    const uploadInput = document.getElementById('uploadInput');
    const imageContainer = document.getElementById('imageContainer');
    

    uploadInput.addEventListener('change', handleFileUpload);

    function handleFileUpload(event) {
        let count = 0;
        const files = event.target.files;
        
        

        imageContainer.innerHTML = '';
        for (let i = 0; i < Math.min(files.length, 6); i++) {
            count++;
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.classList.add('uploaded-image-container');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('uploaded-image');

                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = '&times;';
                deleteButton.classList.add('delete-button');
                deleteButton.addEventListener('click', () => {
                    imgContainer.remove();
                    count--;
                    if (count == 0) {
                        uploadButton.style.display = 'none';
                    }
                });

                const fileName = document.createElement('p');
                fileName.classList.add('file-name');
                fileName.textContent = file.name;

                imgContainer.appendChild(img);
                imgContainer.appendChild(fileName);
                imgContainer.appendChild(deleteButton);
                imageContainer.appendChild(imgContainer);
            }
            reader.readAsDataURL(file);
        }
        uploadButton.style.display = 'block';

    }
</script>
@endsection()