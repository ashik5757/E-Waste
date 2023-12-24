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
            <h3 class="mt-5" style="color:rgb(47,155,92);font-size: 40px;">Thread Details</h3>
        </div>
    </div>
</div>





<div class="container" style="margin-bottom: 50px; margin-top: 70px ">

    <div class="card-body" style="background:#d3f5df9d; border-radius: 10px;">
      <h3 class="card-title">#{{$thread->user->username}}</h3>
      <p class="card-subtitle"><small class="text-body-secondary">Created at {{ $thread->created_at->format('h:i A | d F, Y') }}</small></p>
      <p class="card-text" style="margin-top: 30px; font-size:22px">{!! nl2br($thread->question) !!}</p>
    </div>
    <p class="card-text"><small class="text-body-secondary">Last Updated {{ $thread->updated_at->diffInMinutes(now()) }} mins ago</small></p>

    @if (Auth::User()->id == $thread->user_id)
    <div class="button-container">
      <a class="update_button" href="{{route('thread.edit', ['thread_id'=>$thread->id])}}">
        <svg id="Layer_1" class="svgIcon" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M19.607,18.746c0,0.881-0.716,1.624-1.597,1.624H5.231c-0.881,0-1.597-0.743-1.597-1.624V5.967c0-0.881,0.716-1.571,1.597-1.571h7.454V3.332H5.231c-1.468,0-2.662,1.168-2.662,2.636v12.778c0,1.468,1.194,2.688,2.662,2.688h12.778c1.468,0,2.662-1.221,2.662-2.688v-7.428h-1.065V18.746z" stroke-width="2" />
          <path d="M20.807,3.17c-0.804-0.805-2.207-0.805-3.012,0l-7.143,7.143c-0.068,0.068-0.117,0.154-0.14,0.247L9.76,13.571c-0.045,0.181,0.008,0.373,0.14,0.506c0.101,0.101,0.237,0.156,0.376,0.156c0.043,0,0.086-0.005,0.129-0.016l3.012-0.753c0.094-0.023,0.179-0.072,0.247-0.14l7.143-7.143c0.402-0.402,0.624-0.937,0.624-1.506S21.21,3.572,20.807,3.17z M13.016,12.467l-2.008,0.502l0.502-2.008l5.909-5.909l1.506,1.506L13.016,12.467z M20.054,5.428l-0.376,0.376l-1.506-1.506l0.376-0.376c0.402-0.402,1.104-0.402,1.506,0c0.201,0.201,0.312,0.468,0.312,0.753C20.366,4.96,20.255,5.227,20.054,5.428z" stroke-width="2" />
        </svg>            
      </a>
    
      <a href="#" onclick="confirmDelete({{ $thread->id }})" class="delete_button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svgIcon">
            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
        </svg>
      </a>
    </div>
    @endif

    <br>


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
            <button type="submit" class="btn btn-xs pl-3 pe-3" style="background:rgb(47,155,92);color:white">Answer</button>

        </form>

        <!-- Display existing answers -->
        @if($thread->answers->count() > 0)
            <h4 class="mt-4">Answers</h4>
            <ul class="list-group">
                @foreach($thread->answers as $answer)
                    <li class="list-group-item"><b>#{{$answer->user->username}}</b> 
                        <small class="text-body-secondary">{{ $answer->updated_at->diffInMinutes(now()) }} mins ago</small>
                        : {{ $answer->answer }} 
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-4">No answers yet. Be the first to answer!</p>
        @endif
    </div>


</div>






<script>
    function confirmDelete(featureid) {
        if (confirm("Are you sure you want to delete this blog post?")) {
            window.location.href = "{{ route('thread.delete', ['id' => ':id']) }}".replace(':id', featureid);
        }
    }
  </script>





@endsection


