<?php
    include "config/config.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BelBox v1.5 .:Iniciar Session:.</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

</head>
    <body class="hold-transition login-page">
        <div class="login-box">
                <?php 
                        $invalid=sha1(md5("contrasena y email invalido"));
                        if (isset($_GET['invalid']) && $_GET['invalid']==$invalid) {
                            echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Contraseña o correo Electrónico invalido
                                </div>";
                        }
                        $error=sha1(md5("cuenta inactiva"));
                        if (isset($_GET['error']) && $_GET['error']==$error) {
                            echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                                <strong>Error!</strong> Cuenta inactiva!
                                </div>";
                        }
                ?>
            <div class="login-logo">
                <a href="#"><b>Bel</b>Box</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Iniciar Sesion</p>
                <form action="action/login.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="Correo electrónico">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Recordar mi contraseña
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-flat">Iniciar Sesion</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                <a href="https://github.com/amnersaucedososa">Se te olvido la contraseña?</a><br>
                <a href="register.php" class="text-center">Registrarme</a>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
            });
          });
        </script>
    </body>
</html>
