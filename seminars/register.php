<?php
    require_once("app.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fukuoka FTA | Submit Seminar Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fukuoka FTA Seminar Registration">


    <script src="../assets/vendor/pace-1.0.2/pace.min.js"></script>
    <link rel="stylesheet" href="../assets/vendor/pace-1.0.2/themes/blue/pace-theme-flash.css"/>

    <link rel="stylesheet" href="../assets/vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/vendor/Parsley.js-2.8.1/src/parsley.css">
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <?php include('../partials/header.php'); ?>
    <?php include('../partials/topnav.php'); ?>
    <div class="container">
        <div class="col-md-3">
            <?php include('../partials/leftnav.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-danger">
                <div class="panel-heading main-heading">
                    Seminar Registration Form
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger"><h4><strong>Feature under development. Thank you!</strong></h4></div>
                    <?php echo $error ?>
                    <?php echo $success ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-2 label-title">Title : </div>
                                <div class="col-md-4 label-content">
                                    <?php echo isset($_SESSION["registration"]['seminar_title']) ? $_SESSION["registration"]['seminar_title'] : "" ?>
                                </div> 

                                <div class="col-md-2 label-title">Date and Time : </div>
                                <div class="col-md-4 label-content">
                                    <?php echo isset($_SESSION["registration"]['seminar_datetime']) ? $_SESSION["registration"]['seminar_datetime'] : "" ?>
                                </div>
                            </div>  
                        
                            <div class="row">          
                                <div class="col-md-2 label-title">Place : </div>
                                <div class="col-md-4 label-content">
                                    <?php echo isset($_SESSION["registration"]['seminar_place']) ? $_SESSION["registration"]['seminar_place'] : "" ?>
                                </div>
                                                
                                <div class="col-md-2 label-title">Capacity : </div>
                                <div class="col-md-4 label-content">
                                    <?php echo isset($_SESSION["registration"]['seminar_capacity']) ? $_SESSION["registration"]['seminar_capacity'] : "" ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" name="frm-registration" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete='off' method="POST" data-parsley-validate>
                
                                <div class="form-group">
                                    <label for="name" class="control-label col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="name" class="form-control" autocomplete='name' data-parsley-required value="<?php echo $name ?>">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="company" class="control-label col-md-3">Company Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="company" name="company" class="form-control" autocomplete='organization' data-parsley-required  value="<?php echo $company ?>">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="telephone" class="control-label col-md-3">Telephone No.</label>
                                    <div class="col-md-9">
                                        <input type="text" id="telephone" name="telephone" class="form-control" autocomplete='tel' data-parsley-required data-parsley-minlength="6"	 value="<?php echo $telephone ?>">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="email" class="control-label col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="text" id="email" name="email" class="form-control" autocomplete='email' data-parsley-required data-parsley-type="email"  value="<?php echo $email ?>">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="submit" id="submit-registration" name="submit-registration" value="Submit Registration" class="btn btn-primary">
                                    </div>
                                </div>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../partials/footer.php'); ?>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/vendor/Parsley.js-2.8.1/dist/parsley.js"></script>
    <script src="../assets/js/javascripts.js"></script>
</body>
</html>