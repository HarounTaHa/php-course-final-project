
<?php
include('../../../database/databaseConnection.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST['id-publish_houses'];
	echo "$id";
	if (!empty($id)) {
		$query = "DELETE from publish_houses where id = $id";
		$result = mysqli_query($connection, $query);

		if ($result) {
			echo "Deleted successfully";
		} else {
			echo  "Failed to delete ";
			echo $connection->error;
		}

		
	} else {
		echo "ID is missing";
	}
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>
	<a href="show_publish_houses.php">
		Show publish houses
	</a>
</body>
</html>