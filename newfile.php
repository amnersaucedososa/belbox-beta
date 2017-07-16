<?php 
    $active5="active"; 
    include "head.php"; 
    include "header.php";
    include "aside.php"; 

    $folders = mysqli_query($con, "select * from file where user_id=$my_user_id and is_folder=1 and folder_id is NULL order by created_at desc");

?>

    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nuevo Archivo</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nuevo Archivo</li>
            </ol>
        </section>

        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong>archivo subido exitosamente</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-warning'> <i class=' fa fa-exclamation-circle'></i> No se pudo subir, hubo un error.</p>";
                        }elseif (isset($_GET['error2']) && isset($_GET['max_size'])) {
                            echo "<p class='alert alert-info'> <i class=' fa fa-exclamation-circle'></i> Hubo un error el archivo supero el peso máximo.</p>";
                        }elseif (isset($_GET['error3']) && isset($_GET['fatal'])) {
                            echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> Error fatal, el archivo no se pudo cargar.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Cargar Nuevo Archivo</h3>
                        </div><!-- /.box-header -->

                        <form role="form" action="action/addfile.php" method="post" enctype="multipart/form-data"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="E.j: Mi primera foto con mi novia!..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Carpeta</label>
                                    <select class="form-control select2" name="folder_id">
                                      <option value="" selected="selected">---Seleciona tu carpeta---</option>
                                      <?php foreach($folders as $fld ):?>
                                      <option value="<?php echo $fld['id'];?>"><?php echo $fld['filename'];?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="btn btn-my-button btn-file" style="width: 100%; margin-top: 5px;">
                                        Selecionar Archivo<input type="file" name="filename">
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" name="is_public"> &nbsp;Archivo Publico
                                        </label>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Subir archivo</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>