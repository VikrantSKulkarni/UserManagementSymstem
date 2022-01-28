<?php 
session_start();
include("base.php");
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-UserManagement</title>
</head>
<body>
    <?php include("navbar.php");?><br><br>
	<div class="row justify-content-center">
		<div class="col-md-10">
		<h3>All Users Are Listed Here</h3>
		<table class="table table-dark">
  			<thead>
    			<tr>
      				<th scope="col"> Name </th>
		      		<th scope="col"> Email </th>
		      		<th scope="col"> Phone </th>
		      		<th scope="col"> Gender </th>
		      		<th scope="col"> Location </th>
		      		<th scope="col"> Profile Picture </th>
		    	</tr>
  			</thead>
  			<tbody>
    			<tr>
<?php
$sql = "SELECT * from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {?>
     				<td><?php echo $row['userName']; ?></td>
      				<td><?php echo $row['userEmail']; ?></td>
      				<td><?php echo $row['phoneNo']; ?></td>
      				<td><?php echo $row['gender']; ?></td>
      				<td><?php echo $row['location']; ?></td>
      				<td> <img  class="profile" src="uploads/<?php echo $row['profilePic'];?>" alt=""> </td>
      			</tr>
				  
                <?php
  }echo $row['profilePic'];
} else {
  echo "0 results";
}
$conn->close();
?>
 
    		</tbody>
    	</table>
		</div>
	</div>

</body>
</html>