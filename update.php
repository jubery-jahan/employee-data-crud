<?php 
include "config.php";

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$joindate = $_POST['joindate'];
		$phone = $_POST['phone'];
		$post = $_POST['post'];
		$salary = $_POST['salary'];

		// write the update query
		$sql = "UPDATE `users` SET `name`='$name',`email`='$email',`address`='$address',`joindate`='$joindate',`phone`='$phone',`post`='$post',`salary`='$salary' WHERE `id`='$user_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$name = $row['name'];
			$email = $row['email'];
			$address = $row['address'];
			$joindate  = $row['joindate'];
			$phone = $row['phone'];
			$post = $row['post'];
			$salary = $row['salary'];
			$id = $row['id'];
		}

	?>
		<h2>Employee Data Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Employee information:</legend>
		    name:<br>
		    <input type="text" name="name" value="<?php echo $name; ?>">
		    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
		    <br>
		    Email:<br>
		    <input type="email" name="email" value="<?php echo $email; ?>">
		    <br>
			Address:<br>
		    <input type="text" name="address" value="<?php echo $address; ?>">
		    <br>
		    Join Date:<br>
		    <input type="text" name="joindate" value="<?php echo $joindate; ?>">
		    <br>
			phone:<br>
		    <input type="number" name="phone" value="<?php echo $phone; ?>">
		    <br>
			Post:<br>
		    <input type="text" name="post" value="<?php echo $post; ?>">
		    <br>
			Salary:<br>
		    <input type="number" name="salary" value="<?php echo $salary; ?>">
		    <br>
		    <br>
		    <input type="submit" value="Update" name="update">
		  </fieldset>
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>