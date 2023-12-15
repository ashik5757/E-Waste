
  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
  </div>
<!-- ***** Preloader End ***** -->




  <div class="topbar ">
    <div class="container">
      <div class="row ">
        <div class="col-sm-8 text-sm ">
          <div class="site-info " style="font-size:15px;font-weight:bold">
            <a href="#" style="color: rgba(148, 149, 153, 0.536);"><span class="mai-call "></span> +880 199 0000000</a>
            <span class="divider" style="color: rgba(148, 149, 153, 0.536);">|</span>
            <a href="#" style="color: rgba(148, 149, 153, 0.536);"><span class="mai-mail"></span> E.waste@gmail.com</a>
          </div>
        </div>
        <div class="col-sm-4 text-right text-sm">
          <div class="social-mini-button"
          style="font-size:18px;color:rgba(148, 149, 153, 0.767);">
            <a href="#"><span class="fab fa-facebook"></span></a>
            <a href="#"><span class="fab fa-twitter"></span></a>
            <a href="#"><span class="fab fa-whatsapp"></span></a>
            <a href="#"><span class="fab fa-instagram"></span></a>
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container -->
  </div> <!-- .topbar -->

  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">

        <a class="navbar-brand" href="{{ route('home')}}"> <span class="mt-5" style="color: rgb(47,155,92); font-size: 50px; font-weight: bold;"> E-Waste </span>  </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item " >
              <a class="nav-link" style="font-size: 16px;font-weight:bold" href="{{ route('home')}}">&#127968;Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="font-size: 16px;font-weight:bold" href="{{ route('blog')}}">&#128220;Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" style="font-size: 16px;font-weight:bold" href="#">&#128172;Community</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" style="font-size: 16px;font-weight:bold" href="{{route('resources')}}">&#127804;Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="font-size: 16px;font-weight:bold" href="{{ route('about')}}">&#127774;About Us</a>
            </li>

            @guest
              <li class="nav-item">
                <a style="background: rgb(47,155,92); color: rgb(0, 0, 0);font-size: 17px; margin-right: -30px;font-weight:bold" class="btn btn-info ml-lg-3" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</a>
              </li>

              <li class="nav-item">
                <a style="background: rgb(47,155,92); color: rgb(0, 0, 0);font-size: 17px;font-weight:bold" class="btn btn-info ml-lg-3" data-bs-toggle="modal" data-bs-target="#signupmodal">Register</a>
              </li>
            @endguest

            @auth
              <li class="nav-item">
                {{-- @if ({{Auth::User()->profilePic}})
                <img src="{{Auth::User()->profilePic}}" alt="profile pic">
                @else

                @endif --}}

                <img src="/assets/images/pp.png" style="width:30px;height:30px"  alt="profile pic">
                <a class="nav-link" style="font-size: 14px;font-weight:bold" href="{{route('profile', ['id'=>Auth::User()->id])}}">#{{Auth::User()->username}}</a>
              </li>

              <li class="nav-item">
                <a style="background: rgb(47,155,92); color: rgb(0, 0, 0);font-size: 17px; font-weight:bold" class="btn btn-info ml-lg-3" href="{{route('logout')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  </form>

              </li>
            @endauth


          </ul>
        </div>
      </div>
    </nav>
  </header>



  @if(Session::get('show_login_modal'))
    <script>
        $(document).ready(function(){
            $('#loginmodal').modal('show');
        });
    </script>
  @endif



{{-- --------------------------------------------------Login Modal---------------------------------------------------- --}}

<div class="modal fade centered" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="background:#eeeeee81;">

        @include('modal.login')

      </div>

    </div>
  </div>
</div>



{{-- --------------------------------------------------Signup Modal---------------------------------------------------- --}}

<div class="modal center " id="signupmodal" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true" style="margin-left: 100px">
  <div class="modal-dialog" style="margin-left: 24%">
    <div class="modal-content" style="width:1000px;height:700px;margin-right: 100px">

      <div class="modal-body" style="background:#eeeeee81; width:1000px;height:700px;margin-right: 100px">

        @include('modal.signup')

      </div>

    </div>
  </div>
</div>


