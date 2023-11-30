
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
          <div class="site-info ">
            <a href="#" style="font-size:smaller; font-weight: bold; color: rgba(155, 159, 176, 0.767);"><span class="mai-call "></span> +880 199 0000000</a>
            <span class="divider">|</span>
            <a href="#" style="font-size:smaller; font-weight: bold;color: rgba(155, 159, 176, 0.795);"><span class="mai-mail"></span> e.waste@gmail.com</a>
          </div>
        </div>
        <div class="col-sm-4 text-right text-sm">
          <div class="social-mini-button">
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

        <a class="navbar-brand" href="{{ route('home')}}"> <font class="mt-5" style="color: rgb(65, 255, 144); font-size: 50px; font-weight: bold;"> E-Waste </font>  </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog')}}">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Community</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('resources')}}">Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a style="background: rgb(65, 255, 144); color: rgb(0, 0, 0);font-size: 17px; margin-right: -30px" class="btn btn-info ml-lg-3" data-bs-toggle="modal" data-bs-target="#loginmodal" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a style="background: rgb(65, 255, 144); color: rgb(0, 0, 0);font-size: 17px;" class="btn btn-info ml-lg-3" data-bs-toggle="modal" data-bs-target="#signupmodal" href="login.php">Register</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>







{{-- --------------------------------------------------Login Modal---------------------------------------------------- --}}

<div class="modal fade centered" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">

        @include('modal.login')
        
      </div>

    </div>
  </div>
</div>



{{-- --------------------------------------------------Signup Modal---------------------------------------------------- --}}

<div class="modal fade centered" id="signupmodal" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">

        @include('modal.signup')
        
      </div>

    </div>
  </div>
</div>


