
<?php

if(isset($_POST["email"])){
    require 'db.php';
    extract($_POST);
    $password =md5($password);
    $sql="select * from users where email='$email' and password='$password'";
    /*collects data from the database to compare*/
    $results = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($results);
    /*Counts the records of results variable which is expected to be on*/

    if ($count == 1){
        //success
        /*info stores info about the user so that it can be used to display thins such as profile .........the
        y are stored in the info variable*/
        $info = mysqli_fetch_assoc($results);
        session_start();
        $_SESSION['info']=$info;
        header("location:tasks.php");

    }
    else{
        $message="Invalid username or password";
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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">


                <!--start of card header-->
                <div class="card-header">
                    <h3 class="text-center">Log in</h3>
                </div>
                <!--end of card header-->


                <!--start of card body-->
                <div class="card-body">
                    <form action="login.php" method="post">



                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <button class="btn btn-secondary btn-block">Sign in</button>

                    </form>
                    <p class="text-danger">
                        <?php

                        if (isset($message)){
                            echo $message;
                        }

                        ?>
                    </p>
                    <a href="register.php" class="text-center">Register here</a>


                </div>
                <!--end of card body-->
            </div>
        </div>
    </div>
</div>
</body>
</html>