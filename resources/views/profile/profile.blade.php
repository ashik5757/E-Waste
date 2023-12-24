@extends('layout.app')


@section('title')
    E-Waste | #{{Auth::User()->username}}
@endsection


@section('more_link')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endsection


@section('content')


<div class="main-banner header-text" id="top" style=" background: linear-gradient(to bottom, #dffbf0 30%, #ffffff 93%);">

    <div class="container home-con">
        <div class="half1" style="margin-bottom: -160px">
            <h3 class="mt-5" style="color: rgb(47,155,92);font-size: 60px;">Profile Page</h3>
            <h1 class="mt-5"> <br><span class="txt"></span></h1>

        </div>


    </div>



</div>


<div class="container rounded bg-white mb-5">
    <div class="row">
        <div class="col-md-3 " style="margin-left: 5%">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="400px" src="/assets/images/pp.png">
                <span class="font-weight-bold fs-4" style="width:400px">{{$profile->firstname}} {{$profile->lastname}}</span>
                <span class="text-black-50 fs-5">{{$user->email}}</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-left" style="margin-left: 20%">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <form id="submitForm_profile" action="{{route('profile.update', ['user'=>Auth::User()->username])}}" method="post"
                    class="needs-validation-l" novalidate>
                    @csrf


                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="first name" value="{{$profile->firstname}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{$profile->lastname}}" placeholder="Last name" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" name="number" placeholder="enter phone number" value="{{$profile->number}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="email" class="form-control" name="email" placeholder="enter email id" value="{{$user->email}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Occupation</label>
                        <input type="text" class="form-control" name="occupation" placeholder="Education" value="{{$profile->occupation}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Enter Address</label>
                        <input type="text" class="form-control" name="address" placeholder="road no,area name" value="{{$profile->area}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Area</label>
                        <input type="text" class="form-control" name="area" placeholder="Rampura" value="{{$profile->area}}" required>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="labels">City</label>
                        <input type="text" class="form-control" placeholder="Dhaka" value="{{$profile->firstname}}">
                    </div> --}}
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                </div>

                </form>
            </div>
        </div>

    </div>
</div>




<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation-l')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

@endsection


