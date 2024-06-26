
<div class="pt-2 mx-4">
    <div class="container">
        <div class="row">
            <div class="col mx-auto">
                    <h2>Login</h2>
                    <form id="submitForm" action="{%url 'sign_in' %}" method="post" class="row g-3 needs-validation" novalidate>

                        <div class="form-group required">
                            <lSabel for="username">Username / Email</lSabel>
                            <input type="text" class="form-control text-lowercase" id="username" name="username_email" minlength="5"  value="" required>
                            
                            <div class="invalid-feedback">
                                Invalid Username or Email.
                            </div>
                        </div>

                        <div class="form-group required">

                            <label class="d-flex flex-row align-items-center" for="password">Password </label>

                            <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="15" value="" required>
                            <div class="invalid-feedback">
                                Password must contain 6 to 15 characters.
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me"
                                    name="remember-me" data-parsley-multiple="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me?</label>
                            </div>
                        </div>
                        <div class="form-group pt-1">
                            <button class="btn btn-login-custom btn-block" style="width:100%" type="submit" >Log In</button>
                        </div>
                    </form>
                    <p class="small-xl pt-3 text-center">
                        <a class="ml-auto border-link small-xl"  data-bs-toggle="modal" data-bs-target="#forgot_pass" href="">Forgotten password?</a>
                    </p>
                    <p class="small-xl pt-3 text-center">
                        <span class="text-muted">Not a member?</span>
                        <a class="sign-up-link" data-bs-toggle="modal" data-bs-target="#signupModal_base" href="{% url 'signup_base' %}">Sign up</a>
                    </p>
                    
                    <p class="small-xl text-center">
                        <span class="text-muted">Login as an </span>
                        <a class="admin-link" href="{% url 'admin:index' %}">Admin</a>
                    </p>
            </div>
        </div>
    </div>
</div>


<script>
    (() => {
        'use strict'
      
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
      
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








