<?php
include_once'../funciones/sesiones.php';
include_once'../recursos/conexion.php';
include_once'templates/header.php';
include_once'templates/barra.php';
include_once'templates/navegacion.php';

?>
<div class="content-wrapper"> 
  <div class="row">
    <div class="col-md-10">
      <section class="content">
        <h1 class="titulosH">Registro de vacantes</h1>
        <div class="box">
          <div class="box-body">  
            <form role="form" name="agregar-trabajo" id="agregar-trabajo" method="post"  action="insertar-trabajo.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="empresa">NOMBRE DE LA EMPRESA:</label>
                  <input type="text" class="form-control resp" id="empresa" name="empresa"placeholder="Nombre de la empresa"  maxlength="255" required>
                </div>
                <div class="form-group">
                  <label for="vacante">VACANTE:</label>
                  <input type="text" class="form-control resp" id="vacante" name="vacante" placeholder="Nombre de gerente o director de la empresa " maxlength="255" required>
                </div>
                <div class="form-group">
                  <label for="area">ÁREA:</label>
                  <input type="text" class="form-control resp" id="area" name="area" placeholder="Nombre de gerente o director de la empresa " maxlength="255" required>
                </div>
                <div class="form-group">
                  <label for="des">DESCRIPCIÓN:</label>
                  <input type="text" class="form-control resp" id="des" name="des" placeholder="Descripcion " maxlength="255">
                </div>
                 <div class="form-group">
                  <label for="contacto">CONTACTO:</label>
                  <textarea type="text" class="form-control resp" id="contacto" name="contacto" placeholder="contacto de la empresa" maxlength="255"> </textarea>                
                </div>
                <input type="hidden" name="editado" value="2019-05-08 13:36:37">
                                                  
              </div>
              <div class="box-footer">
                <input type="hidden"name="agregar-trabajo" value="1">
                <button type="submit" class="btn btn-primary" >Agregar</button>
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
