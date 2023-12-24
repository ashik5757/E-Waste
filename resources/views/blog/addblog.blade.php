@extends('layout.app')


@section('title')
    E-Waste | Add Blog
@endsection


@section('more_link')
<link rel="stylesheet" href="{{ asset('assets/css/addblog.css') }}">
@endsection


@section('content')

<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Add a Blog Post</h3>
            <h3 class="mt-3">Please fill the following details-</h3>
        </div>
    </div>

</div>


<div style="margin-left: 28%;margin-bottom: 28px;margin-top: 28px">
    <!-- Your create blog form goes here -->


                <div class="form-container">

                    <form id="submitForm_blog" action="{{route('blog.store', ['user'=>Auth::User()->username])}}" method="post" enctype="multipart/form-data"
                        class="needs-validation-l" novalidate>
                        @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">Blog Title</label><br>
                        <input class="form-control" name="title" id="title" type="text" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Blog Description</label><br>
                        <textarea class="form-control" cols="50" rows="5" id="textarea" name="description" required></textarea>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="details" class="form-label">Blog Details</label><br>
                        <textarea class="form-control"  cols="50" rows="10" id="textarea" name="details" required></textarea>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label" >Blog Category</label><br>
                        <select name="category" id="category" class="form-select" required>
                            <option value="blog">Blog Post</option>
                            <option value="product">Product Post</option>
                            <option value="resource">Resource Post</option>
                        </select>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>

                    <label for="image" class="custum-file-upload" class="form-label"><br>
                        <div class="icon">

                        </div>
                        <div class="text">
                        <label>Click to upload image</label>
                        </div>
                        <input class="form-control" id="image" name="images[]" type="file" accept="image/*" onchange="previewImages(event)" multiple required>
                    </label>



                    <div id="image-preview"></div>

                    <br><br>
                        <button type="submit" class="btn btn-xs pl-3 pe-3" style="background:rgb(47,155,92);color:white">Submit</button>
                    </form>


                </div>


</div>



<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Clear previous previews

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var previewImage = document.createElement('img');
                previewImage.className = 'preview-image';
                previewImage.src = e.target.result;

                var previewContainerDiv = document.createElement('div');
                previewContainerDiv.className = 'preview-container';
                previewContainerDiv.appendChild(previewImage);

                previewContainer.appendChild(previewContainerDiv);
            };

            reader.readAsDataURL(file);
        }
    }

</script>





<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation-l')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>




@endsection
