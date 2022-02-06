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
	$b=$_POST['division'];
$dbHost = '127.0.0.1';//or localhost
$dbName = 'abcd'; // your db_name
$dbUsername = 'root'; // root by default for localhost 
$dbPassword = '';  // by default empty for localhost

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if($_POST['division']=='divA'){
	$sql = "CREATE TABLE if not exists division1(   
	    rollno INT(30) PRIMARY KEY,
	    name VARCHAR(30),
	    jan int(2) default 0,
	    feb int(2) default 0,
	    mar int(2) default 0,
	    apr int(2) default 0,
	    may int(2) default 0,
	    jun int(2) default 0,
	    jul int(2) default 0,
	    aug int(2) default 0,
	    sep int(2) default 0,
	    oct int(2) default 0,
	    nov int(2) default 0,
	    dece int(2) default 0)";

	mysqli_query($conn, $sql);
$sql = "INSERT INTO division1 (name) VALUES ('$a')";
if(mysqli_query($conn, $sql)){    
} 
else
{
	
    echo "ERROR: Could not insert values " . mysqli_error($conn);
}
}
else if($_POST['division']=='divB'){
$sql = "CREATE TABLE if not exists division2(   
	    rollno INT(30) PRIMARY KEY,
	    name VARCHAR(30),
	    jan int(2) default 0,
	    feb int(2) default 0,
	    mar int(2) default 0,
	    apr int(2) default 0,
	    may int(2) default 0,
	    jun int(2) default 0,
	    jul int(2) default 0,
	    aug int(2) default 0,
	    sep int(2) default 0,
	    oct int(2) default 0,
	    nov int(2) default 0,
	    dece int(2) default 0)";

	mysqli_query($conn, $sql);
	
	$sql = "INSERT INTO division2 (name) VALUES ('$a')";
if(mysqli_query($conn, $sql)){
   
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
	<h1>Add Student</h1>
	<p>Please enter the details of the student.</p>
	<form name="formname" style="max-width: 620px; padding-bottom: 150px;" action="" method="post">	
		<div class="row">
			<div class="form-group">
				<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" ng-required="true" ng-pattern="/^[a-zA-Z]\w+$/">
				<p ng-show="formname.name.$error.pattern" style="color: red">Name can have only alphabets.</p>
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
				<input type="submit" style="background-color:#892319 ; color: white; border: none; font-size: 20px;" name="submit" value="Add Student" class="form-control" ng-disabled="formname.$invalid"> 
    		</div>
    	</div>
	</form>
	
</div>


</body>
</html>