<?php

session_start();		
	//error_reporting(0);					
	$con=mysqli_connect("localhost","root","","blood");

if ( isset( $_POST['submit'] ) ) 	
{
	$u=$_POST['email']; 
$p=$_POST['password']; 


if($_POST['type']=="Admin")
	{
$sel="SELECT * FROM admin WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result = mysqli_query($con,$sel) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 echo $rows;
  $row1=mysqli_fetch_array($result);
  echo $row1['id'];
        if($rows==1){
     $_SESSION['email'] = $_POST['email'];
	 $_SESSION['usertype']='Admin';
	 $_SESSION['aid']=$row1['id'];

            // Redirect user to index.php
    header("Location:admin/index.php");
         }else{
			     header("Location:login.php?st=fail");

 }
 
	}
	elseif($_POST['type']=="User")
	{
$sel="SELECT * FROM register WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result = mysqli_query($con,$sel) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 $row=mysqli_fetch_array($result);
        if($rows==1){
     $_SESSION['uemail'] = $_POST['email'];
	 $_SESSION['usertype']='User';
	 $_SESSION['uid']=$row['id'];
	 	 $_SESSION['sname']=$row['name'];

            // Redirect user to index.php
    header("Location:user/index.php");
         }else{
						     header("Location:login.php?st=fail");

			 }
	}
	elseif($_POST['type']=="Doctor")
	{
$sel="SELECT * FROM doctors WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result = mysqli_query($con,$sel) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 echo $rows;
 $row=mysqli_fetch_array($result);
        if($rows>0){
     $_SESSION['cemail'] = $_POST['email'];
	 $_SESSION['usertype']='Doctor';
	 $_SESSION['did']=$row['id'];
	 	 $_SESSION['dname']=$row['name'];

            // Redirect user to index.php
    header("location:doctor/index.php");
         }else{
			   header("Location:login.php?st=fail");
 }
	}

elseif($_POST['type']=="Hospital")
	{
$sel="SELECT * FROM hospital WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
$result = mysqli_query($con,$sel) or die(mysql_error());
 $rows = mysqli_num_rows($result);
 echo $rows;
 $row=mysqli_fetch_array($result);
        if($rows==1){
     $_SESSION['cemail'] = $_POST['email'];
	 $_SESSION['usertype']='Hospital';
	 $_SESSION['hid']=$row['id'];
	 	 $_SESSION['hname']=$row['name'];

            // Redirect user to index.php
    header("location:hospital/index.php");
         }else{
			     header("Location:login.php?st=fail");
 }
	}

	
}
?>
