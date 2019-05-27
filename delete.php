<?php
 if(isset($_GET["id"])) {
     /*$conn = mysqli_connect("localhost", "root", "", "tasks");*/
     require 'db.php';
     /*require db replaces the $conn*/
     extract($_GET);
     $sql= "delete from items where id=$id";
     mysqli_query($conn,$sql);
 }
header("location:tasks.php");