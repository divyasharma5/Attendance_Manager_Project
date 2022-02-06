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
	$_SESSION['date']=$_POST['date'];
	$a=$_POST['division'];
	$d=$_POST['date'];
		if($a=='divA')
	header('location:divA.php');

	else if($a=='divB')
	header('location:divB.php');
$dbHost = '127.0.0.1';//or localhost
$dbName = 'abcd'; // your db_name
$dbUsername = 'root'; // root by default for localhost 
$dbPassword = '';  // by default empty for localhost

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";
$sql = "CREATE TABLE if not exists attendance(   
	    Sno INT(30) PRIMARY KEY,
	    date1 date )";

	mysqli_query($conn, $sql);
$sql="select date1 from attendance where date1='$d'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_array($result)){
                
                echo "<br>";
                echo "attendance for feb=".$row[0];
                
                
           
        }
      
        // Free result set
        mysqli_free_result($result);
    } 
    else{
        echo "No records could be retrieved.";
    }
}
  $sql = "INSERT INTO attendance (date1) VALUES ('$d')";
if(mysqli_query($conn, $sql)){ 
} 
mysqli_close($conn);                
 }
?>
<br>
<div class="container" align="center" align="center" style="align-content: center; padding-top:20px; ">
	<br>
	<h1>Mark Attendance</h1>
	<p>Please select the division.</p>
	<form name="formname" style="max-width: 620px; padding-bottom: 150px;" action="" method="post">	
		<div class="row">
			<div class="form-group">
				<input type="date" name="date" ng-model="date" class="form-control" placeholder="Select date" ng-required="true" >
				
    		</div>
    	</div>
    	<br>
    	<div class="row">
			<div class="form-check col-md-6">
				<input class="form-check-input" type="radio" name="division" ng-model="division" value="divA"  ng-required="true">
				<label class="form-check-label">Divison A</label>			
			</div>
			<div class="form-check col-md-6">
				<input class="form-check-input" type="radio" name="division" ng-model="division" value="divB" ng-required="true">
				<label class="form-check-label">Divison B</label>				
    		</div>
    	</div>
    	<br>    	
    	<div class="row">
			<div class="form-group col-md-12">
				<input type="submit" name="submit" style="background-color:#892319 ; color: white; border: none; font-size: 20px;" value="Mark attendance" class="form-control" ng-disabled="formname.$invalid"> 
    		</div>
    	</div>
	</form>
</div>

</body>
</html>