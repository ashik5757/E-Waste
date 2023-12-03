<section class="overlay">

    <div class="container mt-5">
      <div class="row">

  
        @if ($message = Session::get('success'))
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
              <button type="button" class="close font__size-18" data-dismiss="alert">
                                        <span aria-hidden="true"><a>
                        <i class="fa fa-times greencross"></i>
                        </a></span>
                                        <span class="sr-only">Close</span> 
                                    </button>
              <i class="start-icon far fa-check-circle faa-tada animated"></i>
              <strong class="font__weight-semibold">Success!</strong> {{$message}}
            </div>
          </div>
        @endif



        @if ($message = Session::get('info'))
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-info alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
              <button type="button" class="close font__size-18" data-dismiss="alert">
                                        <span aria-hidden="true">
                                            <i class="fa fa-times blue-cross"></i>
                                        </span>
                                        <span class="sr-only">Close</span>
                                    </button>
              <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
              <strong class="font__weight-semibold">Info!</strong> {{$message}}
            </div>
    
          </div>
        @endif

        @if ($message = Session::get('warning'))
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
              <button type="button" class="close font__size-18" data-dismiss="alert">
                                        <span aria-hidden="true">
                                            <i class="fa fa-times warning"></i>
                                        </span>
                                        <span class="sr-only">Close</span>
                                    </button>
              <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
              <strong class="font__weight-semibold">Warning!</strong> {{$message}}
            </div>
          </div>
        @endif

        @if ($message = Session::get('error'))
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
              <button type="button" class="close font__size-18" data-dismiss="alert">
                                        <span aria-hidden="true">
                                            <i class="fa fa-times danger "></i>
                                        </span>
                                        <span class="sr-only">Close</span>
                                    </button>
              <i class="start-icon far fa-times-circle faa-pulse animated"></i>
              <strong class="font__weight-semibold">ERROR!</strong> {{$message}}
            </div>
          </div>
        @endif
  
        {{-- @if ($message = Session::get('success'))
          <div class="col-sm-12">
            <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
              <button type="button" class="close font__size-18" data-dismiss="alert">
                                        <span  aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                                        <span class="sr-only">Close</span>
                                    </button>
              <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
              <strong class="font__weight-semibold">Well done!</strong> {{$message}}
            </div>
    
          </div>
        @endif --}}




  

  

  

  
      </div>
    </div>
  </section>