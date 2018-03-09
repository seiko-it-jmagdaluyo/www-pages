<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fukuoka FTA | Seminar Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <form action="register.php" method="POST">
        <input type="hidden" name="seminar_id" value="<?php echo isset($_GET['content_id']) ? $_GET['content_id'] : ''; ?>">
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>