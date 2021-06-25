
<?php
include('../../../database/databaseConnection.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST['id-author'];
	echo "$id";
	if (!empty($id)) {
		$query = "DELETE from authors where id = $id";
		$result = mysqli_query($connection, $query);

		if ($result) {
			echo "Deleted successfully";
		header("Location: http://localhost/web_course_project/templates/temp_models/authors/show_authors.php ");
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
