@extends('layout.app')


@section('title')
    E-Waste | Bogsite
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/blogsite.css') }}">
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Blog Site</h3>
            <span class="txt mt-3">Exploring the World Through Words</span>
            <h3 class="mt-3">You can Blog post on you own!!</h3>

            <a href="{{route('blog.create', ['slug'=>Str::slug('Card title')])}}">
                <input style="margin-top: 100px" type="button" value="Create Now" class="button_uv1">
            </a>
        </div>
    </div>



</div>



<div class="container" >
    <div class="row justify-content-evenly"  >



                @for ($i = 0; $i < 10; $i++)
                <div class="col" style="margin-bottom: 70px">

                    <div class="card" style="width: 1100px;background:#eee;">
                        <a style="width: 800px;" href="{{route('blog.details', ['slug'=>Str::slug('Card title')])}}" >

                        <div class="row align-items-start">
                            <div class="col-md-4 ">
                                <img src="/assets/images/demo.jpg" class="rounded" alt="..."  style="height: 350px;margin-top: 10px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-subtitle"><small class="text-body-secondary">Created 3 mins ago</small></p>

                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. A dolorum adipisci magnam facilis, nam optio delectus reiciendis! Inventore dignissimos officiis aut illo nam dolore distinctio quae. Quis deleniti id incidunt dolorem, beatae cum quas molestiae sapiente temporibus aspernatur laborum eveniet error soluta voluptatem ratione at nemo maiores nisi dignissimos ullam aut ducimus dolor itaque accusamus. Ex eum animi rerum tenetur dignissimos incidunt maxime? Maxime veniam temporibus quasi culpa accusantium maiores nobis ut, tempora ipsum modi, nulla unde nisi labore sequi.
                                </p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>

                     </a>
                    </div>
                </div>

            @endfor



        </div>
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


