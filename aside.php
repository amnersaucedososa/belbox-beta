    <aside class="main-sidebar"><!-- Left side column. contains the logo and sidebar -->
        <section class="sidebar"><!-- sidebar: style can be found in sidebar.less -->
            <div class="user-panel"> <!-- Sidebar user panel -->
                <div class="pull-left image">
                    <img src="images/profiles/<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $fullname; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu"><!-- sidebar menu: : style can be found in sidebar.less -->
                <li class="header">NAVEGACIÓN</li>

                <li class="<?php if(isset($active1)){echo $active1;}?>">
                    <a href="home.php"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
                </li>

                <li class="<?php if(isset($active2)){echo $active2;}?>">
                    <a href="myfiles.php"><i class="fa fa-archive"></i> <span>Mis archivos</span></a>
                </li>

                <li class="<?php if(isset($active3)){echo $active3;}?>">
                    <a href="shared.php"><i class="fa fa-globe"></i> <span>Compartidos conmigo</span></a>
                </li>

                <li class="<?php if(isset($active4)){echo $active4;}?>">
                    <a href="newfolder.php"><i class="fa fa-folder"></i> <span>Nueva carpeta</span></a>
                </li>

                <li class="<?php if(isset($active5)){echo $active5;}?>">
                    <a href="newfile.php"><i class="fa fa-upload"></i> <span>Nuevo Archivo</span></a>
                </li>

                <li class="<?php if(isset($active6)){echo $active6;}?>">
                    <a href="about.php"><i class="fa fa-smile-o"></i> <span>Acerca del autor</span></a>
                </li>

            </ul>
        </section><!-- /.sidebar -->
    </aside>
