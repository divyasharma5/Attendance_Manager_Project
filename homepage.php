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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<style type="text/css">
		
	</style>
</head>

<body>
<?php
session_start();
//include('navbar.php');
?>

	<h1 class='heading' align='center' style= 'color:#800020; padding-top: 15px; padding-bottom: 15px; background-color: #F5F5F5'>Hello <?php echo $_SESSION['name']?>! Welcome to Attendance Manager.</h1><br>



<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a href="add.php" style="color: #a8328b; text-decoration: none;" >
			<div class="card" style="border: none; margin-left: 30px; max-width: 50rem;">
		        <div class="card-body text-center shadow p-3 mb-5 bg-white rounded" >
		        	<div style="color: #a8328b">
		        	<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
                    <br><br>
                </div>
		    	    
		            <div class="card-title" style="font-size: 30px;">
		                 Add student     	
		            </div>
		        </div>
		    </div>
		</a>
		</div>
		<div class="col-md-6">
			<a href="remove.php" style="color:#2eb843; text-decoration: none;" >

			<div class="card" style="border: none; margin-left: 30px; max-width: 50rem;">
		        <div class="card-body text-center shadow p-3 mb-5 bg-white rounded" >
		        	<div style="color:#2eb843">
		        	<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
		        		<path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
		        		<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
		        	</svg>
                    <br><br>
                </div>
		    	    
		            <div class="card-title" style="color:#2eb843; font-size: 30px;">
		                 Remove student     	
		            </div>
		        </div>
		    </div>
		</a>
		</div>


		 </div>  
		 
	<div class="row">
		<div class="col-md-6">
			<a href="markattendance.php" style="color: #c47214; text-decoration: none;" >
			<div class="card" style="border: none; margin-left: 30px; max-width: 50rem;">
				
		        <div class="card-body text-center shadow p-3 mb-5 bg-white rounded" >
		        	<div style="color:#c47214; ">
		        	<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg>
                    <br><br>
                </div>
		    	    
		            <div class="card-title" style="font-size: 30px;">
		                    Mark Attendance 	
		            </div>
		        </div>
		    
		    </div>
		</a>
		</div>
		<div class="col-md-6">
			<a href="view_attendance.php" style="color: #10b5c4; text-decoration: none;" >
			<div class="card" style="border: none; margin-left: 30px; max-width: 50rem;">
		        <div class="card-body text-center shadow p-3 mb-5 bg-white rounded" >
		        	<div style="color:  #10b5c4;">
		        	<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
</svg>
                    <br><br>
                </div>
		    	    
		            <div class="card-title" style="font-size: 30px;">
		                 View Attendance   	
		            </div>
		        </div>
		    </div>
		</a>
		</div>


		 </div>  
	</div>
	


</div>
</body>
</html>