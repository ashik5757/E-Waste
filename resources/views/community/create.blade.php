@extends('layout.app')


@section('title')
    E-Waste | Community Forum
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/blogsite.css') }}">
    
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1">
            <h3 style="color: rgb(47,155,92);font-size: 60px;">Community Forum</h3>
            <span class="txt mt-3">Exploring the World Through Words</span>
            <h3 class="mt-3">You can ask your questions here</h3>
        </div>
    </div>
</div>


<div class="container mt-5">
    <h3>Create a New Post</h3>

    <form id="postForm" action="{{ route('community.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
            <div class="invalid-feedback">
                    This field is required.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>

@endsection

