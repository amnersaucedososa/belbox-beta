<?php

	include "../config/config.php";

if(!empty($_POST)){

	$id=$_POST["id"];
	$file = mysqli_query($con, "select * from file where id=$id");
	while ($rows=mysqli_fetch_array($file)) {
		$code=$rows['code'];
	}

	$description = $_POST["description"];
	$is_public = isset($_POST["is_public"])?1:0;

	$sql = "update file set description=\"$description\", is_public=\"$is_public\" where id=$id";

	$update=mysqli_query($con, $sql);
	if ($update) {
		// echo "actualizado con exito";
		header("location: ../editfile.php?id=".$code."&success");
	} else {
		// echo "hubo un error al actualizar los datos";
		header("location: ../editfile.php?id=".$code."&error");
	}
	

}


?>