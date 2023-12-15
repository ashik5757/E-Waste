

<div class="pt-2 mx-4" style="background:#eee;">
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">
                <span class="mt-5" style="color: rgb(47,155,92); font-size: 50px; font-weight: bold;">E-Waste </span>

                <h1>Signup</h1><br>


                <form id="submitForm_signup_1" action="{{route('signup')}}" method="post"
                    class="row g-3 needs-validation-l" novalidate>

                    @csrf

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="firstname" style="margin-left: 10px"><b>First Name</b></label><br>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" value=""
                                pattern="[a-zA-Z\s]{2,}" maxlength="20" required >

                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="lastname" style="margin-left: 10px"><b>Last Name</b></label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"
                                pattern="[a-zA-Z\s]{2,}" maxlength="20" value="" required>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="phone" style="margin-left: 10px"><b>Phone</b></label>
                            <input type="text" class="form-control" id="phone" name="number" placeholder="Phone (Ex:01XXXXXXXXX)" pattern="^\d{11}$"
                                value="" required>
                            <div class="invalid-feedback">
                                Invalid phone number.
                            </div>
                        </div>



                        <div class="col mb-3">
                            <label for="area" style="margin-left: 10px"><b>Area</b></label>
                            <input type="text" class="form-select" id="area" name="area" list="area_list" placeholder="Enter your Area" required>
                            <datalist id="area_list">
                                <option value="Dhaka">Dhaka</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="khulna">khulna</option>
                            </datalist>
                            <div class="invalid-feedback">
                                Invalid Area-name.
                            </div>
                        </div>
                    </div>


                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="username" style="margin-left: 10px"><b>User Name</b></label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username"
                                pattern="[a-z0-9]{5,}" value="" required>
                            <div class="invalid-feedback">
                                Invalid Username.
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="email" style="margin-left: 10px"><b>Email</b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value=""
                                required>
                            <div class="invalid-feedback">
                                Invalid Email.
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label class="floatingInput" for="password" style="margin-left: 10px"><b>Password</b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="15" value=""
                                onchange="form.confirmpassword.pattern = RegExp.escape(this.value);" required>
                            <div class="invalid-feedback">
                                Password must contain 6 to 15 characters including Uppercas,lowercase and numbers.
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label class="floatingInput" for="password_confirmation" style="margin-left: 10px"><b>Confirm Password</b></label>
                            <input type="password" class="form-control" required="" id="password_confirmation" name="password_confirmation"
                                placeholder="password" maxlength="15" value="" required>
                            <div class="invalid-feedback">
                                Invalid Password (Must be same)
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-1">
                        <button class="btn btn-signup-custom btn-block" style="margin-left: 20%;width:60%;background: rgb(47,155,92);color:azure" type="submit">Create
                            Account</button>
                    </div>

                </form>
                <!-- </div> -->
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

<script>
    // polyfill for RegExp.escape
    if (!RegExp.escape) {
        RegExp.escape = function (s) {
            return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
        };
    }

</script>
