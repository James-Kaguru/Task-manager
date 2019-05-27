
<?php

require 'security.php';

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
    <!--Link from searching data table -examples-bootstrap 4(The javascript in included in the bottom section)(jquery plugin) used to style u the table presentation-->
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

<!--Start of table div-->
<div class="container">

<table class="table table-secondary" id="items">
    <!--Start of table heading-->

    <thead>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>STATUS</th>
        <th>DATE</th>
    </tr>
    </thead>
    <!--End of table heading-->
    <tbody>
        <!--<tr>
            <td>$id</td>
            <td>$title</td>
            <td>$status</td>
            <td>$Date</td>
        </tr>
         -->
        <?php
        /*$conn = mysqli_connect("localhost", "root", "", "tasks");*/
        require 'db.php';
        $id = $_SESSION['info']['id'];
        /*require db replaces the $conn*/
        $sql ="select * from items where user_id='$id' ";
        $results =mysqli_query($conn,$sql) or die(mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($results))

        {
            extract($row);
            echo
            "

            <tr>
                <td> $id </td>
                <td> $title</td>
                <td> $status</td>
                <td> $date</td>
                
                <td><a class='btn btn-secondary btn-sm' href='delete.php?id=$id'>Delete</a> </td>
            </tr>
            
            ";
            /*         var_dump($row);
                     die();*/


        }



        ?>


    </tbody>







</table>







</div>
<!--End of table div-->















<script>
    $(document).ready(function() {
        $('#items').DataTable();
    } );
</script>
</body>
</html>