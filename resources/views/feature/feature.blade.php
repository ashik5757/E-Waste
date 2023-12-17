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
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Exclusive Features Here</h3>
            <span class="txt mt-3">You can see the creative the World, crafting through several wastes product to many usefull items </span>
            <h3 class="mt-3">You can post your creative crafting here!!</h3>

            <a href="{{route('feature.create', ['user'=>Auth::User()->username])}}">
                <input style="margin-top: 100px" type="button" value="Add Feature" class="button_uv1">
            </a>
        </div>
    </div>



</div>



<div class="container" style="margin-left: 10px">

    <div class="row" style="width: 1600px;margin-left:26%;margin-bottom:70px">


        @foreach ($features as $feature)
            
        <div class="text-center border rounded" style="margin:20px; margin-top:70px; width: 450px;">

            <h5 class="card-title" style="margin-top:20px">{{$feature->title}}</h5>


            @php
                $thumbnailPath = public_path('storage/'.$feature->thumbnail);
                $defaultImagePath = '/assets/images/No_thumbnail_2.jpg';
            @endphp

            @if(file_exists($thumbnailPath))
                <img src="{{ asset('storage/'.$feature->thumbnail) }}" class="img-fluid rounded-start" alt="Feature Image" style="width: 390px; height: 250px">
            @else
                <img src="{{ asset($defaultImagePath) }}" class="img-fluid rounded-start" alt="Default Image" style="width: 390px; height: 250px">
            @endif

            {{-- <img src="{{asset('storage/'.$feature->thumbnail)}}" class="img-fluid rounded-start" alt="" style="width: 390px; height:250px" > --}}
            <p class="card-text">{{$feature->description}}</p>
            <a href="{{route('feature.details', ['id'=>$feature->id, 'slug'=>Str::slug($feature->title)])}}" class="btn btn-info" style="background-color: rgb(47,155,92); width: 390px;" > Watch now </a>

            

            <p class=" text-muted">
                {{-- <small>Created at {{ $feature->created_at->format('h:i A | d F, Y') }}</small> --}}
            
                @php
                    $min = $feature->created_at->diffInMinutes(now());
                    $hour = floor($min/60);
                    $day = floor($hour/24);
                @endphp
            
                
                <small class="text-body-secondary">Created at 
                    
                    @if ($day>0)
                        {{ $day }} {{ Str::plural('day', $day) }}     
                    @elseif($hour>0)
                        {{ $hour }} {{ Str::plural('hour', $hour) }}
                    @else
                        {{ $min }} {{ Str::plural('mins', $min) }}
                    @endif
        
                    ago
        
                </small>
            
            </p>
        </div>
        @endforeach



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


