<?php include("base.php");
include("database.php");
if(isset($_POST['submit'])){
	$empname = $_POST["txtname"];
	$empemail= $_POST["txtemail"];
	$gender = $_POST["gender"];
	$empobile = $_POST["txtmobile"];
	$empaddress = $_POST["txtaddress"];
	$empquali = $_POST["txtquali"];

$sql = "INSERT INTO employees (empName, empEmail ,Gender,empMobile,empAddress,empQualification)
	VALUES ('$empname', '$empemail','$gender','$empobile','$empaddress','$empquali')";

	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

//	$conn->close();
}
?>
<?php
if(isset($_POST['update'])){
    $empId= $_POST['upId'];
    $empname = $_POST["txtname"];
	$empemail= $_POST["txtemail"];
	$gender = $_POST["gender"];
	$empmobile = $_POST["txtmobile"];
	$empaddress = $_POST["txtaddress"];
	$empquali = $_POST["txtquali"];

$sql = "UPDATE employees SET empName='$empname',empEmail='$empemail',empMobile='$empmobile',empAddress='$empaddress',empQualification='$empquali' WHERE empId='$empId'";

	if ($conn->query($sql) === TRUE) {
	echo "Record Updated successfully";
    header("Location:index.php");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}   

//	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Add Employee </title>
</head>
<body> <br><br>
	<div class="row justify-content-center">
    <?php           $up_id = $_GET["emp_id"];
                    echo $up_id;
                    $sql1 = "SELECT * from employees where empId='$up_id'";
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        // output data of each row
                        while($row1 = $result1->fetch_assoc()) {
                      //echo $row1["empName"];?>
                    

		<div class="col-md-6">
			<div class="card">
  				<div class="card-body">
    				<h5 class="card-title text-center">Add Employee </h5>
    				<p class="card-text">
    					<form class="form-group"  method="post" action="">
                            <input type="text" name="upId" id="" value="<?php echo $up_id;?>">
    						<label for="name" class="form-label">Enter Employee Name </label>
    						<input type="text"  value="<?php echo $row1["empName"];?>" name="txtname" class="form-control" placeholder=" Enter Employee Name ">
    						
    						<label for="email" class="form-label">Enter Employee Email </label>
    						<input type="text"  value="<?php echo $row1["empEmail"];?>" name="txtemail" class="form-control" placeholder=" Enter Employee Email ">
    					    <br>
                            <input type="text" disabled name="" id="" value="<?php echo $row1['Gender'];?>"><br>
    						<!--<label class="form-label" for="gender">Gender :</label><br>
    						<input class="form-check-input" type="radio" name="gender" value="Male">Male 
    						<input class="form-check-input" type="radio" name="gender" value="Female">FeMale <br>
    					-->
    						<label for="email" class="form-label">Enter Employee Mobile </label>
    						<input type="text" name="txtmobile"  value="<?php echo $row1["empMobile"];?>" class="form-control" placeholder=" Enter Employee Mobile ">
    					
    						<label for="email" class="form-label">Enter Employee Address</label>
    						<input type="text" name="txtaddress" class="form-control"  value="<?php echo $row1["empAddress"];?>" placeholder=" Enter Employee Address ">
    					
    						<label for="email" class="form-label">Enter Employee Qualification </label>
    						<input type="text" name="txtquali" class="form-control" value="<?php echo $row1["empQualification"];?>" placeholder=" Enter Employee Qualification ">
    					
    						<input value="Save" class="mt-4 btn btn-success" name="update" type="submit">
    					</form>
    				</p>
    			</div>
    		</div>
		</div>
	</div>
</body>
</html>
<?php
}
}
?>