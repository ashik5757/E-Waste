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
        <div class="half1" style="margin-bottom: -60px">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Excusive Features Here</h3>
            <span class="txt mt-3">You can see the creative the World, crafting through several wastes product to many usefull items </span>
            <h3 class="mt-3">You can post your creative crafting here!!</h3>

            <a href="{{route('feature.create', ['user'=>Auth::User()->id])}}">
                <input style="margin-top: 100px" type="button" value="Add Feature" class="button_uv1">
            </a>
        </div>
    </div>



</div>



<div class="container" style="margin-left: 10px">

    <div class="row justify-content-around" style="width: 1600px;margin-left:26%;margin-bottom:70px">

        @for ($i = 0; $i < 7; $i++)


            <div class="text-center border rounded" style="margin-top:70px; width: 450px;">

                <h5 class="card-title" style="margin-top:20px">A Small Earthen Pots</h5>

                <img src="/assets/images/crft.jpg" class="img-fluid rounded-start" alt="..." style="width: 390px; height:250px" >
                <p class="card-text">I made a wall hanging using waste material are - Lorem, ipsum dolor.</p>
                <a href="{{route('feature.details', ['slug'=>Str::slug('Card title')])}}" class="btn btn-primary">Watch now</a>

                <p class=" text-muted">
                Created 2 days ago
                </p>
            </div>


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


