<?php

    if (isset($_POST["email"])){

        extract($_POST);
        if(empty($email) or empty($password) or empty($names)){
            return;
        }
        else{
            require 'db.php';
            $password = md5($password);
            $sql ="INSERT INTO `users`(`id`, `names`, `email`, `password`) VALUES 
                                        (null,'$names','$email','$password')";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $message="Registration successful";
            header("location:login.php");
        }


}


?>







<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">


                    <!--start of card header-->
                    <div class="card-header">
                        <h3 class="text-center">Register</h3>
                    </div>
                    <!--end of card header-->


                    <!--start of card body-->
                    <?php

                    if (isset($message)){
                        echo "<p class='text-center text-success'>$message</p>";
                    }

                    ?>
                    <div class="card-body">
                        <form action="register.php" method="post">

                            <div class="form-group">
                                <label>Full names</label>
                                <input type="text" class="form-control" name="names">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button class="btn btn-secondary btn-block">Sign up</button>

                        </form>

                        <a href="login.php" class="text-center">Log in here</a>


                    </div>
                    <!--end of card body-->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
