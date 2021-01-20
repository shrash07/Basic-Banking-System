<!DOCTYPE html>
<html>
<head>
	<title>Transfers Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>
	<div class="container-fluid" style="height: 700px;background-color: #e9ecef;">
		<div class="jumbotron" style="height: 700px;">

			<div style="width: 1350px; margin-top: -40px;">
				<div class="pos-f-t">
				  <div class="collapse" id="navbarToggleExternalContent">
				    <div class="bg-dark p-2">
				      <ul class="nav nav-pills nav-fill">
						  <li class="nav-item">
						    <a class="nav-link bg-light text-dark" href="customers.php">Back to Customers</a>
						  </li>
						</ul>
				    </div>
				  </div>
				  <nav class="navbar navbar-dark bg-dark">
					<h4 class="text-white p-4">Transfers Page</h4>
				    <button class="navbar-toggler d-flex justify-content-end" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
				  </nav>
				</div>
			</div>
				<form  method="post" class="row  form-body text-white rounded mt-2 ml-3" style="height: 550px;width: 1300px;">
					<div class="col-8 bg-dark " style="text-align: center;top: 150px;background-color: grey;margin-top: -50px;padding-top:100px ;border-radius: 50px;">
						<h2 style="margin-top: -50px;margin-bottom: 30px;"> Money Transfer Form</h2>
						<div class="container row ">
							<div class="col-6">
							<label class="font-weight-bolder">From:</label><br>
							<input class="rounded-pill text-center" onkeyup="
							  var start = this.selectionStart;
							  var end = this.selectionEnd;
							  this.value = this.value.toUpperCase();
							  this.setSelectionRange(start, end);" placeholder="NAME" style="width: 300px;height: 40px;" type="text" name="frm">
							</div>
							<div class="col-6">
							<label class="font-weight-bolder">To:</label><br>
							<input class="rounded-pill text-center" onkeyup="
							  var start = this.selectionStart;
							  var end = this.selectionEnd;
							  this.value = this.value.toUpperCase();
							  this.setSelectionRange(start, end);" placeholder="NAME" style="width: 300px;height: 40px;" type="text" name="to">
							</div>
						</div>
					</div>
					<div class="col-8 pl-5" style="text-align: center;">
							<div  class="col-12">
							<label class="font-weight-bolder">Amount:</label>
							<i class="fas fa-rupee-sign pl-1"> &nbsp</i><input class="rounded-pill" type="number" placeholder="  AMOUNT" style="width: 300px;height: 40px;" name="amt">
							</div>
					</div>

					<div class="col-4" style="text-align: center; top: -50px;">
						<a class="text-white"  style="text-decoration: none; " href="customers.php"><button name="submit" type="submit" class="btn-lg rounded-pill btn-elegant bg-dark text-white">Transfer Amount<i class="fas fa-money-bill pl-1"></i></button></a>
					</div>
				</form>

		</div>
	</div>
	<footer class="footer mt-auto p-4 bg-dark " style="height: 120px">
	  <div class="container" style="text-align: center;">
	    <span class="text-white">Project By - Shreyas Ashok</span>
	  </div>
	</footer>
</body>
</html>
<?php
$conn = new mysqli("localhost","root","root","Bank");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
if(isset($_POST['submit']))
{
	$frm=$_POST['frm'];
	$to=$_POST['to'];
	$amt=$_POST['amt'];
	$amtn=$amt*-1;
	$pos=1;
	$q1="SELECT balance FROM Customers WHERE name='".$frm."'";
	$q2="SELECT balance FROM Customers WHERE name='".$to."'";
	$r1=$conn->query($q1);
	$r2=$conn->query($q2);
	while($r=$r1->fetch_assoc())
	{
		$val1=$r['balance'];
	}
	while($r=$r2->fetch_assoc())
	{
		$val2=$r['balance'];
	}
	if ($val1<=0) {
		echo "<script type='text/javascript'>alert('You have debt');</script>";
	}
	else if($val1<$amt){
		echo "<script type='text/javascript'>alert('Insufficient funds');</script>";
	}
	else{
		$val1=$val1-$amt;
		$val2=$val2+$amt;
		$q3="UPDATE Customers SET balance = '".$val1."' WHERE name = '".$frm."'";
		$q4="UPDATE Customers SET balance = '".$val2."' WHERE name = '".$to."'";
		$q5="UPDATE Customers SET transfer = '".$amtn."' WHERE name = '".$frm."'";
		$q6="UPDATE Customers SET transfer = '".$amt."' WHERE name = '".$to."'";
		if( $conn->query($q3) && $conn->query($q4) && $conn->query($q5) && $conn->query($q6)){
			echo "<script type='text/javascript'>alert('Transaction complete');</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Transaction Failed');</script>";
		}	
	}
	

}

?>