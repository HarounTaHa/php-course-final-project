<?php

	$connection = mysqli_connect('localhost','root','','web_course');
	mysqli_query($connection,"set NAMES utf8");
if(!$connection){
			
	echo "Connected Failed";

	die("Connected Failed : ". mysqli_connect_error());

}else{

		echo "Connected Success";
}

?>