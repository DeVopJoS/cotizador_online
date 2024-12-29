<div id="header" class="header navbar-default">
    <div class="navbar-header">
        <a href="index-1.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <ul class="navbar-nav navbar-right">
        
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="..\..\assets\img\user\user-13.jpeg" alt="">
                <span class="d-none d-md-inline"><?php echo $_SESSION['usu_nom'].' '.$_SESSION['usu_ape']; ?></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:;" class="dropdown-item">Editar Perfil</a>
                <a href="javascript:;" class="dropdown-item">Calendario</a>
                <div class="dropdown-divider"></div>
                <a href="../Logout/logout.php" class="dropdown-item">Cerrar Sesión</a>
            </div>
        </li>
    </ul>
</div>