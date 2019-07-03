<aside class="main-sidebar">
  <section class="sidebar">
  <div class="user-panel">  
    <div class="pull-left info" >
      <?php if(isset($_SESSION['nombreAdmin'])){
          echo '<p class ="nombre"> '.$_SESSION['nombreAdmin'].' </p> '; } ?> 
    </div>
  </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header menu" > <h5> MENÚ DE  ADMINISTRACIÓN </h5></li>

       <?php if($_SESSION['nivel'] == 1): ?>
        <li class="treeview">
          <a href="#">
            <i class="fas fa-users-cog"></i>
            <span>Admistradores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="listADMIN.php"><i class="fas fa-user"> </i> Ver todos</a></li>
            <li><a href="crear-admin.php"><i class="fas fa-plus"></i> Registrar </a></li>
          </ul>       
        </li>
        <?php  endif; ?>
        
        <li class="treeview">
          <a href="#">
            <i class="fas fa-user-graduate"></i>
            <span>Egresados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="listE.php"><i class="fas fa-list-ul"></i>  Cuestionarios respodidos</a></li>
            <li><a href="listREGISTRADOS.php"><i class="fas fa-user"></i>  Usuarios</a></li>
            <li><a href="crear-egresado.php"><i class="fas fa-plus"></i>  Registrar</a></li>
            </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Bolsa de trabajo</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista-trabajo.php"><i class="fas fa-list-ul"></i> Ver todos</a></li>
            <li><a href="crear-trabajo.php"><i class="fas fa-plus"></i> Agregar</a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fas fa-chart-line"></i>
            <span>Busqueda de datos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
           
            <li><a href="perfil.php"><i class="fas fa-user-tie"></i> Perfil del egresado</a></li>
            <li><a href="pertinencia.php"><i class="fas fa-genderless"></i>  Pertinencia y disp.</a></li>
             <li><a href="actividadU.php"><i class="fa fa-building"></i>Actidivad a la que dedica</a>
             <li><a href="desempeñoP.php"><i class="fas fa-chalkboard-teacher"></i> Desempeño profesional</a></li>
            </ul>
        </li>
       
      </ul>
    </section>
  </aside>