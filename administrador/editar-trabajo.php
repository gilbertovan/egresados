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
    <div class="col-md-10">
      <section class="content">
        <h1 class="titulosH">Editar vacante</h1>
        <div class="box">
          <div class="box-body">

            <?php  $sql ="SELECT * FROM `bolsa_trabajo` WHERE `id_trabajo` = $id";
            $resultado = $con->query($sql);
            $trabajo = $resultado->fetch_assoc();?>   

            <form role="form" name="guardar-regist" id="guardar-regist" method="post"  action="modelos-trabajo.php">
              <div class="box-body">
                 <div class="form-group">
                  <label for="empresa">NOMBRE DE LA EMPRESA:</label>
                  <input type="text" class="form-control resp" id="empresa" name="empresa"placeholder="Nombre de la empresa" value="<?php echo $trabajo['empresa'] ?>" maxlength="255">
                </div> 
                <div class="form-group">
                  <label for="vacante">VACANTE:</label>
                  <input type="text" class="form-control resp" id="vacante" name="vacante" placeholder="Nombre de gerente o director de la empresa " value="<?php echo $trabajo['vacante'] ?>" maxlength="255">
                </div>
                <div class="form-group">
                  <label for="area">ÁREA:</label>

                  <input type="text" class="form-control resp" id="area" name="area" placeholder="Nombre de gerente o director de la empresa " value="<?php echo $trabajo['area'] ?>" maxlength="255">
                </div>
                <div class="form-group">
                  <label for="des">DESCRIPCIÓN:</label>
                  <input type="text" class="form-control resp" id="des" name="des" placeholder="Descripcion " value="<?php echo $trabajo['des'] ?>" maxlength="255">
                </div>
                 <div class="form-group">
                  <label for="contacto">CONTACTO:</label>
                  <input type="text" class="form-control resp" id="contacto" name="contacto" placeholder="contacto de la empresa" value="<?php echo $trabajo['contacto'] ?>" maxlength="255">
                </div>
              
              </div>
              <div class="box-footer">
                <input type="hidden" name="registr" value="actualiza">
                <input type="hidden" name="id_trabajo" value="<?php echo $id; ?>"> 
                <button type="submit"  class="btn btn-primary" >Actualizar</button>
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
