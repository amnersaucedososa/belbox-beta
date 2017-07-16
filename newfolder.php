<?php 
    $active4="active"; 
    include "head.php"; 
    include "header.php"; 
    include "aside.php"; 
 ?>
    
    <div class="content-wrapper"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
            <h1>Nueva Carpeta</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="myfiles.php"><i class="fa fa-archive"></i> Mis Archivos</a></li>
                <li class="active">Nueva Carpeta</li>
            </ol>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row"><!-- Small boxes (Stat box) -->
                <div class="col-md-6 col-md-offset-3">
                    <?php
                        // get messages
                        if (isset($_GET['success'])) {
                            echo "<p class='alert alert-success'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Bien hecho! </strong> Carpeta creada satisfactioramente.</p>";
                        }elseif(isset($_GET['error'])) {
                             echo "<p class='alert alert-danger'> <i class=' fa fa-exclamation-circle'></i> <strong>¡Error! </strong>No se pudo crear la carpeta.</p>";
                        }
                    ?>
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title"><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button> Nueva Carpeta</h3>
                        </div><!-- /.box-header -->
                        <form role="form" action="action/addfolder.php" method="post"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name_folder">Nombre</label>
                                    <input type="text" name="filename" class="form-control" id="name_folder" placeholder="Nombre de la carpeta">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Descripción ..."></textarea>
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
                                <button type="submit" class="btn btn-primary">Crear Carpeta</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
        </section>
    </div><!-- /.content -->

<?php include "footer.php"; ?>