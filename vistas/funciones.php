<?php
include_once("examen_3/postular.class.php");

$ubicacion = new postular();
function get_vista($ruta){
  $retorno = "";
  if(isset($_GET['ruta'])) {
    if ($_GET['ruta'] == "examen1") { include("examen_1/index.php"); }
    elseif ($_GET['ruta'] == "examen2") { include("examen_2/index.php"); }
    elseif ($_GET['ruta'] == "examen3") { include("examen_3/index.php"); }
    else { include("preguntas.php"); }
  }
  else {
    include("preguntas.php");
  }
}

function regiones($padre){
  $out = "";
  $ubicacion = new postular();

  if(empty($padre)) {
    $array = $ubicacion->obtener_ubicacion("regiones", "codigo", "");
    $codigo = "codigo";
  }
  else {
    $array = $ubicacion->obtener_ubicacion("comunas", "codigoInterno", $padre);
    $codigo = "codigoInterno";
  }

  foreach ($array as $region) {
    $out .= '<option value="'.$region[$codigo].'">'.$region['nombre'].'</option>';
  }
  return $out;
}

function enviar_postulacion($nombre, $mail, $mensaje) {
  $out = "";
  $formulario = new postular();
  return $formulario->nueva_postulacion($nombre, $mail, $mensaje);
}

function get_postulaciones() {
  $out = "";
  $postulacion = new postular();
  foreach ($postulacion->obtener_postulaciones() as $postulante) {
    $out .= '
    <tr>
      <th scope="row">'.$postulante['id'].'</th>
      <td>'.$postulante['nombre'].'</td>
      <td>'.$postulante['email'].'</td>
      <td>'.$postulante['fecha_postulacion'].'</td>
      <td width="300" class="descripcion">'.$postulante['descripcion'].'</td>
    </tr>';
  }
  return $out;
}
?>
