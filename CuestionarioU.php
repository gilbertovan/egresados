<?php
    require_once('funciones/sesionesE.php');
    require_once('recursos/conexion.php');
    $titulo = 'Plataforma de Egresados | Cuestionario de Seguimiento de Egresados';
    require_once('parciales/arriba.php');
    require_once('parciales/nav.php');
    
    require_once('parciales/logo.php');
?>
<div class="barraN">
  <div class="contenedor">
    
  </div> 
</div><!-- fin de la barra-->

<div class="barra">
  <div class="contenedor">
    
  </div>
  <p class="contSe"/> Cuestionario de Seguimiento de Egresados/3
  <br>Departamento de Gestión Tecnológica Y Vinculación/IT del Istmo</p>
</div><!-- fin de la barra-->

<div class="barraN">
  <div class="contenedor">
    
  </div>
</div><!-- fin de la barra-->

<form autocomplete="off" role="form" name="agregar_ul" id="agregar_ul" method="POST"  action="tablascuest/ubicacion_laboral.php">

    <div class="caja colorcues">

        <?php $id_user =$_SESSION['usuario']['Id']; ?>

        <input type="hidden" name="usuario" value="<?php echo $id_user; ?>">

        <h2 class="titulosH">III. Ubicación Laboral De Los Egresados</h2>
        <hr>
        <br>
        <p>Campos requeridos: <span style="color: #cd6701;">*</span></p>
        <br>

        <?php require_once('funciones/scrip.php'); ?>

        <?php
            $sql ="SELECT * FROM `ubicacion_laboral` WHERE `usuario` = $id_user";
                $resultado = $con->query($sql);
                $user = $resultado->fetch_assoc();
        ?>

        <input type="hidden" name="editado" value="2019-05-08 13:36:37">
        
        <p>1.- Actividad a la que se dedica actualmente:<span style="color: #cd6701;">*</span></p> </p>
            <select class="resp3" name="actividad" tabindex="1" required>
                <option selected>
                    <?php
                        if (empty($user['actividad'])) {
                            echo "";
                        }
                        else{
                            if (!empty($user['actividad'])) {
                                echo $user['actividad'];
                            }
                        }
                    ?>
                </option> <option value="Trabaja">Trabaja</option> <option value="Estudia">Estudia</option> <option value="Estudia y trabaja">Estudia y trabaja</option> <option value="No estudia ni trabaja">No estudia ni trabaja</option>
            </select>

        <br>
        <br>
        <br>

        <p>Si Estudia, indicar si es:</p>
            <select class="resp3" name="estudia" tabindex="2">
                <option selected><?php echo $user['estudio'];?></option> <option value="( )">( )</option> <option value="Especialidad">Especialidad</option> <option value="Maestría">Maestría</option> <option value="Doctorado">Doctorado</option> <option value="Idiomas">Idiomas</option> <option value="Otra">Otra</option>
            </select>

        <br>

           <input class="resp" type="text" onkeypress="return soloLetras(event)" name="otro_est" maxlength="30" value="<?php echo $user['otro_estudio']; ?>" tabindex="3" placeholder="Si es otro especifique">

        <br>
        <br>
        <br>

        <p>Especialidad e institución:</p>
            <input class="resp" type="text" name="espe_inst" maxlength="150" value="<?php echo $user['especialidad_institucion']; ?>" tabindex="4" placeholder="Especifique">

        <br>
        <br>
        <br>

        <p>2.- En caso de trabajar: tiempo transcurrido para obtener el empleo:</p>
            <select class="resp2" name="tiempo" tabindex="5">
                <option selected><?php echo $user['tiempo_empleo'];?></option> <option value="( )">( )</option> <option value="Antes de egresar">Antes de egresar</option> <option value="Menos de seis meses después de egresar">Menos de seis meses después de egresar</option> <option value="Entre seis meses y un año después de egresar">Entre seis meses y un año después de egresar</option> <option value="Más de un año después de egresar">Más de un año después de egresar</option>
            </select>

        <br>
        <br>
        <br>

        <p>3.- Medio para obtener empleo:</p>
            <select class="resp2" name="medio" tabindex="6">
                <option selected><?php echo $user['medio_empleo'];?></option> <option value="( )">( )</option> <option value="Bolsa de trabajo del plantel">Bolsa de trabajo del plantel</option> <option value="Contactos personales">Contactos personales</option> <option value="Residencia profesional">Residencia profesional</option> <option value="Medios masivos de comunicación">Medios masivos de comunicación</option> <option value="Otros">Otros</option>
            </select>

        <br>

            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="otromedio" value="<?php echo $user['otro_empleo'];?>" tabindex="7" placeholder="Si obtuvo el empleo por otro medio especifique" maxlength="50">

        <br>
        <br>
        <br>

        <p>4.- Requisitos de contratación:</p>
            <select class="resp2" name="requisitos" tabindex="8">
                <option selected><?php echo $user['requisitos'];?></option> <option value="( )">( )</option> <option value="Competencias laborales">Competencias laborales</option> <option value="Título profecional">Título profecional</option> <option value="Examen de selección">Examen de selección</option> <option value="Idioma extrangero">Idioma extrangero</option> <option value="Actitudes y habilidades (principios y valores)">Actitudes y habilidades (principios y valores)</option> <option value="Ninguno">Ninguno</option>
            </select>

        <br>

            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="otrosrequi" value="<?php echo $user['otro_requisitos'];?>" tabindex="9" placeholder="Si le pidieron otros requisitos especifique" maxlength="40">

        <br>
        <br>

        <p>5.- Idioma que utiliza en su trabajo:</p>
            <select class="resp3" type="text" name="idioma1" tabindex="10">
                <option selected><?php echo $user['idioma_trabajo'];?></option> <option value="( )">( )</option> <option value="Inglés">Inglés</option> <option value="Francés">Francés</option> <option value="Alemán">Alemán</option> <option value="Otro">Otro</option>
            </select>

        <br>

            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="otroidioma1" value="<?php echo $user['otro_idioma'];?>" tabindex="11" placeholder="Si utiliza otro idioma en su trabajo especifique" maxlength="25">

        <br>
        <br>

        <p>6.- En qué proporción utiliza en el desempeño de sus actividades laborales cada una de las habilidades del idioma extranjero:</p>

        <p>Hablar: &nbsp &nbsp &nbsp
            <input class="resp3" type="number" min="0" max="100" name="hablar" tabindex="12" placeholder="(0% - 100%)" value="<?php
                if (empty($user['hablar']) && $user['hablar'] == 0 OR $user['hablar'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['hablar'])){
                        echo $user['hablar'];
                    }
                }
            ?>"></p>

        <br>

        <p>Escribir: &nbsp &nbsp
            <input class="resp3"  type="number" min="0" max="100" name="escribir" tabindex="13" placeholder="(0% - 100%)" value="<?php
                if (empty($user['escribir']) && $user['escribir'] == 0 OR $user['escribir'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['escribir'])){
                        echo $user['escribir'];
                    }
                }
            ?>"></p>

        <br>

        <p>Leer: &nbsp &nbsp &nbsp &nbsp &nbsp
            <input class="resp3"  type="number" min="0" max="100" name="leer" tabindex="14" placeholder="(0% - 100%)" value="<?php
                if (empty($user['leer']) && $user['leer'] == 0 OR $user['leer'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['leer'])){
                        echo $user['leer'];
                    }
                }
            ?>"></p>

        <br>

        <p>Escuchar: &nbsp
            <input class="resp3" type="number" min="0" max="100" name="escuchar" tabindex="15" placeholder="(0% - 100%)" value="<?php
                if (empty($user['escuchar']) && $user['escuchar'] == 0 OR $user['escuchar'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['escuchar'])){
                        echo $user['escuchar'];
                    }
                }
            ?>"></p>

        <br>
        <br>

        <p> 7.- Antigüedad en el empleo:</p>
            <select class="resp3" name="antiguedad" tabindex="16">
                <option selected><?php echo $user['antiguedad'];?></option> <option value="( )">( )</option> <option value="Menos de un año">Menos de un año</option> <option value="Un año">Un año</option> <option value="Dos años">Dos años</option> <option value="Tres años">Tres años</option> <option value="Más de tres años">Más de tres años</option>
            </select>

        <br>
        <br>

        <p>Año de ingreso a la empresa:</p>
            <input class="resp2" type="number" maxlength="4" name="ingresoem" min="0" tabindex="17" placeholder="Especifique el año de ingreso a la empresa" value="<?php
                if (empty($user['anio_ingreso']) && $user['anio_ingreso'] == 0 OR $user['anio_ingreso'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['anio_ingreso'])){
                        echo $user['anio_ingreso'];
                    }
                }
            ?>">

        <br>
        <br>

        <p>8.- Ingreso (salario mínimo diario):</p>
            <select class="resp3" name="salario" tabindex="18">
                <option selected><?php echo $user['salario'];?></option> <option value="( )">( )</option> <option value="Menos de cinco">Menos de cinco</option> <option value="Entre cinco y siete">Entre cinco y siete</option> <option value="Entre 8 y 10">Entre 8 y 10</option> <option value="Más de 10">Más de 10</option>
            </select>

        <br>
        <br>

        <p>9.- Cargo:</p>
            <input class="resp" type="text" name="cargo" value="<?php echo $user['cargo'];?>" tabindex="19" placeholder="Especifique el cargo que ocupa" maxlength="70">

        <br>
        <br>

        <p>A su perfil de estudio:</p>
            <select class="resp3" name="perfil" tabindex="20">
                <option selected><?php echo $user['perfil'];?></option> <option value="( )">( )</option> <option value="Si">Si</option> <option value="No">No</option> <option value="Parcial">Parcial</option>
            </select>

        <br>
        <br>
        <br>

        <p>10.- Condición De Trabajo:</p>
            <select class="resp3" name="condicion" tabindex="21">
                <option selected><?php echo $user['condicion'];?></option> <option value="( )">( )</option> <option value="Base">Base</option> <option value="Eventual">Eventual</option> <option value="Contrato">Contrato</option>
            </select>

        <br>

            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="otroscondi" value="<?php echo $user['otro_condicion'];?>" tabindex="22" placeholder="En caso que tenga otra condición de trabajo especifique" maxlength="20">

        <br>
        <br>
        <br>
 
        <p>11.- Relación del trabajo con su área de formación:</p>
            <select class="resp3" name="relacion" tabindex="23">
                <option selected><?php echo $user['relacion'];?></option> <option value="( )">( )</option> <option value="0%">0%</option> <option value="20%">20%</option> <option value="40%">40%</option> <option value="60%">60%</option> <option value="80%">80%</option> <option value="100%">100%</option> 
            </select>

        <br>
        <br>
        <br>

        <p>12.- Datos de la empresa u otro:</p>

        <br>

        <p>ORGANISMO:</p>
            <select class="resp3" name="organismo" tabindex="24">
                <option selected><?php echo $user['organismo'];?></option> <option value="( )">( )</option> <option value="Público">Público</option> <option value="Privado">Privado</option>
            </select>

        <br>
        <br>

        <p>Giro o actividad principal de la empresa u organismo:</p>
         
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="giro" value="<?php echo $user['giro_empresa'];?>" tabindex="25" placeholder="Giro o actividad principal" maxlength="100">

        <br>
        <br>

        <p>Razón social:</p>
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="razon" value="<?php echo $user['razon'];?>" tabindex="26" placeholder="Razón social" maxlength="80">

        <br>
        <br>

        <p>Domicilio:</p>
            <input class="resp2" type="text" name="calleemp" value="<?php echo $user['calle_em'];?>" tabindex="27" placeholder="Calle" maxlength="80">

            <input class="resp3" type="text" name="numemp" value="<?php echo $user['no_em'];?>" tabindex="28" placeholder="No. (s/n)" maxlength="10">

            <input class="resp2" type="text" name="coloniaemp" value="<?php echo $user['colonia_em'];?>" tabindex="29" placeholder="Colonia" maxlength="80">

            <input class="resp3" type="text" name="cpemp"  tabindex="30" placeholder="C.P." maxlength="12"value="<?php
                if (empty($user['cp_em']) && $user['cp_em'] == 0 OR $user['cp_em'] == NULL) {
                    echo "";
                }
                else{
                    if(!empty($user['cp_em'])){
                        echo $user['cp_em'];
                    }
                }
            ?>">

        <br>
        <br>

        <p>Ciudad:</p>
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="ciudad" value="<?php echo $user['ciudad_em'];?>" tabindex="31" placeholder="Ciudad" maxlength="60">

        <br>
        <br>

        <p>Municipio:</p>
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="municipio" value="<?php echo $user['municipio_em'];?>" tabindex="32" placeholder="Municipio" maxlength="60">

        <br>
        <br>

        <p>Estado:</p>
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="estado" value="<?php echo $user['estado_em'];?>" tabindex="33" placeholder="Estado" maxlength="60">

        <br>
        <br>

        <p>Teléfonos:</p>

            <input class="resp2" type="text" name="telext" value="<?php echo $user['telefono_em'];?>" tabindex="34" placeholder="(01- Lada) Tel. y ext." maxlength="40">
            <input class="resp3" type="text" name="Fax" value="<?php echo $user['fax'];?>" tabindex="35" placeholder="Fax" maxlength="30">
            <input class="resp" type="email" name="Email" value="<?php echo $user['email'];?>" tabindex="36" placeholder="Em@il" maxlength="50">

        <br>
        <br>

        <p>Página web:</p> 
            <input class="resp" type="text" name="pagweb" value="<?php echo $user['pag_web'];?>" tabindex="37" placeholder="Pág. web de la empresa" maxlength="150">

        <br>
        <br>

        <p>Nombre y puesto del jefe inmediato:</p>
            <input class="resp" type="text" onkeypress="return soloLetras(event)" name="nomtpuest" value="<?php echo $user['nombre_puesto'];?>" tabindex="38" placeholder="Nombre y puesto" maxlength="100">

        <br>
        <br>
        <br>

        <p>13.- Sector económico de la empresa u organización:</p>
            <select class="resp2" name="sector" tabindex="39">
                <option selected><?php echo $user['sector_economico'];?></option>
                <option value="( )">( )</option>
                    <optgroup label="Sector primario">
                        <option value="Sector primario - Agroindustria">Sector primario - Agroindustria</option> <option  value="Sector primario - Pesquero">Sector primario - Pesquero</option> <option value="Sector primario - Minero">Sector primario - Minero</option> <option value="Sector primario - Otros">Sector primario - Otros</option>
                    </optgroup>

                    <optgroup label="Sector secundario">
                        <option value="Sector secundario - Industria">Sector secundario - Industria</option> <option value="Sector secundario - Construcción">Sector secundario - Construcción</option> <option value="Sector secundario - Petrolero">Sector secundario - Petrolero</option> <option value="Sector secundario - Otros">Sector secundario - Otros</option>
                    </optgroup>

                    <optgroup label="Sector terciario">
                        <option value="Sector terciario- Educativo">Sector terciario- Educativo</option> <option value="Sector terciario- Turismo">Sector terciario- Turismo</option> <option value="Sector terciario- Comercio">Sector terciario- Comercio</option> <option value="Sector terciario- Servicios Financieros">Sector terciario- Servicios Financieros</option>
                    </optgroup>
            </select>

        <br>
        <br>

            <input class="resp" type="text" onkeypress="return soloLetras(event)" tabindex="40" name="otrosector" value="<?php echo $user['otro_economico'];?>" placeholder="En caso de ser otro sector especifique: Tipo de sector/ giro" maxlength="40">

        <br>
        <br>

        <p>14.- Tamaño de la empresa u organización (Número de empleados):</p>
            <select class="resp3" name="tamanioemp" tabindex="41">
                <option selected><?php echo $user['tamanio_empresa'];?></option> <option value="( )">( )</option> <option value="Microempresa (1 - 30)">Microempresa (1 - 30)</option> <option value="Pequeña (31 - 100)">Pequeña (31 - 100)</option> <option value="Mediana (101 - 500)">Mediana (101 - 500)</option> <option value="Grande (Más De 500)">Grande (Más De 500)</option>
            </select>

        <br>
        <br>

        <?php
            require_once('recursos/conexion.php');

            $id_user=$_SESSION['usuario']['Id'];

            $sql ="SELECT * FROM `ubicacion_laboral` WHERE `usuario`= $id_user";
                $resultado = $con->query($sql);
                $user = $resultado->fetch_assoc();

            if (empty($user)) {

                echo "
                    <div>
                    <br>
                    <br>
                        <a href='CuestionarioB.php' class='btn btn-primary float-left' tabindex='43'>Atrás</a>

                        <input type='hidden' name='agregar_ul' value='1'>
                        <input type='hidden'  name='usuario'  value='$id_user'> 
                        <button type='submit' class='btn btn-primary float-right' tabindex='42'>Guardar y continuar</button>
                    </div>
                ";
          }else{

            $sql ="SELECT ubicacion_laboral.id, ubicacion_laboral.usuario, perfiles.Id FROM `ubicacion_laboral`  INNER JOIN perfiles  ON ubicacion_laboral.usuario= $id_user";
                $resultado = $con->query($sql);
                $a = $resultado->fetch_assoc(); 
                $ids=$a['id'];

            if (!empty($user)) {
                echo "
                    <div>
                    <br>
                    <br>
                        <a href='CuestionarioB.php' class='btn btn-primary float-left' tabindex='43'>Atrás</a>

                        <input type='hidden' name='agregar_up' value='1'>
                        <input type='hidden' name='id_com' value='$ids'>
                        <button type='submit' class='btn btn-primary float-right' tabindex='42'>Actualizar y continuar</button>
                    </div>
                ";
            }

          }
        ?>
        <br>
        <br>        
    </div>
</form>
<?php
    require_once('parciales/abajo.php');
?>