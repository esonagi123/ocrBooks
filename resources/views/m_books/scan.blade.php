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
<div class="billUpload shadow-lg d-flex justify-content-center mt-4">
    <div class="row align-items-center">
        <label for="uploadInput" class="fw-medium text-center fs-5" style="color: #9b7aff;">
            영수증 첨부하기 &nbsp;<i class="fa-solid fa-images"></i></i>
        </label>
        <input type="file" id="uploadInput" multiple style="display: none;">
    </div> 
</div>
<div class="row mt-4 text-center" id="imageContainer"></div>

<script>
        const uploadInput = document.getElementById('uploadInput');
        const imageContainer = document.getElementById('imageContainer');

        uploadInput.addEventListener('change', handleFileUpload);

        function handleFileUpload(event) {
            const files = event.target.files;
            imageContainer.innerHTML = '';
            for (let i = 0; i < Math.min(files.length, 6); i++) {
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
        }
    </script>
@endsection()