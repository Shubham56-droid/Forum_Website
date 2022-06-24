<?php
echo '<!-- Button trigger modal -->

<!-- Modal -->

  <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success text-capitalize text-center w-100" id="exampleModalLabel">Login To Your Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center">
  
          <form class="d-flex flex-column w-75" action="/forums/partials/_handleLogin.php" method="post">
            
            <div class="mb-3">
              <label for="usernameinput" class="form-label text-muted">Email</label>
              <input type="email" class="form-control" id="loginemail" name="loginemail" required/>
            </div>
  
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label text-muted">Password</label>
              <input type="password" class="form-control" id="loginpassword" name="loginpassword" required/>
            </div>
  
            
            
          <button type="submit" class="btn btn-success my-4">Login to continue</button>
          </form>
          
          <p>Don\'t have an account ?<a style="cursor:pointer; color:rgb(46, 161, 0);" id="createone"> Create One</a></p>
  
        </div>
  
      </div>
    </div>
  </div>

';
?>