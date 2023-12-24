@extends('layout.app')


@section('title')
    E-Waste | Community Forum
@endsection


@section('more_link')
    <link rel="stylesheet" href="{{ asset('assets/css/blog_details.css') }}">
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">
    <div class="container home-con">
        <div class="half1">
            <h3 class="mt-5" style="color:rgb(47,155,92);font-size: 30px;">Thread Details</h3>
        </div>
    </div>
</div>



<div class="container">

    <div class="card-body" style="background:#d3f5df9d;margin-bottom: 70px; border-radius: 10px;">
      <h2 class="card-title">Question</h2>
      <p class="card-text" style="margin-top: 30px">{!! nl2br($thread->question) !!}</p>
    </div>
    <div class="container mt-5">
        <h3 class="mb-4">Answer Section</h3>

        <!-- Form to add a new answer -->
        <form id="answerForm" action="{{ route('community.addAnswer', ['thread' => $thread]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="answer" class="form-label">Your Answer</label>
                <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                <div class="invalid-feedback">
                    This field is required.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Answer</button>
        </form>

        <!-- Display existing answers -->
        @if($thread->answers->count() > 0)
            <h5 class="mt-4">Existing Answers</h5>
            <ul class="list-group">
                @foreach($thread->answers as $answer)
                    <li class="list-group-item">{{ $answer->answer }}</li>
                @endforeach
            </ul>
        @else
            <p class="mt-4">No answers yet. Be the first to answer!</p>
        @endif
    </div>


</div>


@endsection


