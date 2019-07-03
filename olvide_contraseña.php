<?php
    session_start();
    
    $titulo = 'Plataforma de Egresados | Olvidé mi Contraseña';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
?>

    <div class="container" id="pagina-plantilla">
        <h1 class="titulo-de-pagina">Alerta</h1>

        <center><p class="caja colorcues">
            Por seguridad contacte con el Jefe del Departamento de Gestión Tecnológica y Vinculación en <a href="https://outlook.live.com/mail/inbox/vinculacion@itistmo.edu.mx" target="_blank">vinculacion@itistmo.edu.mx</a> para restablecer su contraseña de forma segura.</p></center>
        
    </div>


<?php
   
    require_once('parciales/abajo.php');
?>