<html>
<body>
<?php 
$con=mysqli_connect("localhost","root","","login");
if(mysqli_connect_errno()){                            //to check for presence of database and connection
    echo "Falied to connect". mysqli_connect_error();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){      //check for type of connection
    $username=mysqli_real_escape_string($con,$_POST['username']);    //to retrive data from database
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
}

    $sql = "SELECT username FROM userdetails WHERE username = '$username' and pass = '$pass';";
      $result = mysqli_query($con,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);
if($count == 1){
    $_SESSION['login_user']=$username;
    header("location: first.php");
}
else{
    echo"<center><h3 style='color:red';>Your login name or password is incorrect";
}


?>

</body>
</html>
