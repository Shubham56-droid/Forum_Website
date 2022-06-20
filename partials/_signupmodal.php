<?php
echo '<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success text-capitalize text-center w-100" id="exampleModalLabel">sign up to create account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center">
  
          <form class="d-flex flex-column w-75">
            
            <div class="mb-3">
              <label for="usernameinput" class="form-label text-muted">Username</label>
              <input type="text" class="form-control" id="usernameinput" >
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label text-muted">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
  
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label text-muted">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
              <label for="institution_college" class="form-label text-muted">Institution/College</label>
              <input type="text" class="form-control" id="institution_college" >
            </div>
  
            
            <button type="submit" class="btn btn-success my-4 text-capitalize">Sign up to create account</button>

            <div class="instruction text-muted">
            <p>By clicking "Sign Up", you agree to our <span class="link">terms of service</span>, <span class="link">privacy policy</span> and <span class="link">cookie policy</span>.</p>
          </div>

          </form>

          
  
  
        </div>
  
      </div>
    </div>
  </div>

';
?>