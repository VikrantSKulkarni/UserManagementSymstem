<?php include("base.php");
include("database.php");
if(isset($_POST['submit'])){
	$empname = $_POST["txtname"];
	$empemail= $_POST["txtemail"];
	$empobile = $_POST["txtmobile"];
	$gender = $_POST["gender"];
	$empaddress = $_POST["txtaddress"];
	$filename = $_FILES['profile']['name'];
	$tmpname =$_FILES['profile']['tmp_name'];



	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["profile"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	$check = getimagesize($_FILES["profile"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
		} else {
		echo "<script>alert('File Is Not An Images!');<script>";
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
		  $uploadOk = 0;
		}
		if (file_exists($target_file)) {
			echo "<script>alert('Sorry, file already exists.');</script>";
			$uploadOk = 0;
		  }
	
	// Check file size
	if ($_FILES["profile"]["size"] > 50000000) {
		echo "<script>alert('Sorry, your file is too large.');</script>";
		$uploadOk = 0;
	  }
	  
	if ($uploadOk == 0) {
			echo "<script>alert('Sorry, your file was not uploaded.');</script>";
		  // if everything is ok, try to upload file
		  } else {
			$sql = "INSERT INTO users (userName, userEmail ,phoneNo,gender,location,profilePic)
			VALUES ('$empname', '$empemail','$gender','$empobile','$empaddress','$filename')";
			if ($conn->query($sql) === TRUE) {
				echo "<script>alert('Your Data Has Been Sent to US !');</script>";
			move_uploaded_file($_FILES["profile"]["tmp_name"],$target_file);
			echo"<script>alert('Your File Is Uploaded Succefully !');</script>";
			header("Location:index.php");
			} else {
				$uploadOk=0;
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Add Users </title>
</head>
<body>
<?php include("navbar.php");?>
 <br><br>
<div class="row justify-content-center">
	<div class="col-md-6">
	<div class="card">
		<div class="card-body">
 			<h5 class="card-title text-center">Add Users </h5>
  			<p class="card-text">
  			<form class="form-group"  method="post" action="" enctype="multipart/form-data">
   				<label for="name" class="form-label">Enter Your Name </label>
   				<input type="text"  name="txtname" id="name" onkeyup="check()" class="form-control" placeholder=" Enter Your Name " required>
   				
   				<label for="email" class="form-label">Enter Your Email </label>
   				<input type="email" name="txtemail" class="form-control" placeholder=" Enter Your Email"required>
   			
   				<label for="email" class="form-label">Enter Your Mobile </label>
   				<input type="number" id="mobile" onsubmit="check()" name="txtmobile" class="form-control" placeholder=" Enter Your Mobile " required>
				<p class="text-danger" id="msg"></p>
				<label class="form-label" for="gender">Gender :</label><br>
   				<input class="form-check-input" type="radio" name="gender" value="Male" required>Male 
   				<input class="form-check-input" type="radio" name="gender" value="Female" required>FeMale <br>
	
   					
  				<label for="email" class="form-label">Enter  Address</label>
   				<input type="text" name="txtaddress" class="form-control" placeholder=" Enter Where Do You Loacated" required>
    			
   				<label for="email" class="form-label">Choose Your Profile Pic  </label>
   				<input type="file" name="profile" class="form-control" required>
   			
   				<input value="Add" class="mt-4 btn btn-primary" name="submit" type="submit">
  			</form>
   		</p>
   	</div>
   	</div>
	</div>
</div>
<script>
	function check(){
    let mobile = document.getElementById("mobile");
    let msg = document.getElementById("msg");
    if(mobile.value.length!=10){
		msg.innerHTML="Please Add 10 digit number";
    }else{
        msg.innerHTML="Please Add 10 digit number";
    }
}

</script>
</body>
</html>