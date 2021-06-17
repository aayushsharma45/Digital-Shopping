<?php
require('Database/DBController.php');
function get_safe_value($con,$str){
    if($str!=''){
    return mysqli_real_escape_string($con,$str);
    }
}

header('location:blog.php');
if(isset($_POST['submit'])){
   $fullname=get_safe_value ($con,$_POST['fullname']);
   $email=get_safe_value ($con,$_POST['email']);
   $password=get_safe_value ($con,$_POST['password']);
   $sql="select * from blog_users where fullname='$fullname' && email='$email'";
   $result=mysqli_query($con,$sql);
   $num=mysqli_num_rows($result);
   if($num == 1){
    $_SESSION['fullname'] = $fullname;
       echo "email already used";
   }else{
    $_SESSION['fullname'] = $fullname;
       $reg="insert into blog_users(fullname,email,password) values ('$fullname','$email','$password')";
       mysqli_query($con,$reg);
       echo "registration successful";
   }
}
?>