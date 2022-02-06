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
	<h1 align='center' style= 'color:#800020; background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; margin-bottom: 0px;'>Attendance Manager</h1>

<?php
session_start();
include('navbar.php');


if(isset($_POST['submit']))
{
	$a=$_POST['name'];
	$b=$_POST['rollno'];
	$c=$_POST['division'];
$dbHost = '127.0.0.1';//or localhost
$dbName = 'abcd'; // your db_name
$dbUsername = 'root'; // root by default for localhost 
$dbPassword = '';  // by default empty for localhost

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";

if($_POST['division']=='divA'){
$sql = "DELETE FROM division1 where name='$a' and rollno='$b'";
if(mysqli_query($conn, $sql)){
    echo "Records deleted successfully.";
} 
else
{
	
    echo "ERROR: Could not insert values " . mysqli_error($conn);
}
}
else if ($_POST['division']=='divB'){
	$sql = "DELETE FROM division2 where name='$a' and rollno='$b'";
if(mysqli_query($conn, $sql)){
    echo "Records deleted successfully.";
} 
else
{
	
    echo "ERROR: Could not insert values " . mysqli_error($conn);
}
}
mysqli_close($conn);                
 }
?>
<br>
<div class="container" align="center" style="align-content: center; padding-top:20px; ">
	<br>
	<h1>Remove Student</h1>
	<p>Please enter the details of the student.</p>
	<form name="formname" style="max-width: 620px; padding-bottom: 150px;" action="" method="post">	
		<div class="row">
			<div class="form-group">
				<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" ng-required="true" ng-pattern="/^[a-zA-Z]\w+$/">
				<p ng-show="formname.name.$error.pattern" style="color: red">Name can have only alphabets.</p>
    		</div>
    		<br>
    		<br>
    		<div class="form-group">
				<input type="text" name="rollno" ng-model="rollno" class="form-control" placeholder="Roll number" ng-required="true" ng-pattern="/^[0-9]+$/">
				<p ng-show="formname.name.$error.pattern" style="color: red">Roll number can have only digits.</p>
    		</div>
    	</div>
    	<br>
    	<div class="row">
			<div class="form-check col-md-6">
				<input class="form-check-input" type="radio" name="division" ng-model="division" value="divA"  >
				<label class="form-check-label">Divison A</label>			
			</div>
			<div class="form-check col-md-6">
				<input class="form-check-input" type="radio" name="division" ng-model="division" value="divB" >
				<label class="form-check-label">Divison B</label>				
    		</div>
    	</div>
    	<br>    	
    	<div class="row">
			<div class="form-group col-md-12">
				<input type="submit" name="submit" style="background-color:#892319 ; color: white; border: none; font-size: 20px;" value="Remove Student" class="form-control" ng-disabled="formname.$invalid"> 
    		</div>
    	</div>
	</form>
</div>

</body>
</html>