<?php
    $submitted = isset($_POST['register']) ? true : false; 
    if($submitted){
        $id = isset($_POST['seminar_id']) ? $_POST['seminar_id'] : "";
        if(!$id){
            header( "refresh:5;url=index.php" ); 
            echo 'You\'ll be redirected in about 5 secs. Seminar id is empty. Contact web admin.';
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fukuoka FTA | Submit Seminar Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fukuoka FTA Seminar Registration">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
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
                <div class="panel-heading">
                    Seminar Registration Form
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" name="frm-registration" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        
                        <div class="form-group">
                            <label for="name" class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="company" class="control-label col-md-3">Company Name</label>
                            <div class="col-md-9">
                                <input type="text" name="company" class="form-control">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="telephone" class="control-label col-md-3">Telephone No.</label>
                            <div class="col-md-9">
                                <input type="text" name="telephone" class="form-control">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="submit-registration" value="Submit Registration" class="btn btn-primary">
                            </div>
                        </div>
        
                    </form>
                    <div class="alert alert-danger"><h3><strong>Feature under development. Thank you!</strong></h3></div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script src="../assets/vendor/Respond/dest/respond.min.js"></script>
    <script src="../assets/js/javascripts.js"></script>
</body>
</html>