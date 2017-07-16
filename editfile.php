<?php 
$active2="active";
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 


$id_code=$_GET["id"];
$file = mysqli_query($con, "select * from file where code=\"$id_code\"");
while ($rows=mysqli_fetch_array($file)) {
    $id=$rows['id'];
    $filename=$rows['filename'];
    $code=$rows['code'];
    $is_public=$rows['is_public'];
    $description=$rows['description'];
}

?>
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Editar Archivo <small><?php echo $filename;?></small> </h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Editar Archivo </li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Archivo actualizado correctamente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo actualizar el archivo.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                          <h3 class="box-title"><i class="fa fa-pencil">Actualizar Archivo: </i><a href="file.php?code=<?php echo $code; ?>"> <?php echo $filename; ?></a></h3>
                        </div><!-- /.box-header -->
                        <form action="action/editfile.php" method="post" role="form"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Descripci+on</label>
                                        <textarea name="description" class="form-control" rows="3"><?php echo $description;?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" name="is_public" <?php if($is_public){ echo "checked"; }?>> &nbsp;Archivo Publico
                                        </label>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <button type="submit" class="btn btn-success">Actualizar Archivo</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->


<?php include "footer.php"; ?>