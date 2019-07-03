<?php
include_once'../funciones/sesiones.php';
include_once'../recursos/conexion.php';
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("ERROR");
}
include_once'templates/header.php';
include_once'templates/barra.php';
include_once'templates/navegacion.php';

?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <section class="content">
        <h1 class="titulosH">CUESTIONARIO DE SEGUIMIENTO DE EGRESADOS</h1>
        <div class="box">
          <div class="box-body">
          

           <?php
            $sql ="SELECT * FROM `perfiles` WHERE `Id` = $id";
            $resultado = $con->query($sql);
            $trabajoA = $resultado->fetch_assoc();
          ?>  

 


            <form role="form" method="post" class="cuest">
                <div class="form-group ">
                  <h3 class="titulosC"> I. PERFIL DEL EGRESADO</h3>
                  <br>

                    <?php
                      $sql ="SELECT *FROM `perfil_egresado` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?> 

                      <h4>Nombre completo:</h4>
                        <p><?php echo $trabajoA['apellido_paterno']; ?> <?php echo $trabajoA['apellido_materno']; ?> <?php echo $trabajoA['nombre'];?></p>
                        <br><br>

                      <h4>No. de control:</h4>
                        <p><?php echo $trabajoA['no_control'];?></p>
                        <br><br>

                      <h4>Fecha de nacimiento:</h4>
                       <?php
                      if (!empty($trabajoA['fecha_nacimiento'])) {
                        $fecha_egreso = $trabajoA['fecha_nacimiento'];
                        $fecha_egreso."<br>";
                        $fecha_egreso = strtotime($fecha_egreso);
                        $fecha_egreso = date ('d-m-Y', $fecha_egreso);
                        $fecha_egreso;
                      }
                      ?>
                        <P><?php echo $fecha_egreso;?></p>
                        <br><br>

                      <h4>CURP:</h4>
                        <P class='may' ><?php echo $trabajoA['curp'];?></p>
                        <br><br>

                      <h4>Sexo:</h4>
                        <P><?php echo $trabajoA['sexo'];?></p>
                        <br><br>

                      <h4>Estado civil:</h4>
                        <p><?php echo $trabajoA['estado_civil'];?></p>
                        <br><br>
                      
                      <h4>Otro:</h4>
                        <P><?php echo $trabajoA['otro_civil'];?></p>
                        <br><br>
                </div>

                  <div class="form-group ">

                   

                        <h4>Domicilio:</h4>
                        <br>
                        <h4>Calle:</h4>
                          <P><?php echo $trabajoA['calle'];?></p>
                          <br><br>

                        <h4>No. :</h4>
                          <P><?php echo $trabajoA['no'];?></p>
                          <br><br>

                        <h4>Colonia:</h4>
                          <P><?php echo $trabajoA['colonia'];?></p>
                          <br><br>

                        <h4>C.P. :</h4>
                          <P><?php echo $trabajoA['postal'];?></p>
                          <br><br>

                        <h4>Ciudad:</h4>
                          <P><?php echo $trabajoA['ciudad'];?></p>
                          <br><br>

                        <h4>Municipio:</h4>
                          <P><?php echo $trabajoA['municipio'];?></p>
                          <br><br>

                  </div>

                <div class="form-group ">

                        
                      <h4>Teléfono(s):</h4>
                        <P><?php echo $trabajoA['telefono'];?></p>
                        <br><br>
                        
                      <h4>Correo electrónico</h4>
                        <P><?php echo $trabajoA['correo'];?></p>
                        <br><br>
                        
                      <h4>Carrera de Egreso y Especialidad:</h4>
                        <p><?php echo $trabajoA['carrera_egreso'];?> - <?php echo $trabajoA['especialidad'];?></p>
                        <br><br>
                        
                      <h4>Fecha de Egreso:</h4>
                         <?php
                      if (!empty($trabajoA['fecha_egreso'])) {
                        $fecha_egreso = $trabajoA['fecha_egreso'];
                        $fecha_egreso."<br>";
                        $fecha_egreso = strtotime($fecha_egreso);
                        $fecha_egreso = date ('d-m-Y', $fecha_egreso);
                        $fecha_egreso;
                      }
                      ?>
                        <P><?php echo $fecha_egreso; ?></p>
                        <br><br>
                        
                      <h4>Titulado(a):</h4>
                        <P><?php echo $trabajoA['titulado'];?></p>
                        <br><br>
                        
                      <h4>Dominio de idioma extranjero:</h4>
                        <p>Ingles: <?php echo $trabajoA['dominio_idioma_extr'];?> %</p>
                        <br><br>
                        
                      <h4>Otro:</h4>
                        <P><?php echo $trabajoA['otro_idioma_extr'];?></p>
                        <br><br>
                        
                      <h4>Manejo de paquetes computacionales (Especificar):</h4>
                        <P><?php echo $trabajoA['paquetes_comp'];?></p>
                        <br><br>
                        <br><br>
                                                                   
                </div>

                <div class="form-group ">

                  <h3 class="titulosC"> II. PERTINENCIA Y DISPONIBILIDAD DE MEDIOS Y RECURSOS PARA EL APRENDIZAJE</h3>
                  <br>

                    <?php
                      $sql ="SELECT * FROM `pertinencia_disponibilidad` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>1.- Calidad de los docentes:</h4>
                        <p><?php echo $trabajoA['calidad_docentes'];?></p>
                        <br><br>
                      
                      <h4>2.- Plan de estudios:</h4>
                        <P><?php echo $trabajoA['plan_estudios'];?></p>
                        <br><br>
                      
                      <h4>3.- Oportunidad de participar en proyectos de investigación y desarrollo:</h4>
                        <P><?php echo $trabajoA['oportunidad_participar'];?></p>
                        <br><br>
                      
                      <h4>4.- Énfasis que se le prestaba a la investigación dentro del proceso de enseñanza:</h4>
                        <P><?php echo $trabajoA['enfasis_investigacion'];?></p>
                        <br><br>
                      
                      <h4>5.- Satisfacción con las condiciones de estudio (infraestructura):</h4>
                        <p><?php echo $trabajoA['satisfaccion_condiciones'];?></p>
                        <br><br>
                      
                      <h4>6.- Experiencia obtenida a través de la residencia profesional:</h4>
                        <P><?php echo $trabajoA['experiencia_obtenida'];?></p>
                        <br><br>
                        <br><br>
                         
                </div>

                <div class="form-group ">
                  <h3 class="titulosC"> III.UBICACIÓN LABORAL DE LOS EGRESADOS</h3>
                  <br>

                    <?php
                      $sql ="SELECT * FROM `ubicacion_laboral` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>1.- Actividad a la que se dedica actualmente:</h4>
                        <p><?php echo $trabajoA['actividad'];?></p>
                        <br><br>
        
                </div>

                  <div class="form-group">

                     

                        <h4>Si estudia, indica que es:</h4>
                          <p><?php echo $trabajoA['estudio'];?></p>
                          <br><br>

                        <h4>Otra:</h4>
                          <p><?php echo $trabajoA['otro_estudio'];?></p>
                          <br><br>

                        <h4>Especialidad e Institución:</h4>
                          <p><?php echo $trabajoA['especialidad_institucion'];?></p>
                          <br><br>
                    
                  </div>

                <div class="form-group">

                  

                      <h4>2.- En caso de trabajar:</h4>
                      <br>
                      <h4>Tiempo transcurrido para obtener el empleo:</h4>
                        <p><?php echo $trabajoA['tiempo_empleo'];?></p>
                        <br><br>
                      
                      <h4>3.- Medio para obtener empleo:</h4>
                        <p><?php echo $trabajoA['medio_empleo'];?></p>
                        <br>

                      <h4>Otros:</h4>
                        <p><?php echo $trabajoA['otro_empleo'];?></p>
                        <br><br>

                      <h4>4.- Requisitos de contratación:</h4>
                        <p><?php echo $trabajoA['requisitos'];?></p>
                        <br>

                      <h4>Otros:</h4>
                        <p><?php echo $trabajoA['otro_requisitos'];?></p>
                        <br><br>
                      
                      <h4>5.- Idioma que utiliza en su trabajo:</h4>    
                        <p><?php echo $trabajoA['idioma_trabajo'];?></p>
                        <br><br>

                </div>

                  <div class="form-group">


                        <h4>6.- En qué proporción utiliza en el desempeño de sus actividades laborales cada una de las habilidades del idioma:</h4>    
                          <p>Hablar: <?php echo $trabajoA['hablar'];?> %,  &nbsp&nbsp Escribir: <?php echo $trabajoA['escribir'];?> %, &nbsp&nbsp Leer: <?php echo $trabajoA['leer'];?> %, &nbsp&nbsp Escuchar: <?php echo $trabajoA['escuchar'];?> %</p>
                          <br><br>

                    </div>

                <div class="form-group">

                   
                        
                      <h4>7.- Antigüedad en el empleo:</h4>    
                        <p><?php echo $trabajoA['antiguedad'];?> </p>
                        <br><br>
                         <h4> Año de ingreso a la empresa:</h4> 

                        <p><?php     
                        if (empty($trabajoA['anio_ingreso']) && $trabajoA['anio_ingreso'] == 0 OR $trabajoA['anio_ingreso'] == NULL) {
                          echo "";
                        }
                        else{
                            if(!empty($trabajoA['anio_ingreso'])){
                                echo $trabajoA['anio_ingreso'];
                            }
                        } ?>
            </p>
                        <br><br>
                        
                      <h4>8.- Ingreso (salario mínimo diario):</h4> 
                        <p><?php echo $trabajoA['salario'];?></p>
                        <br><br>
                        
                      <h4>9.- Cargo:</h4>
                        <p><?php echo $trabajoA['cargo'];?></p>
                        <br><br>
                        
                      <h4>10.- Condición de trabajo:</h4> 
                        <p><?php echo $trabajoA['condicion'];?></p>
                        <br><br>

                      <h4>Otros:</h4> 
                        <p><?php echo $trabajoA['otro_condicion'];?></p>
                        <br><br>
                        
                      <h4>11.- Relación del trabajo con su área de formación:</h4> 
                        <p><?php echo $trabajoA['relacion'];?></p>
                        <br><br>

                </div>

                  <div class="form-group">

                        <h4>12.- Datos de la empresa:</h4>
                        <br>

                        <h4>ORGANISMO:</h4>
                          <p><?php echo $trabajoA['organismo'];?></p>
                          <br><br>
                          
                        <h4>Giro o actividad principal de la empresa u organismo:</h4>  
                          <p><?php echo $trabajoA['giro_empresa'];?></p>
                          <br><br>
                          
                        <h4>Razón social:</h4> 
                          <p><?php echo $trabajoA['razon'];?></p>
                          <br><br>
                         
                  </div>

                    <div class="form-group">


                          <h4>Domicilio:</h4>
                          <br>

                          <h4>Calle:</h4>
                            <p><?php echo $trabajoA['calle_em'];?></p>
                            <br><br>

                          <h4>No. :</h4>
                            <p><?php echo $trabajoA['no_em'];?></p>
                            <br><br>

                          <h4>Colonia:</h4>
                            <p><?php echo $trabajoA['colonia_em'];?></p>
                            <br><br>

                          <h4>C.P. :</h4>
                            <p><?php      
                            if (empty($trabajoA['cp_em']) && $trabajoA['cp_em'] == 0 OR $trabajoA['cp_em'] == NULL) {
                             echo "";
                            }
                            else{
                                if(!empty($trabajoA['cp_em'])){
                                    echo $trabajoA['cp_em'];
                                }
                            }?>
                          </p>
                            <br><br>

                          <h4>Ciudad:</h4>
                            <p><?php echo $trabajoA['ciudad_em'];?></p>
                            <br><br>

                          <h4>Municipio:</h4>
                            <p><?php echo $trabajoA['municipio_em'];?></p>
                            <br><br>

                          <h4>Estado:</h4>
                            <p><?php echo $trabajoA['estado_em'];?></p>
                            <br><br>

                    </div>

                  <div class="form-group">

                    

                        <h4>Teléfonos:</h4>
                          <p><?php echo $trabajoA['telefono_em'];?></p>
                          <br><br>
                        
                        <h4>Fax:</h4>  
                          <p><?php echo $trabajoA['fax'];?></p>
                          <br><br>

                        <h4>Em@il:</h4>  
                          <p><?php echo $trabajoA['email'];?></p>
                          <br><br>

                        <h4>Página web:</h4>  
                          <p><?php echo $trabajoA['pag_web'];?></p>
                          <br><br>
                        
                        <h4>Nombre y puesto del jefe inmediato:</h4> 
                          <p><?php echo $trabajoA['nombre_puesto'];?></p>
                          <br><br>
                         
                  </div>

                <div class="form-group">

                 

                      <h4>13.- Sector económico de la empresa u organización:</h4>
                        <br><br>
                      
                      <h4>SECTOR PRIMARIO:</h4>  
                        <p><?php echo $trabajoA['sector_economico'];?></p>
                        <br><br>

                      

                      <h4>SECTOR SECUNDARIO:</h4>  
                        <p><?php echo $trabajoA['otro_economico'];?></p>
                        <br><br>

                     
                      
                      <h4>TAMAÑO DE LA EMPRESA U ORGANIZACIÓN:</h4> 
                        <p><?php echo $trabajoA['tamanio_empresa'];?></p>
                        <br><br>
                        <br><br> 
                       
                </div>
                   
                <div class="form-group">
                  <h3 class="titulosC"> IV. DESEMPEÑO PROFECIONAL DE LOS EGRESADOS (COHERENCIA ENTRE FORMATOS Y EL TIPO DE EMPLEO)</h3>
                  <br>

                    <?php
                      $sql ="SELECT *FROM `desempenio_profesional` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>1.- Eficiencia para realizar las actividades laborales, en relación con su formación académica:</h4> 
                        <p><?php echo $trabajoA['eficiencia'];?></p>
                        <br><br>

                      <h4>2.- Cómo califica su formación académica con respecto a su desempeño laboral:</h4> 
                        <p><?php echo $trabajoA['califica'];?></p>
                        <br><br>

                      <h4>3.- Utilidad de las residencias profesionales o prácticas profesionales para su desarrollo laboral y profesional:</h4> 
                        <p><?php echo $trabajoA['utilidad'];?></p>
                        <br><br>

                      <h4>4.- Aspectos que valora la empresa u organismo para la contratación de egresados:</h4> 
                        <p><?php echo $trabajoA['aspectos'];?></p>
                        <br><br>
                </div>

                <div class="form-group">
                  <center> <h4>En las siguientes  preguntas de valoración utiliza la escala del 1 al 5 donde  1 es “Poco” y 5 es “Mucho”</h4>
                  <br></center>

                      <table align="center" wind="550" height="15%" bgcolor="#F3F3F1" bordercolor="black" border="1">

                          <tr>

                            <td id="b1"></td>

                            <td width="50px" id="b1"><center>Poco</center></td>

                            <td width="50px" id="b1"></td>

                            <td width="50px" id="b1"></td>

                            <td width="50px" id="b1"></td>

                            <td width="50px" id="b1"><center>Mucho</center></td>

                          </tr>

                          <tr>

                            <td id="b1"></td>

                            <td width="50px"><center>1</center></td>

                            <td width="50px"><center>2</center></td>

                            <td width="50px"><center>3</center></td>

                            <td width="50px"><center>4</center></td>

                            <td width="50px"><center>5</center></td>

                          </tr>

                          <tr>
                            <td colspan="6">&nbsp</td>
                          </tr>

                          <tr>

                            <td>1. Área O Campo De Estudio</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['area_estudio'];?></center></td>

                          </tr> 

                          <tr>

                            <td>2. Titulación</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['titulacion'];?></center></td>

                          </tr>

                          <tr>

                            <td>3. Experiencia Laboral/ Práctica (Antes De Egresar)</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['experiencia_laboral'];?></center></td>

                          </tr> 

                          <tr>

                            <td  width="750px">4. Competencia Laboral: Habilidad Para Resolver Problemas, Capacidad De Análisis, Habilidad Para El Aprendizaje, Creatividad, Administración Del Tiempo, Capacidad De Negociación, Habilidades Manuales, Trabajo En Equipo, Iniciativa, Honestidad, Persistencia, Etc.</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['competencia_laboral'];?></center></td>

                          </tr> 

                          <tr>

                            <td>5. Posicionamiento De La Institución De Egreso</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['posicionamiento_egreso'];?></center></td>

                          </tr> 

                          <tr>

                            <td>6. Conocimiento De Idiomas Extranjeros</td> 

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['conocimientos_idiomas'];?></center></td>

                          </tr> 

                          <tr>

                            <td>7. Recomendaciones/ Referencias</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['recomendaciones'];?></center></td>

                          </tr> 

                          <tr>

                            <td>8. Personalidad/ Actitudes</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['personalidad'];?></center></td>

                          </tr> 

                          <tr>

                            <td>9. Capacidad De Liderazgo</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['capacidad_liderazgo'];?></center></td>

                          </tr> 

                          <tr>

                            <td>10. Otros</td>

                            <td width="50px" colspan="5"><center><?php echo $trabajoA['otros'];?></center></td>

                          </tr> 
                      </table>

                      <br><br>
                      <br><br>

                </div>
                   
                <div class="form-group ">
                  <h3 class="titulosC">V. EXPECTATIVAS DE DESARROLLO Y SUPERACION PROFECIONAL Y DE ACTUALIZACIÓN </h3>
                  <br>

                    <?php
                      $sql ="SELECT *FROM `expectativas_desarrollo` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>1.- ACTUALIZACIÓN DE CONOCIMIENTOS</h4>
                      <br><br>

                      <h4>Le gustaría tomar cursos de actualización:</h4> 
                        <p><?php echo $trabajoA['cursos_actualizacion'];?></p>
                        <br><br>

                      <h4>¿Cuáles?:</h4> 
                        <p><?php echo $trabajoA['cuales_actualizacion'];?></p>
                        <br><br>

                      <h4>Le gustaría iniciar algún posgrado:</h4> 
                        <p><?php echo $trabajoA['iniciar_posgrado'];?></p>
                        <br><br>

                      <h4>¿Cuál?:</h4> 
                        <p><?php echo $trabajoA['cual_posgrado'];?></p>
                        <br><br>
                        <br><br>

                </div>

                <div class="form-group ">
                  <h3 class="titulosC">VI. PARTICIPACIÓN SOCIAL DE LOS EGRESADOS </h3>
                  <br>

                    <?php
                      $sql ="SELECT *FROM `participacion_social` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>1.- Pertenece a organizaciones sociales:</h4> 
                        <p><?php echo $trabajoA['sociales'];?></p>
                        <br><br>

                      <h4>¿Cuál?:</h4> 
                        <p><?php echo $trabajoA['cual_sociales'];?></p>
                        <br><br>

                      <h4>2.- Pertenece a organismos de profesionistas:</h4> 
                        <p><?php echo $trabajoA['profesionistas'];?></p>
                        <br><br>

                      <h4>¿Cuál?:</h4> 
                        <p><?php echo $trabajoA['cual_profesionistas'];?></p>
                        <br><br>

                      <h4>3.- Pertenece a la asociación de egresados:</h4> 
                        <p><?php echo $trabajoA['egresados'];?></p>
                        <br><br>

                      <h4>¿Cuál?:</h4> 
                        <p><?php echo $trabajoA['cual_egresados'];?></p>
                        <br><br>
                        <br><br>

                </div>

                <div class="form-group ">
                  <h3 class="titulosC"> VII. COMENTARIOS Y SUGERENCIAS</h3>
                  <br>
                    <?php
                      $sql ="SELECT *FROM `comentarios_sugerencias` WHERE usuario= $id";
                      $resultado = $con->query($sql);
                      $trabajoA = $resultado->fetch_assoc();
                    ?>

                      <h4>Opinión o recomendaciones para mejorar la formación profesional de un egresado de su carrera:</h4> 
                        <p><?php echo $trabajoA['opinion_recomendaciones'];?></p>
                        <br><br>
                        <br><br>

                </div>
             
            </form>
          </div>
        </div>
      </section> 
    </div>
  </div>
</div>
<?php
 include_once'templates/footer.php';
?>
