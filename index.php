<?php require('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Demo Project using Bootstrap</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php 
      $qry = "SELECT * FROM user WHERE user_id = 1";
      $result = mysqli_query($con,$qry);
      $lst = mysqli_fetch_assoc($result);

 ?>

<?php if(isset($_REQUEST['success']) && $_REQUEST['success'] == 'true'){ ?>
<div class="alert alert-danger">
   Registration Done !
</div>
<?php } ?>

<?php if(isset($_REQUEST['password']) && $_REQUEST['password'] == 'false'){ ?>
<div class="alert alert-danger">
   Password not matched  !
</div>
<?php } ?>

<div class="container">
            <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="process.php">
              <input type="text" name="user_id" value="1">
                <h2>Registration</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                      <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control" autofocus  value="<?php if(isset($lst['first_name'])) { echo $lst['first_name']; } ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control" autofocus value="<?php if(isset($lst['last_name'])) { echo $lst['last_name']; } ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php if(isset($lst['email'])) { echo $lst['email']; } ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php if(isset($lst['password'])) { echo $lst['password']; } ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" id="conpassword" name="conpassword" placeholder="Password" class="form-control" value="<?php if(isset($lst['password'])) { echo $lst['password']; } ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-9">
                        <input type="number" id="phone" name="phone" placeholder="Phone number" class="form-control" value="<?php if(isset($lst['phone_no'])) { echo $lst['phone_no']; } ?>">
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="service" class="col-sm-3 control-label">Services </label>
                    <div class="col-sm-9">
                        <select name="service" id="service" class="form-control">
                          <option value="">Select One</option>
                          <option <?php if(isset($lst['service']) && $lst['service'] == 'Web Service') { ?> selected  <?php } ?> value="Web Service">Web Service</option>
                          <option <?php if(isset($lst['service']) && $lst['service'] == 'Live Project Training') { ?> selected  <?php } ?> value="Live Project Training">Live Project Training</option>
                        </select>
                        
                    </div>
                </div>
                
                 
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" name="gender" <?php if(isset($lst['gender']) && $lst['gender'] == 'female') { ?> checked <?php } ?> value="female"> Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" name="gender" <?php if(isset($lst['gender']) && $lst['gender'] == 'male') { ?> checked <?php } ?> value="male"> Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <?php
                if(isset($lst['user_id'])){
                  $value = "update";
                }
                else{
                  $value = "submit";
                }?>
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="<?php echo $value; ?>" >  
            </form> <!-- /form -->
        </div> <!-- ./container -->
        <br>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>