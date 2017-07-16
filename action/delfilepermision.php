<?php

	include "../config/config.php";

	if(!empty($_GET)){

		$id=$_GET["id"];
		$fp = mysqli_query($con, "select * from permision where id=$id");
		while ($rows=mysqli_fetch_array($fp)) {
			$id_permision=$rows['id'];
			$file_id=$rows['file_id'];
		}

		$file=mysqli_query($con,"select * from file where id=$file_id");
		while ($row=mysqli_fetch_array($file)) {
			$file_code=$row['code'];
		}

		$del=mysqli_query($con, "delete from permision where id=$id_permision");
		if ($del) {
			// echo "usuario eliminado correctamente";
			header("location: ../filepermision.php?id=".$file_code."&delsuccess");

		} else {
			// echo "hubo un error al eliminar al usuario";
			header("location: ../filepermision.php?id=".$file_code."&delerror");
		}

	}


?>