<?php 
    $active3="active";
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1><i class="fa fa-globe"></i> Archivos Compartidos Conmigo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Compartidos conmigo</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-xs-12">
                <?php
                    $user=$_SESSION["user_id"];
                    $files = mysqli_query($con,"select * from permision where user_id=".$user);

                    $count = mysqli_num_rows($files);

                    while ($r=mysqli_fetch_array($files)) {
                        $id=$r['id'];
                    }
                ?>
                    <?php if($count>0):?>
                    <div class="box">
                        <div class="box-header"></div> <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Archivo</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                    </tr>
                                    <?php foreach($files as $fx):

                                        $fx = mysqli_query($con,"select * from permision where id=$id");
                                        while ($rows=mysqli_fetch_array($fx)) {
                                            $file_id=$rows['file_id'];
                                        }

                                        $file=mysqli_query($con,"select * from file where id=$file_id");
                                        while ($row=mysqli_fetch_array($file)) {
                                            $file_is_folder=$row['is_folder'];
                                            $file_filename=$row['filename'];
                                            $file_code=$row['code'];
                                            $file_description=$row['description'];
                                            $file_created_at=$row['created_at'];
                                       }
                                       // echo var_dump($file);
                                    ?>
                                    <tr>
                                        <td>    
                                            <?php if($file_is_folder):?>
                                            <a href="myfiles.php?folder=<?php echo $file_code;?>">
                                                <i class="fa fa-folder"></i>
                                            <?php else:?>
                                            <a href="file.php?code=<?php echo $file_code;?>">
<?php
    //compruebbo que tipo de archivo tengo en el servidor 
    //by abisoft
    $url = "storage/data/".$file_is_folder."/".$file_filename;
    $ftype=explode(".", $url);

   // if(file_exists($url)){
       if($file_filename!=""){
           // if(!$file['is_folder']){
                //comprobar si es imagen
                if($ftype[1]=="png" || $ftype[1]=="jpeg" || $ftype[1]=="gif" || $ftype[1]=="jpg" || $ftype[1]=="bmp"){
                    echo "<i class='fa fa-file-image-o'></i>";
                }
                //compruebo si es audio
                elseif($ftype[1]=="mp3" || $ftype[1]=="wav" || $ftype[1]=="wma" || $ftype[1]=="ogg" || $ftype[1]=="mp4"){
                    echo "<i class='fa fa-file-audio-o'></i>";
                }
                //comrpuebo si son zip, rar u otros
                elseif ($ftype[1]=="zip" || $ftype[1]=="rar" || $ftype[1]=="tgz" || $ftype[1]=="tar") {
                    echo "<i class='fa fa-file-archive-o'></i>";
                }
                //compruebo si es un archivo de codigo
                elseif ($ftype[1]=="php" || $ftype[1]=="php3" || $ftype[1]=="html" || $ftype[1]=="css" || $ftype[1]=="py" || $ftype[1]=="java" || $ftype[1]=="js" || $ftype[1]=="sql") {
                    echo "<i class='fa fa-file-code-o'></i>";
                }
                //compruebo si es el archivo es de tipo pdf
                elseif ($ftype[1]=="pdf") {
                    echo "<i class='fa fa-file-pdf-o'></i>";
                }
                 //compruebo si es el archivo es excel
                elseif ($ftype[1]=="xlsx") {
                    echo "<i class='fa fa-file-excel-o'></i>";
                }
                 //compruebo si es el archivo es de powerpoint
                elseif ($ftype[1]=="pptx") {
                    echo "<i class='fa fa-file-powerpoint-o'></i>";
                }
                 //compruebo si es el archivo es de word
                elseif ($ftype[1]=="docx") {
                    echo "<i class='fa fa-file-word-o'></i>";
                }
                 //compruebo si es el archivo es de texto
                elseif ($ftype[1]=="txt") {
                    echo "<i class='fa fa-file-text-o'></i>";
                }
                 //compruebo si es el archivo es de video
                elseif ($ftype[1]=="avi" || $ftype[1]=="avi" || $ftype[1]=="asf" || $ftype[1]=="dvd" || $ftype[1]=="m1v" || $ftype[1]=="movie" || $ftype[1]=="mpeg" || $ftype[1]=="wn" || $ftype[1]=="wmv") {
                    echo "<i class='fa fa-file-video-o'></i>";
                }else{
                echo "<i class='fa fa-file-o'></i>";
            }
       // }
    }
  //  }

?>  
                                            <?php endif; ?>
                                            <?php echo $file_filename; ?></a>
                                        </td>
                                        <td style="width: 600px"><?php echo $file_description; ?></td>
                                        <td><?php echo $file_created_at; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <?php else:?>
                    <div class="col-md-6 col-md-offset-3">
                        <br><br><br><br><br>
                        <p class="alert alert-warning"> 
                        <i class="fa fa-exclamation-triangle"></i> 
                        No se encontraron archivos en la carpeta actual</p>
                    </div>
                    <?php endif;?>
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->


<?php include "footer.php"; ?>