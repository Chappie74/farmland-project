
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">Open Modal</button>


<!-- Modal -->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">  

          <ul class="nav nav-tabs">
            <li class="active"><a href="#login" data-toggle="tab" aria-expanded="false">Log In</a></li>
            <li class=""><a href="#signup" data-toggle="tab" aria-expanded="true">Sign Up</a></li> 
          </ul>

        </div>
        <div class="modal-body">
          <div id="login_signup" class="tab-content">
              <div class="tab-pane fade active in" id="login">
                <form action="../public/login.php" method="POST">

                  <div class="form-group">
                    <label for="username/email">Username/Email</label>
                    <input type="text" name="username" class="form-control" required="required" placeholder="Username/Email" />
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" required="required" placeholder="Password" />
                  </div>

                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-primary btn-md">Log In</button>
                    </div>
                  </div>                 
                </form>
              </div>

              <!-- Sign up form -->
              <div class="tab-pane fade in" id="signup">
                <form action="../public/login.php" method="POST">

                  <div class="row" id="basic_row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" required="required" placeholder="First Name" />
                      </div>

                      <div class="form-group">
                        <label for="lot_number">Lot Number</label>
                        <input type="text" name="lot_number" class="form-control" required="required" placeholder="Lot Number" />
                      </div>                      

                      <div class="form-group">
                        <label for="town">Town</label>
                        <input type="text" name="town" class="form-control" required="required" placeholder="Town" />
                      </div>
      
                    </div>
                    
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required="required" placeholder="Last Name" />
                      </div>

                      <div class="form-group">
                        <label for="address_line">Address Line</label>
                        <input type="text" name="address_line" class="form-control" required="required" placeholder="Address Line" />
                      </div>                          

                      <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" name="region" class="form-control" required="required" placeholder="Region" />
                      </div>

                      <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-2">
                          <div id="next_btn" class="btn btn-default">Next</div>
                        </div>
                      </div>

                    </div>                   
                  </div>                  

                  <div class="tab-pane fade in hidden" id="address">
                    <div class="row">
                        <div class="col-md-6">

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" required="required" placeholder="Email" />
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" required="required" placeholder="password" />
                          </div>

                          <div class="row">
                            <div class="col-md-2">
                              <div id="back_btn" class="btn btn-default">Back</div>                              
                            </div>
                            <div class="col-md-9"></div>
                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required="required" placeholder="username" />
                          </div>

                          <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="text" name="confirm_password" class="form-control" required="required" placeholder="Confirm Password" />
                          </div>

                        </div>
                    </div> 
                  </div>

                  <br><br>
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                      <button type="submit"  class="btn btn-primary btn-md">Sign Up</button>
                    </div>
                  </div>  

                </form>
              </div>

          </div>          	
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>


  