<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIWES Result</title>
	<!-- Internal Link -->
	<link rel="icon" type="text/css" href="../images/fud.png">
	<link rel="stylesheet" type="text/css" href="../php/style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	
  <!-- Enternal style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- External Script -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style type="text/css">
  	.jumbotron{
  		background-color: #fff; 
  		line-height: 2;
  		font-size: 1.4rem;
  		text-align: center;
  		padding-bottom: 0;
  	}
  	.jumbotron h3{
  		color: #16611D;
  		font-size: 2.2rem;
  		box-shadow: 1px 1px 4px; 
  		padding: 1.5% 0; 
  		border-radius: 5%;
  	}
  	.ahover a:hover{
  		font-weight: 600;
  	}
  </style>

</head>
<body>

	<!--================= Header Section =================-->
	<section class="title">
		<!-- header -->
		<div class="logheader">
				<div class="row" >
					<div class="col-lg-3 col-md-3 col-sm-3">
						<img src="../images/fud.png" alt="fud Logo">
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9">
						<h1>FUD SIWES PORTAL</h1>
						<h6>Knowledge, Excellent & Service</h6>
					</div>
				</div>
		</div>
		<nav class="logheader logheader2" style="background-color: #1B9410; padding: 0% 5% -1%; overflow: hidden;">
	      <h3 style="margin: -0.2% auto 0%;"> 
	         DEPARTMENT OF SOFTWARE ENGINEERING
	      </h3>
	    </nav>

	<!-- Nav Bar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-success  ahover" style="font-size:115%; ">
        <a href="home.php" class="navbar-brand">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item">
	            <a href="studInfor.php" class="nav-link">StudentInformation</a>
	          </li>
	          <li class="nav-item">
	            <a href="indreg.php" class="nav-link">IndustrialRegistration</a>
	          </li>
	          <li class="nav-item">
	            <a href="attendance.php" class="nav-link">Attendance</a>
	          </li>
	          <li class="nav-item">
	            <a href="monthrep.php" class="nav-link">MonthlyReport</a>
	          </li>
	          <li class="nav-item">
	            <a href="siwesrep.php" class="nav-link">SIWESReport</a>
	          </li>
	          <li class="nav-item">
	            <a href="index.html" class="nav-link">Defence</a>
	          </li>
	          <li class="nav-item">
	            <a href="#" class="nav-link">SIWESResult</a>
	          </li>
	          <li class="nav-item">
	            <a href="contact.php" class="nav-link">StudComplaints</a>
	          </li>
	        </ul>
        </div>
    </nav>
	</section>


	<!--================= Body Text Section=================-->
	<section class="bodytext">
		  <div class="container">

		  	  <div class="jumbotron">
					<h3>
						Result of SIWES Students 
					</h3>
					<hr>
					<p>
						All services on this portal are restricted, hence, only authenticated users can access them. Please login Students should use their Registration numbers and passwords when login.
					</p>
					
					<hr>
					
			  </div>
    

	<!--=================Search Table Section =================-->
    <div class="jumbotron">
    	<form action="searchgrade.php" method="post">
    		<div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">🔍</span>
                <input type="text" id="regnum_to_search" name="regnum_to_search" class="form-control" placeholder="Search Student with Registration Number" aria-label="Search Student with Registration Number" aria-describedby="addon-wrapping" required>
                <button type="submit" class="btn btn-lg btn-success">Search</button>
            </div>
        </form>
    </div>


<!--================= Table Section =================-->
<section class="table-responsive">
  <table class="table table-sm table-light table-striped table-hover table-bordered border-success  align-middle">
  	<!-- <h1 style="text-align: center;">SIWES Result</h1> -->
    <tr class="table-success table-active">
        <th scope="col">S/N</th>
        <th scope="col">Registration Number</th>
        <th scope="col">Name of Students</th>
        <th scope="col">Marks</th>
        <th scope="col">Grade</th>
        <th scope="col">Date/Time</th>
    </tr>

<?php
    // Include your database connection logic here
    $conn = mysqli_connect("localhost", "root", "", "fudsiwes");

    // Replace with your actual SQL query to fetch data from the 'grade' table
    $sql = "SELECT * FROM grade";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            	    <td>" . $row['sn'] . "</td>
                    <td>" . $row['regnum'] . "</td>
                    <td>" . $row['studname'] . "</td>
                    <td>" . $row['mark'] . "</td>
                    <td>" . $row['grade'] . "</td>
                    <td>" . $row['datetime'] . "</td>
                </tr>";
        }

    } else {
        echo "<h1>No Grades of SIWES Student.</h1>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </table>
</section>

</section>


	<!--================= Footer Section=================-->
	<section class="footer">
		<p>
			&copy Federal University Dutse
		</p>
		<hr class="hr">
		<p>
			All rights reserved
		</p>
	</section>

</body>
</html>