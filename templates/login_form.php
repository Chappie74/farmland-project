<!DOCTYPE html>
<html>
<head>
  <title>Log In or Sign Up</title>
  <link href="../public/css/bootstrap.css" rel="stylesheet"/>
  <link href="../public/css/styles.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="../public/js/jquery-1.10.2.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/scripts.js"></script>
  <script src="../public/js/login_script.js"></script>

  <style type="text/css">
        .modal {
        text-align: center;
        padding: 0!important;
      }

      .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
      }

      .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
      }
  </style>
</head>
<body background="../public/img/background/farmland1.png">


<script type="text/javascript">
    $(window).on('load',function(){
      $('#loginModal').modal({backdrop: 'static', keyboard: false})
        $('#loginModal').modal('show');
    });
</script>

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
          <br>
          <span class="right text-info">To continue to the site you must first log in or sign up. Thank you.</span>

        </div>
        <div class="modal-body">
          <div id="login_signup" class="tab-content">
              <div class="tab-pane fade active in" id="login">
                <form action="../public/login.php" method="post">

                  <div class="form-group">
                    <label for="username/email">Username/Email</label>
                    <input type="text" name="username" class="form-control" tabindex="1"  required="required" placeholder="Username/Email" />
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" tabindex="2" required="required" placeholder="Password" />
                  </div>

                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-primary btn-md" name="btn_type" value="login">Log In</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Sign up form -->
              <div class="tab-pane fade in" id="signup">
                <form action="../public/login.php" method="post">

                  <div class="row" id="basic_row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control signup" tabindex="1" required="required" placeholder="First Name" />
                      </div>

                      <div class="form-group">
                        <label for="lot_number">Lot Number</label>
                        <input type="text" name="lot_number" class="form-control signup" tabindex="3" required="required" placeholder="Lot Number" />
                      </div>

                      <div class="form-group">
                        <label for="town">Town</label>
                        <select class="form-control" name="town" id = "town" tabindex="5" onchange="changeValue();" >
                          <option value="">--SELECT--</option>
                          <option value="Anna Regina">Anna Regina</option>
                          <option value="Bartica">Bartica</option>
                          <option value="Corriverton">Corriverton / New Amsterdamn </option>
                          <option value="Fort Wellington">Fort Wellington / Rosignol</option>
                          <option value="Georgetown">Georgetown </option>
                          <option value="Lethem">Lethem</option>
                          <option value="Linden">Linden</option>
                          <option value="Mabaruma">Mabaruma</option>
                          <option value="Mahdia">Mahdia</option>
                        </select>
                        </div>
                        <br>
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control signup" tabindex="7" required="required" placeholder="eg. XXX-XXX-XXXX" />
                      </div>

                      <div class="text-warning">Fill out all field to continue.</div>
                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control signup" tabindex="2" required="required" placeholder="Last Name" />
                      </div>

                      <div class="form-group">
                        <label for="address_line">Address Line</label>
                        <input type="text" name="address_line" class="form-control signup" tabindex="4" required="required" placeholder="Address Line" />
                      </div>

                      <div class="form-group">
                        <div class = "col-md-13">
                        <label for="region">Region</label>
                        </div>

                        <div class = "col-md-3">
                        <input type ="text" class ="form-control" tabindex = "6" name="region" id ="region" value ="" />
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-1">
                          <div id="next_btn" class="btn btn-info btn-md " tabindex="8">Next</div>
                        </div>
                        <div class="col-md-2"></div>
                      </div>

                    </div>
                  </div>

                  <div class="tab-pane fade in hidden" id="address">
                    <div class="row">
                        <div class="col-md-6">

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control signup" required="required" placeholder="Email" />
                          </div>

                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control signup " required="required" placeholder="Username" />
                          </div>
                        </div>

                        <div class="col-md-6">


                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id = "password" name="password" class="form-control signup" required="required" placeholder="Password" />

                          </div>
                          <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id = "con_pass" name="confirm_password" class="form-control signup" required="required" placeholder="Confirm Password" />
                            <span class="text-danger"  id = "pass_no_match">Password does not match</span>
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                              <div id="back_btn" class="btn btn-info btn-md">Back</div>
                            </div>
                            <div class="col-md-6">
                              <div class="text-warning">Fill out all field to continue.</div>
                            </div>
                        </div>

                    </div>
                  </div>

                  <br><br>
                  <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                      <button type="submit" value="signup" name="btn_type" id="signup_submit" disabled="true" class="btn btn-primary btn-md " >Sign Up</button>
                    </div>
                  </div>

                </form>
              </div>

          </div>

      </div>

    </div>
  </div>

</body>
<script type="text/javascript">
                function changeValue(){
                    var option=document.getElementById('town').value;

                    if(option=="Anna Regina"){
                      document.getElementById('region').value="2";
                    }
                    else if(option=="Bartica"){
                      document.getElementById('region').value="7";

                      }
                      else if(option=="Corriverton"){
                        document.getElementById('region').value="6";

                        }
                        else if(option=="Fort Wellington"){
                          document.getElementById('region').value="5";

                          }
                          else if(option=="Georgetown"){
                            document.getElementById('region').value="4";

                            }
                            else if(option=="Lethem"){
                              document.getElementById('region').value="9";

                              }
                              else if(option=="Linden"){
                                document.getElementById('region').value="10";

                                }
                                else if(option=="Mabaruma"){
                                  document.getElementById('region').value="1";

                                  }
                                  else if(option=="Mahdia"){
                                    document.getElementById('region').value="8";

                                    }
                                  }
            </script>
</html>
