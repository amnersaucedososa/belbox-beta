<?php
	session_start();

	if (empty($_POST['email'])) {
           echo  "<script>alert(\"Correo electrónico invalido\"); window.location=\"../index.php\"</script>";
        } else if (empty($_POST['password'])){
			echo  "<script>alert(\"Contraseña invalida\"); window.location=\"../index.php\"</script>";
		} else if (
			!empty($_POST['email'])  &&
			!empty($_POST['password'])
		){
			
		//Contiene las variables de configuracion para conectar a la base de datos
		include_once "../config/config.php";


		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$password=sha1(md5(mysqli_real_escape_string($con,(strip_tags($_POST["password"],ENT_QUOTES)))));

		$sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "';";
            $query = mysqli_query($con,$sql);
			$numrows = mysqli_num_rows($query);

		if ($row = mysqli_fetch_array($query)) 
		{
			if ($row['is_active']>0) { //comprovamos que el usuario este activo

					$_SESSION['user_id'] = $row['id'];

					print "Cargando ... $email";
					print "<script>window.location='../home.php';</script>";
				
				
			}else{
				$error=sha1(md5("cuenta inactiva"));
				header("location: ../index.php?error=$error");
			}
		}else{
			$invalid=sha1(md5("contrasena y email invalido"));
			header("location: ../index.php?invalid=$invalid");
		}
	}	

?>