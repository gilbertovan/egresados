<?php 
  require_once('parciales/logo.php');
  $id_user =$_SESSION['usuario']['Id'];
  
?>
<div class="barraN"> 
  </div> <!-- fin de la barra-->
  <div class="barra">
    <div class="cont">
      <div class="Bienvenido">
        <div class="container1" id="pagina-principio1">
          <?php
          if(isset($_SESSION['usuario'])){
              echo '
              <center><p><b>Bienvenido '.$_SESSION['usuario']['Usuario'].'</b></p></center>
              ';      
            }
            else{
              header('Location: index.php');
            }
          ?>
        </div>
        <p>¡Felicidades! Gracias a tu esfuerzo ya formas parte de la comunidad de egresados del ITIstmo.</p>
      </div> 
    </div>
  </div>
  <div class="barraN">      
  </div>
  <div>
    <section>
    
      <div  class="parrafos">
         
                 
        <h2 >CUESTIONARIO DE SEGUIMIENTO DE EGRESADOS</h2>
        <br>
        
        <p><b>Estimado egresado:</b></p>
        <br>
        <p>El Instituto Tecnológico Del Istmo tiene el compromiso de dirigir sus servicios hacia la mejora continua para seguir colaborando en la formación profesional e integral de nuestros alumnos. Ante este panorama, es de suma importancia tomar en cuenta tu opinión como egresado de nuestra institución como factor de cambios y reformas, por lo que por este medio solicitamos tu valiosa cooperación en esta investigación del Seguimiento de Egresados, que nos permitirá obtener información valiosa para analizar la problemática del mercado laboral y sus características, así como las competencias laborales de nuestros egresados.
        <br>
        <br>
        Las respuestas del cuestionario anexo serán tratadas con absoluta confidencialidad y con fines meramente estadísticos.
        <br>
        <br>
        Con nuestro agradecimiento por su cooperación, recibe un cordial saludo.</p>
        <br>
        <br>  
    
        <center><p>A T E N T A M E N T E
        <br>
        <br>
        <b> Excelencia en Educación Tecnológica</b>® 
        <br>
        “Por una tecnología propia como principio de libertad” 
        </p>
        <br>
      
           <a class="botton" href="Cuestionario.php?id=<?php echo $id_user;?>" target="_self">Comenzar</a></center><!--_self _black-->

        <br>
        <br>
         <hr class="h">
      </div>
    </div>
  </section>
    <section class="parrafos">
      <div>
        <br>
        <br>
        <h2>Misión</h2>

        <p>El <b> Instituto Tecnológico del Istmo </b>propone una filosofía  de trabajo,  para alcanzar a través del servicio de la Educación Superior que imparte, niveles óptimos de desarrollo social, cultural y profesional de nuestro país y sostiene sus compromisos ante la comunidad regional y nacional.</p>
        <LI>  Dar educación integral en la formación de profesionales, éticos, capaces,  altamente calificados y comprometidos por el desarrollo y bienestar de la Nación. </LI>
        <li>Ser una oferta de Educación Superior Tecnológica en la comunidad para afrontar los retos del desarrollo que requiere y demanda la región del istmo oaxaqueño.</li>
        <li>Difundir y concertar programas de vinculación y extensión con todos los sectores productivos y de servicios que tengan como premisa el desarrollo y superación de la región del istmo.</li>
        <li>Generar conocimientos con excelencia académica, a través de una permanente actualización de los recursos académicos e infraestructura.</li>
        <h2>Visión</h2>
        <p>“Ser una Institución de Educación  Superior de vanguardia con reconocimiento internacional y excelencia académica que garantice y ofrezca servicios de calidad, investigación y posgrado, responsable y honesta, que de respuesta a las necesidades de la comunidad.”</p>
        <br>
        <br>
        <hr class="h">
      </div>
    </section>
    <br>
    <section class="programa ">
      <div class="contenedor-imagen"> 
        <img src="imgenes/egresados.svg" > 
      </div>
      <div class="contenido-programa"> 
        <div class="contenedor ">
          <div class="programa-trabajo ">
            <h2> Bolsa de Trabajo</h2>
               <?php
                  try {
                    include_once'recursos/conexion.php';
                    $sql = "SELECT * FROM bolsa_trabajo ORDER BY (id_trabajo) desc";
                    $resultado = $con->query($sql);

                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                    
                  }($trabajo= $resultado->fetch_assoc())?>
                 
           
            <div id="trabajo" class="info-trabajo ocultar clearfix">
              <div class=" detalle-trabajo"> 

                <p><i class="fa fa-building"></i> <b class="may"> <?php echo $trabajo['empresa']; ?></b></p>
                <p><i class="fa fa-briefcase"></i><?php echo $trabajo['vacante']; ?></p> 
                <p><i class="fa fa-id-card "></i><?php echo $trabajo['area']; ?></p>
                <p><i class="fa fa-align-justify"></i><?php echo $trabajo['des']; ?></p>
                <p><i class="fa fa-phone"></i><?php echo $trabajo['contacto']; ?></p>
                
                       
              </div>
              <a href="trabajo.php" class="button float-right">Ver Todos</a>
              </div>
          </div>
        </div>     
      </div>
    </section>
    <br>

    <div class="mundial">
          
      <h2>La  bolsa de trabajo de OCCMundial</h1>
        <center><p><a target="_blank" href="https://www.occ.com.mx/">
          <img src="imgenes/occ.png"></a>
          <a target="_blank" href="https://aprenderis.com/">
            <img src="imgenes/eprenderis.svg"></a>
          <a target="_blank" href="https://www.occuniversitario.com/">
            <img src="imgenes/uni.png"></a>
          <a target="_blank" href="https://www.expocityocc.com/">
            <img src="imgenes/expo.png"></a>
          <a target="_blank" href="https://www.occ.com.mx/educacion/" >
            <img src="imgenes/e.png"></a>
          <a target="_blank" href="https://www.occ.com.mx/listing//">
            <img src="imgenes/listing.png"></a>
          </p>
        </center>
    </div>

    <br>
  

    <div class="barra">
      <div class="cont">

        <p>El éxito trata de crear beneficio para todos y disfrutar del proceso. Si te puedes enfocar en eso y adoptar la definición, el éxito es tuyo.</p><p>Kelly Kim.</p>
      </div>
  </div>
  </head>
  <footer class="site-footer footerPrincipal">
    <div class="contenedorF clearfix">
      <div class="info">
         <a href="index.php">Principio</a> |
         <a target="_blank" href="http://itistmo.mx/">Nosotros</a>

        <p>Carretera Panamericana km. 821, C.P. 70000 Hca. Cd. de Juchitán de Zaragoza, Oax. (971) 7111042, &nbsp  &nbsp 7112559, &nbsp  &nbsp Fax ext. 101</p>
      </div>
      <div class="contacto pie-derecho iconos-redes-sociales">
         <a target="_blank" href="https://www.facebook.com/instituto.tecnologicodelistmo.5/"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://twitter.com/difusion_iti"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="https://www.youtube.com/user/ComunicacionITI"><i class="fa fa-youtube"></i></a>
        <p>subplan@itistmo.edu.mx &nbsp  &nbsp  vinculacion@itistmo.edu.mx  dirección@itistmo.udu.mx</p>

    </div>
    </footer>
  </html>