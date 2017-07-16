<?php
    
    session_start();

    $id=$_SESSION['user_id'];

    include "../config/config.php";

    if (isset($_FILES["file"]))
    {
        $file = $_FILES["file"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $carpeta = "../images/profiles/";
        
        if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
        {
          echo "Error, el archivo no es una imagen"; 
        }
        else if ($size > 1024*1024)
        {
          echo "Error, el tamaño máximo permitido es un 1MB";
        }
        else
        {
            $src = $carpeta.$nombre;
           @move_uploaded_file($ruta_provisional, $src);

           $query=mysqli_query($con, "UPDATE user set image=\"$nombre\" where id=$id");
           if($query){
            echo "<br><div class='alert alert-success' role='alert'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>¡Bien hecho!</strong> Perfil Actualizado Correctamente
            </div>";
           }else{
            // echo "errror";
           }
        }
    }

?>