<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance Manager</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>



<style type="text/css">
    .container{
    background: rgb(182,66,54);
background: linear-gradient(180deg, rgba(182,66,54,1) 0%, rgba(222,77,102,1) 27%);
    }
</style>
</head>

<body ng-app="">
<h1 class='heading' align='center' style= 'color:#800020; padding-top: 15px; padding-bottom: 15px; background-color: #F5F5F5'>Welcome to Attendance Manager</h1><br>

<?php

if(isset($_POST['submit']))
{
	$a=$_POST['username'];
	$b=$_POST['password'];


$dbHost = '127.0.0.1';//or localhost
$dbName = 'abcd'; // your db_name
$dbUsername = 'root'; // root by default for localhost 
$dbPassword = '';  // by default empty for localhost

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";
$sql = "CREATE TABLE if not exists teacher(   
    name VARCHAR(30) NOT NULL,
    username VARCHAR(30) PRIMARY KEY,
    password varchar(30) NOT NULL)";


if(mysqli_query($conn, $sql))
{
    echo "<br>Table created successfully</br>";
} 
else
{
    echo "ERROR: Could not create table " . mysqli_error($conn);
}

$sql = "select * from teacher where username='$a' and password='$b'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
            
               $name=$row['name'];
                        
                        session_start();
                        $_SESSION['name']=$name;
                        header("location:homepage.php");
                        echo "<script type='text/javascript'> alert('Logged in successfully.'); </script>";
                
        }
      
        // Free result set
        mysqli_free_result($result);
    } 
    else{
        
        echo "<script type='text/javascript'> alert('Log in again.'); </script>";
        
    }
}

mysqli_close($conn);
                
 }
 else
 ?>



<br>
<div class="container" align="center" style="align-content: center; padding-top:20px; ">
    <h1>Log in</h1>
    <p>Please enter your login credentials.</p>
    <form name="formname" action="" style="max-width: 620px; padding-bottom: 150px;" method="post">   
        <div class="row">
            <div class="form-group">
                <input type="text" name="username" ng-model="username" class="form-control" placeholder="Username" ng-required="true" ng-pattern="/^[a-zA-Z]*$/">
                <p ng-show="formname.username.$error.pattern" style="color: red">Username can have only alphabets, no space allowed.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <input type="text" name="password" ng-model="password" class="form-control" placeholder="Password" ng-required="true" ng-pattern="/^[a-z0-9@#$%&]+$/">
                <p ng-show="formname.password.$error.pattern" style="color: red">Password can have alphabets, numbers, special character. No space allowed.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-md-12">
                <input type="submit" name="submit" style="background-color:#892319 ; color: white; border: none; font-size: 20px;"  value="Login" class="form-control" ng-disabled="formname.$invalid"> 
                
            </div>
        </div>
    </form>
</div>

</body>
</html>