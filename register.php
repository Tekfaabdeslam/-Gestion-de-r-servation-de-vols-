<?php

session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: index.php");
}
include_once 'dbconnect.php';

// if(isset($_POST['btn-signup']))
// {
 $username = $_POST['username'];
 $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
   $tel =$_POST['tel'];
 $email = $_POST['email'];
 $pwd1 = $_POST['pwd1'];

 if(isset($_POST['middlename'])){
 	$middlename = $_POST['middlename'];
 }else{
 	$middlename = "";
 }

  if(isset($_POST['gender'])){
 	$gender = $_POST['gender'];
 }else{
 	$gender = "";
 }

  if(isset($_POST['birthday'])){
 	$birthday = $_POST['birthday'];
 }else{
 	$birthday = "";
 }

 
 if(pg_query($dbconn,"INSERT INTO passanger(email,firstname,lastname,cellphone,middlename,gender,birthday) VALUES('$email','$firstname','$lastname','$tel','$middlename','$gender','$birthday')")&& pg_query($dbconn,"INSERT INTO users(username,password) VALUES('$username','$pwd1')"))
 
 {
  $_SESSION['user']=$username;
        header("Location: index.php");
         }
 else
 {
  ?>
   <script>alert('erreur lors de votre enregistrement');</script>
        <?php
 }
// }
pg_close($dbconn);
?>