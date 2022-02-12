<?php 
include "config.php";

// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get variables from the form
		$name = $_POST['name'];
		$email = $_POST['email'];
    $address = $_POST['address'];
		$joindate = $_POST['joindate'];
		$phone = $_POST['phone'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];

		//write sql query

		$sql = "INSERT INTO `users`(`name`, `email`, `address`, `joindate`, `phone`,`post`,`salary`) VALUES ('$name','$email','$address','$joindate','$phone','$post','$salary')";

		// execute the query

		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "New record created successfully.";
		}else{
			echo "Error:". $sql . "<br>". $conn->error;
		}

		$conn->close();

	}



?>

<!DOCTYPE html>
<html>
<body>

<h2>Form</h2>

<form action="" method="POST">
  <fieldset>
    <legend>Employess information:</legend>
    Name:<br>
    <input type="text" name="name">
    <br>
    Email:<br>
    <input type="email" name="email">
    <br>
    Address:<br>
    <input type="text" name="address">
    <br>
    joindate:<br>
    <input type="text" name="joindate">
    <br>
    phone:<br>
    <input type="text" name="phone">
    <br>
    post:<br>
    <input type="text" name="post">
    <br>
    salary:<br>
    <input type="text" name="salary">
    <br><br>
   <input type="submit" value="submit" name="submit">
  </fieldset>
</form>

</body>
</html>