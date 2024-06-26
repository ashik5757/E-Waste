

<div class="pt-2 mx-4">
    <div class="container">
        <div class="row">
            <div class="col-md-15 mx-auto">

                <h1>Signup</h1>


                <form id="submitForm_signup_1" action="{%url 'sign_up_landlord' %}" method="post"
                    class="row g-3 needs-validation-l" novalidate>
                    

                    <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" value=""
                                pattern="[a-zA-Z\s]{2,}" maxlength="20" required>
                            <label for="firstname">First Name</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"
                                pattern="[a-zA-Z\s]{2,}" maxlength="20" value="" required>
                            <label for="lastname">Last Name</label>
                            <div class="invalid-feedback">
                                This field is required.
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone (Ex:01XXXXXXXXX)" pattern="^\d{11}$"
                                value="" required>
                            <label for="phone">Phone</label>
                            <div class="invalid-feedback">
                                Invalid phone number.
                            </div>
                        </div>



                        <div class="col form-floating">
                            <input type="text" class="form-select" id="area" name="area" list="area_list" placeholder="Enter your Area" required>
                            <datalist id="area_list">

                            </datalist>
                            <label for="area">Area</label>
                            <div class="invalid-feedback">
                                Invalid Area-name.
                            </div>
                        </div>
                    </div>


                    <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="username"
                                pattern="[a-z0-9]{5,}" value="" required>
                            <label for="username">User Name</label>
                            <div class="invalid-feedback">
                                Invalid Username.
                            </div>
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value=""
                                required>
                            <label for="email">Email</label>
                            <div class="invalid-feedback">
                                Invalid Email.
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="15" value=""
                                onchange="form.confirmpassword.pattern = RegExp.escape(this.value);" required>
                            <label class="floatingInput" for="password">Password</label>
                            <div class="invalid-feedback">
                                Password must contain 6 to 15 characters including Uppercas,lowercase and numbers.
                            </div>
                        </div>

                        <div class="col form-floating mb-3">
                            <input type="password" class="form-control" required="" id="confirmpassword" name="confirmpassword"
                                placeholder="password" maxlength="15" value="" required>
                            <label class="floatingInput" for="confirmpassword">Confirm Password</label>
                            <div class="invalid-feedback">
                                Invalid Password (Must be same)
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-1">
                        <button class="btn btn-signup-custom btn-block" style="width:100%" type="submit">Create
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