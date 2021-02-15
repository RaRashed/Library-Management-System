<?php
require_once '../dbcon.php';

if (isset($_GET['bookdelete'])) {
	$id = base64_decode($_GET['bookdelete']);
mysqli_query($con,"delete from books where id ='$id'");
header('location:manage-books.php');

}
?>