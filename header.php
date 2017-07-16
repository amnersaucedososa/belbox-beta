<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="home.php" class="logo"><!-- Logo -->
                <span class="logo-mini"><b>B</b>EL</span>
                <span class="logo-lg"><b>Bel</b>Box</span> 
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><!-- Sidebar toggle button-->
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="images/profiles/<?php echo $profile_pic; ?>" class="user-image" alt="User Image">
                              <span class="hidden-xs"><?php echo $fullname; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header"><!-- User image -->
                                    <img src="images/profiles/<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
                                    <p>
                                      <?php echo $fullname; ?>
                                      <small>Miembro desde el:  <?php $created_at=date('d/M/Y', strtotime($created_at)); echo $created_at ?></small>
                                    </p>
                                </li>
                                <li class="user-footer"><!-- Menu Footer-->
                                    <div class="pull-left">
                                        <a href="home.php" class="btn btn-default btn-flat">Mi perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="action/logout.php" class="btn btn-default btn-flat">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>