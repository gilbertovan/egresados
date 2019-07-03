<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="admin-area.php" class="logo">
        <span class="logo-mini"><b>ITI</b></span>
        <span class="logo-lg"><b>ITI</b>stmo</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#"  class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav" >
            <?php if(isset($_SESSION['usuarioAdmin'])){
              echo '
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  '.$_SESSION['usuarioAdmin'].' <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                
                  <li><a href="../logout.php">Cerrar sesión</a></li>
               ';
            }
        
            ?> 
             
           </ul>
          </li>                  
          </ul>
        </div>
      </nav>
    </header>
