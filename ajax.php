<?php
include("vistas/funciones.php");
if(isset($_POST['accion']) && $_POST['accion'] == "obtener_comunas") {
  echo regiones($_POST['padre']);
}
elseif (isset($_POST['accion']) && $_POST['accion'] == "enviar_postulacion") {
  $resultado = enviar_postulacion($_POST['nombre'], $_POST['email'], $_POST['mensaje']);
  echo "<strong>".$resultado[0]."</strong>: "."$resultado[1].";
  if($resultado[0] == "Exito") { ?>
    <script>jQuery('#enviar_postulacion').hide();</script>
    <script>jQuery('table.table tbody').load("ajax.php?accion=obtener_postulaciones");</script>
    <?php
  }
}
elseif (isset($_GET['accion']) && $_GET['accion'] == "obtener_postulaciones"){
  echo get_postulaciones();
}
?>
