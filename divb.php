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
	table,tr,td,th{
		padding-right:40px;
		padding-left: 40px;
		border: 1px solid black;

	}
	
table {
  width: 100%;
  border-collapse: collapse;
  background-color: white;
		margin-top: 20px;
		margin-bottom: 20px;
}
</style>
</head>
<body ng-app="">
<h1 align='center' style= 'color:#800020; background-color: #F5F5F5; padding-top: 15px; padding-bottom: 15px; margin-bottom: 0px;'>Attendance Manager</h1>
<?php
		session_start();
		include('navbar.php');
		$timestamp=strtotime($_SESSION['date']);
		$month=date("M",$timestamp);
		$month=strtolower($month);
		if(isset($_POST['submit']))
		{
		$dbHost = '127.0.0.1';//or localhost
		$dbName = 'abcd'; // your db_name
		$dbUsername = 'root'; // root by default for localhost 
		$dbPassword = '';  // by default empty for localhost
		$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
				}

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
	
	$sql="SELECT $month from division2";
     if(mysqli_query($conn,$sql)){
     echo "abcd";
     $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($result)){
                echo "row".$row[$month];

 }}
foreach ($_POST['checkatt'] as $s){
$sql="UPDATE division2 set $month=$month+1 where rollno=$s ";
mysqli_query($conn,$sql);
}
echo "For Feb";
$month1='feb';
$name1='abcd11';
$sql="select sum($month1) from division2 where name='abcd11'";

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




mysqli_close($conn);   
header("location:homepage.php");             
 }
?>
<div class="container" align="center" style="align-content: center; padding-top:20px; ">
	<h1>Mark attendance</h1>
	<p>Please mark attendance of the students.</p>
	<p>Date: <?php echo $_SESSION['date']?></p>
	<form name="formname" style="max-width: 420px;" action="" method="post">	
		
    	   	<?php
    	   	$sql = "SELECT * from division2";
                    $result = mysqli_query($conn, $sql);
                    echo "<table>
                    	<tr>
                    		<th>Roll number</th>
                    		<th>Name</th>
                    		<th>Attendance</th>
                    	</tr>
                    ";
                
                    while($row = mysqli_fetch_array($result)){
                
                echo "<tr style='border: 1px solid black'> <td>". $row['rollno']."</td>";
                echo "<td>" . $row['name']."</td>";
                echo "<td><input type='checkbox' name='checkatt[]' value='".$row['rollno']."'></td></tr>";
                   	   	}
                   	   echo"</table>"

                   	   ?>
    	<div class="row">
			<div class="form-group col-md-12">
				<input type="submit" name="submit" value="Submit Attendance" style="background-color:#892319 ; margin-bottom: 20px; color: white; border: none; font-size: 20px;"  class="form-control" ng-disabled="formname.$invalid"> 
    		</div>
    	</div>
	</form>
</div>

</body>
</html>