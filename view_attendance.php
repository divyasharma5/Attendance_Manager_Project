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
		$message="";
		$value='';
		$absent=0;
		if(isset($_POST['submit']))
				{  
 		if(isset($_POST['month'])){
			$month=$_POST['month'];
			}
		$name=$_POST['name'];
		$rollno=$_POST['rollno'];
		$division=$_POST['division'];

		$dbHost = '127.0.0.1';//or localhost
		$dbName = 'abcd'; // your db_name
		$dbUsername = 'root'; // root by default for localhost 
		$dbPassword = '';  // by default empty for localhost

		$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
		if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}
		if($division=='divA'){
		$sql="select sum($month) from division1 where name='$name' and rollno='$rollno'";
		if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
     	while($row = mysqli_fetch_array($result)){
                echo "<br>";
                $value=$row[0];


                $message= "<br>Attendance for ".$month.":  "."Present: ".$value." days | Absent: ";
                }
        mysqli_free_result($result);
   		 } 
 		}
}
		else if($division=="divB"){
			$sql="select sum($month) from division2 where name='$name' and rollno='$rollno'";
			if($result = mysqli_query($conn, $sql)){
    		if(mysqli_num_rows($result) > 0){
     		while($row = mysqli_fetch_array($result)){
                echo "<br>";
                $value=$row[0];
                $message= "<br>Attendance for ".$month.":  "."Present: ".$value." days | Absent: ";
           }
        mysqli_free_result($result);
    } 
  }
}
mysqli_close($conn);                
 }
?>
<br>
<div class="container" align="center" style="align-content: center; padding-top:20px; ">
	<h1>View Attendance</h1>
	<p>Please enter the details.</p>
	<form name="formname" style="max-width: 620px; padding-bottom: 20px" action="" method="post">	
		<div class="row">
			<div class="form-group">
				<input type="text" name="name" ng-model="name" class="form-control" placeholder="Name" ng-required="true" >
				
    		</div>
    	</div>
    	<br>
    	<div class="row">
			<div class="form-group">
				<input type="number" min=1 name="rollno" ng-model="rollno" class="form-control" placeholder="Roll number" ng-required="true" >
				
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
			<div>
				<label>Select a month</label>
				<select class="form-select form-select-sm"  ng-model="month" name="month" ng-required="true">
					<option value="jan">January</option>
					<option value="feb">February</option>
					<option value="mar">March</option>
					<option value="apr">April</option>
					<option value="may">May</option>
					<option value="jun">June</option>
					<option value="jul">July</option>
					<option value="aug">August</option>
					<option value="sep">September</option>
					<option value="nov">November</option>
					<option value="dece">December</option>
				</select>
    		</div>
    	</div>	
    	<br>
    	<div class="row">
			<div class="form-group col-md-12">
				<input type="submit" name="submit" style="background-color:#892319 ; color: white; border: none; font-size: 20px;" value="View attendance" class="form-control" ng-disabled="formname.$invalid"> 
    		</div>
    	</div>
	</form>

<br>

	<?php
	if(isset($_POST['submit']) && $value!=""){
	$value=(int)$value;
	if($month=='jan' || $month=='mar' || $month=='may' || $month=='jul' || $month=='aug' ||  $month=='oct' || $month=='dece'){
	$absent=31-$value;	
}
else if($month=='feb'){
	$absent=28-$value;	
}
else if($month=='apr' ||  $month=='jun' || $month=='sep' || $month=='nov' ){
	$absent=30-$value;
}
	echo "<h2 style='color: white'>The attendance details are:</h2>";
	echo "<p style='font-size:25px;'>Name: ".$name." | "."Roll Number: ".$rollno." | ".$message;
	echo $absent." days</p>";
}
else if(isset($_POST['submit']) && $value==""){
echo "<script type='text/javascript'> alert('Incorrect student details.'); </script>";}
	?>

</div>
</body>
</body>
</html>