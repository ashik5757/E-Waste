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

            <a href="{{route('blog.create', ['user'=>Auth::User()->username])}}">
                <input style="margin-top: 100px" type="button" value="Create Now" class="button_uv1">
            </a>

        </div>
    </div>






</div>



<div class="container" >
    <div class="row justify-content-evenly">

{{-- 
        <div style="margin-left: auto; font-size: 22px;">
            <form action="" method="get">
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="blog">Blog</option>
                    <option value="product">Product</option>
                    <option value="resource">Resource</option>
                </select>
            
                <button class="button_uv1" type="submit" style="width:100px; font-size: 12px; padding: 8px 12px;">Filter</button>
            </form>
        </div>

        <br><br> --}}



                @foreach ($blogs as $blog)

                    <div class="col" style="margin-bottom: 70px">

                        <div class="card" style="width: 1000px; height:fit-content;background:#eee; padding:40px">
                            <a style="width: 800px;" href="{{route('blog.details', ['id'=>$blog->id, 'slug'=>Str::slug($blog->title)])}}" >

                                <div class="row align-items-start">
                                    <div class="col-md-4 ">

                                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($blog->blog_image as $key => $image)
                                                <div class="carousel-item @if ($key === 0) active @endif" style="margin-top: 50px">
                                                    <img src="{{asset('storage/'.$image->image)}}" class="rounded" alt="blog_images"  style="height: 180px; margin-top: 10px;">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">{{$blog->title}}</h5>
                                        <p class="card-subtitle"><small class="text-body-secondary">Created at {{ $blog->created_at->format('h:i A | d F, Y') }}</small></p>

                                        <p class="card-text">{{$blog->description}}</p>
                                        
                                        <p class="card-text"><small class="text-body-secondary">Last Updated {{ $blog->updated_at->diffInMinutes(now()) }} mins ago</small></p>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                @endforeach



        </div>
    </div>
</div>












@endsection


