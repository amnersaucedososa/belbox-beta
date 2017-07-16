<?php	
	session_start();

	if (empty($_POST['fullname'])) {
           $errors[] = "Nombre vacío";
        }else if (
			!empty($_POST['fullname'])
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$id = $_SESSION['user_id'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];

		$sql="UPDATE user set fullname=\"$fullname\", email=\"$email\" where id=$id";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Datos actualizados satisfactoriamente.";

				$password = sha1(md5($_POST['password']));	

				if($_POST['password']!=""){
					if($_POST['new_password']==$_POST['confirm_new_password']){
						$sql = mysqli_query($con,"SELECT * from user where id=$id");
						while ($row = mysqli_fetch_array($sql)) {
					    	$p = $row['password'];
						}
					if ($p==$password){ //comprobamos que la contraseña sea igual a la anterior
						$update_passwd=mysqli_query($con,"UPDATE user set password=\"$password\" where id=$id");
						if ($update_passwd) {
	            			$messages[] = " Y la contraseña fue actualizada";
						}
					}else{
	            		$errors[] = "la contraseña no coincide con la anterior";
					}
				}else{
	            	$errors[] = "las nuevas contraseñas no coinciden";
				}

			}


			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>