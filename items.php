<?php

require 'security.php';


if (isset($_POST["title"])) {
    extract($_POST);/*Pulls data from the post..post is generally all the form data that has been entered through clicking sbmit*/

    /*echo "$title";*//*Just to confirm whether th extract is working*/
    /*$conn =mysqli_connect("localhost", "root","","tasks");*/
    require 'db.php';
    /*require db replaces the $conn*/
    $id = $_SESSION['info']['id'];
    $sql ="INSERT INTO `items`(`id`, `title`, `status`, `date`, `user_id`) VALUES 
                              (null ,'$title','$status','$date','$id')";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));/*Checks whether there is an error n the sql*/
    $message ="Title $title has been added successfully";
}

?>


















<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Items form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<!--Start of navigation bar-->
<?php

require 'navbar.php';

?>
<!--End of navigation bar-->

<br>
<!--Start of form-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">


            <!-- start form to input data for the item table-->

            <form action="items.php" method="post"">
                <div class="form-group ">

                    <input type="text" class="form-control" required name="title" placeholder="Enter your title name">
                </div>
                <!--Start of the radio buttons



                -->
                <div class="radio">
                    <label><input type="radio" checked value="incomplete" name="status"> Incomplete</label><!--Automatically checks the radio button on-->
                </div>

                <div class="radio">
                    <label><input type="radio" value="complete" name="status"> Complete</label>
                </div>
                <div class="form-group">

                    <input type="date" class="form-control" required name="date" placeholder="Date">
                </div>

                <button type="submit" class="btn btn-secondary btn-block">Submit</button>
            </form>

            <!--End of form data-->



        </div>
    </div>
</div>



</body>
</html>