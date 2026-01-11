<?php
require_once("../../SQL/DB_open.php");
$album_id = $_POST["album_id"];
$title = $_POST["title"];
$location = $_POST["location"];
$sql_query = "UPDATE album SET title=?, location=? WHERE album_id=?";
$stmt = mysqli_prepare($link, $sql_query);
mysqli_stmt_bind_param($stmt, "ssi", $title, $location, $album_id);
mysqli_stmt_execute($stmt);
header("Location: album.php");
require_once("../../SQL/DB_close.php");
?>