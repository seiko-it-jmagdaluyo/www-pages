<?php
    require_once('../includes/connection.php');
    require_once('../includes/validations.php');
    require_once('../includes/functions.php');

    session_start();

    $submitted  = isset($_POST['register']) ? true : false; 
    $name       = isset($_POST["name"]) ? $_POST["name"] : "";
    $company    = isset($_POST["company"]) ? $_POST["company"] : "";
    $telephone  = isset($_POST["telephone"]) ? $_POST["telephone"] : "";
    $email      = isset($_POST["email"]) ? $_POST["email"] : "";
    $errorMsg = "";
    $error = "";
    $successMsg = "";
    $success = "";

    if($submitted){
        
        $id                 = isset($_POST['seminar_id']) ? $_POST['seminar_id'] : "";
        $seminar_title      = isset($_POST['seminar_title']) ? $_POST['seminar_title'] : "";
        $seminar_datetime   = isset($_POST['seminar_datetime']) ? $_POST['seminar_datetime'] : "";
        $seminar_place      = isset($_POST['seminar_place']) ? $_POST['seminar_place'] : "";
        $seminar_capacity   = isset($_POST['seminar_capacity']) ? $_POST['seminar_capacity'] : "";

        $_SESSION["registration"]["seminar_id"] = $id;
        $_SESSION["registration"]["seminar_title"] = $seminar_title;
        $_SESSION["registration"]["seminar_datetime"] = $seminar_datetime;
        $_SESSION["registration"]["seminar_place"] = $seminar_place;
        $_SESSION["registration"]["seminar_capacity"] = $seminar_capacity;

        if(!$id){
            header( "refresh:5;url=index.php" ); 
            $errorMsg =  "No seminar selected. You'll be redirected in about 5 seconds. ";
        }

    }else{

        $submit_registration = isset($_POST["submit-registration"]) ? $_POST["submit-registration"] : "";

        if($submit_registration){
            validate_presences(['name', 'company', 'telephone', 'email']);
            validate_min_lengths(["telephone"=>"6"]);
            validate_email($email);
            try {
                $stmt = $conn->prepare("INSERT INTO seminar_registration (`seminar_id`, `name`, `company`, `telephone`, `email`, `added_dt`) VALUES (?, ?, ?, ?, ?, ?)");
                // $stmt->bind_param();
                $now = date("Y-m-d H:i:s");
                $stmt->execute([$_SESSION["registration"]["seminar_id"], $name, $company, $telephone, $email, $now]);

                $name       = "";
                $company    = "";
                $telephone  = "";
                $email      = "";
                $_POST = $_POST = array();

                $successMsg = "Registration successful! Thank you.";

            } catch (PDOException $e) {

                $existingkey = "Integrity constraint violation: 1062 Duplicate entry";
                if (strpos($e->getMessage(), $existingkey) !== FALSE) {
                    $errors['integrity'] =  $e->getMessage();
                } else {
                    $errors['exception'] = $e;
                }
            }
        }else{

            header( "refresh:5;url=index.php" ); 
            $errorMsg =  "No seminar selected. You'll be redirected in about 5 seconds. ";
            $_SESSION["registration"] = [];

        }
    }
    
    if($errorMsg){
        $error = "<div class='alert alert-danger alert-dismissible'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>$errorMsg</strong>
                </div>";
    }else{
        $error = "";
    }
    if($successMsg){
        $success = "<div class='alert alert-successalert-dismissible'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>$successMsg</strong>
                    </div>";
    }else{
        $success = "";
    }

    if (!empty($errors)) {
        $error = form_errors($errors);
    }