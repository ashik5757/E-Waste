@extends('layout.app')


@section('title')
    E-Waste | Features
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/feature.css') }}">
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Excusive Features Here</h3>
            <span class="txt mt-3">You can see the creative the World, crafting through several wastes product to many usefull items </span>
            <h3 class="mt-3">You can post your creative crafting here!!</h3>

            <a href="{{route('feature.create', ['slug'=>Str::slug('Card title')])}}">
                <input style="margin-top: 100px" type="button" value="Add feature" class="button_uv1">
            </a>
        </div>
    </div>



</div>



<div class="container" style="margin-left: 10px">

    <div class="row justify-content-evenly" style="width: 2000px">

        @for ($i = 0; $i < 10; $i++)

        <a style="width: 600px;" href="{{route('blog.details', ['slug'=>Str::slug('Card title')])}}">
            <div class="card mb-3" style="width: 600px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <img src="/assets/images/demo.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text"><small class="text-body-secondary">Created 3 mins ago</small></p>

                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
        </a>
      @endfor


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








@endsection


