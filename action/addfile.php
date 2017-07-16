<?php
	session_start();

	include "../config/config.php";
	include "class.upload.php";

	//print_r($_SESSION);
if(!empty($_POST) && isset($_SESSION["user_id"])){

	$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
	$code = "";
	for($i=0;$i<12;$i++){
	    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
	}

	$code= $code;
	$is_public = isset($_POST["is_public"])?1:0;
	$folder_id = $_POST["folder_id"]!="" ? $_POST["folder_id"]:"NULL";
	$folder_id;

	$user_id=$_SESSION["user_id"];
	$description = $_POST["description"];
	$created_at = "NOW()";


	$handle = new Upload($_FILES['filename']);
	if ($handle->uploaded) {
		$url="../storage/data/".$_SESSION["user_id"];
		$handle->Process($url);
		if($handle->processed){
	    $filename = $handle->file_dst_name;

		$sql = "INSERT INTO file (code, filename, description, is_public, user_id, is_folder, folder_id, created_at) VALUES (\"$code\",\"$filename\",\"$description\", $is_public, $user_id, 0, $folder_id, NOW());";

		$query=mysqli_query($con, $sql);
		if ($query) {
			// echo "archivo agregado con exito";
			// $success=sha1(md5("exito"));
			header("location: ../newfile.php?success");
		}else{
			// echo "no se pudo, subir hubo un error".mysqli_error($con)."<br>.".mysqli_errno($con);
			
			header("location: ../newfile.php?error");
		}

		}else{
			// echo "el archivo no se subio por peso maximo";
			header("location: ../newfile.php?error2&max_size");
		}

	}else{
			// echo "el archivo no se subio por peso maximo 2";
			header("location: ../newfile.php?error3&fatal");
	}
}

?>