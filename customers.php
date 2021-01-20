<?php 
$conn = new mysqli("localhost","root","root","Bank");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
	echo '<script type="text/javascript">';
	echo 'var Customers= [{}];';
	echo 'var n = 100;
			for (var i = 0; i < n; i++)
			    Customers.push({});';
	$count=0;
	echo '</script>';
	

			$q="SELECT * FROM Customers ";
			$r=$conn->query($q);
			echo '<script type="text/javascript">';
			while($ro = $r->fetch_assoc())
			{
				echo "var x=Customers[".$count."];";
				echo 'x.sno="'. $ro["id"].'";';
				echo 'x.name="'. $ro["name"].'";';
				echo 'x.email="'. $ro["email"].'";';
				echo 'x.balance="'. $ro["balance"].'";';
				echo 'x.transfer="'. $ro["transfer"].'";';
				$count=$count+1; 
				
			}
			echo '</script>';
?>


<html>
<head>
	<title>Customers Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
	<style type="text/css">
		#a0:hover,#a1:hover,#a2:hover,#a3:hover,#a4:hover,.sty:hover{
			 background-color: #343a40;
			 color: white;
		}
		#a0,#a1,#a2,#a3,#a4{
			padding: 10px;
		}
		.st:hover{
			background-color: white;
			 color: #343a40;
		}
		
	</style>
</head>
<body>
	<div class="container-fluid" style="height: 920px;background-color: #e9ecef;">
		<div class="jumbotron" style="height: 700px;">

			<div style="width: 1350px; margin-top: -40px;">
				<div class="pos-f-t">
				  <div class="collapse" id="navbarToggleExternalContent">
				    <div class="bg-dark p-2">
				      <ul class="nav nav-pills nav-fill">
						  <li class="nav-item">
						    <a class="nav-link bg-light text-dark" href="home.html">Home</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link bg-light text-dark" href="about.html">About</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link bg-light text-dark" href="customers.php">Customers</a>
						  </li>
						</ul>
				    </div>
				  </div>
				  <nav class="navbar navbar-dark bg-dark">
					<h4 class="text-white p-4">Customers Page</h4>
				    <button class="navbar-toggler d-flex justify-content-end" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
				  </nav>
				</div>
			</div>
			<div class="container " >
				<h3 class="font-weight-bolder pt-4">Customer details</h3><br>
				<div class="row">
					<div class="col-1 bg-light" style="border:2px solid black">
						<h4 class="pt-2 text-center">S-NO</h4>
					</div>
					<div class="col-3 bg-dark text-white" style="border:2px solid black">
						<h4 class="pt-2 text-center">NAME</h6>		
					</div>
					<div class="col-3 bg-light" style="border:2px solid black">
						<h4 class="pt-2 text-center">E-MAIL</h4>	
					</div>
					<div class="col-3 bg-dark text-white" style="border:2px solid black">
						<h4 class="pt-2 text-center">BALANCE</h4>
					</div>
					<div class="col-2 bg-light" style="border:2px solid black">
						<h4 class="pt-2 text-center">OTHERS</h4>	
					</div>
				</div>
				<div class="row">
					<script type="text/javascript">
						var a=[];
						for (var i = 0; i < 10; i++) {
							a.push(Customers[i].sno);
							console.log(a)
							document.write(`<div class="col-1 bg-light" style="border:2px solid black">
								<p  class="text-center sty mt-2" id="name" style="border:2px solid black">`+Customers[i].sno+`</p></div>`);
							document.write(`<div class="col-3  bg-dark text-white" style="border:2px solid black">
								<p  class="text-center st mt-2" id="name" style="border:2px solid black">`+Customers[i].name+`</p></div>`);
							document.write(`<div class="col-3 bg-light" style="border:2px solid black">
								<p  class="text-center sty mt-2" id="name" style="border:2px solid black">`+Customers[i].email+`</p></div>`);
							document.write(`<div class="col-3 bg-dark text-white" style="border:2px solid black">
								<p  class="text-center st mt-2" id="name" style="border:2px solid black">`+Customers[i].balance+`</p></div>`);
							document.write(`<div class="col-2 bg-light text-center" style="border:2px solid black">
								<button type="button" class="btn btn-info bg-dark btn-md m-2 " data-toggle="modal" data-target="#myModal" onclick=details(`+i+`)>View Info</button></div>
								<div id="myModal" class="modal fade" role="dialog" style="margin-top:100px;">
								  <div class="modal-dialog">

								
								    <div class="modal-content">
								      <div class="modal-header bg-dark text-white" id="mh">
								        <h4 class="modal-title">Details</h4>
								        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
								        
								      </div>
								      <div class="modal-body" id="mb">
								        <p id="a0"><span class="font-weight-bold">ID :  </span><span id="d0"></span></p>
								        <p id="a1"><span class="font-weight-bold">NAME :  </span><span id="d1"></span></p>
								        <p id="a2"><span class="font-weight-bold">E-MAIL :  </span><span id="d2"></span></p>
								        <p id="a3"><span class="font-weight-bold">CURRENT BALANCE :  </span><span id="d3"></span></p>
								        <p id="a4"><span class="font-weight-bold">RECENT TRANSFERS :  </span><span id="d4"></span></p>
								      </div>
								      <div class="modal-footer bg-dark" id="mf">
								      <a class=""  style="text-decoration: none; " href="transfer.php"><button class="btn bg-dark text-white">Transfer amount<i class="fas fa-angle-double-right pl-1"></i></button></a>
								        <button type="button" class="btn bg-dark text-white btn-default" data-dismiss="modal">Close</button>
								      </div>
								    </div>

								  </div>
								</div>`);
						}
						function details(value){
							document.getElementById('d0').innerHTML=Customers[value].sno;
							document.getElementById('d1').innerHTML=Customers[value].name;
							document.getElementById('d2').innerHTML=Customers[value].email;
							document.getElementById('d3').innerHTML=Customers[value].balance;
							if (Customers[value].transfer<0) {
								document.getElementById('d4').style.color = "red";
								document.getElementById('d4').innerHTML='Debited '+Customers[value].transfer;
							}
							else{
								document.getElementById('d4').style.color = "green";
								document.getElementById('d4').innerHTML='Credited '+Customers[value].transfer;
							}
							;
						}
	 				</script>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer p-4 bg-dark " style="height: 120px;">
	  <div class="container" style="text-align: center;">
	    <span class="text-white">Project By - Shreyas Ashok</span>
	  </div>
	</footer>
</body>
</html>




					