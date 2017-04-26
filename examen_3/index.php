<?php
  include_once("postular.class.php");
?>
<div class="jumbotron">
  <h2>Postula a una práctica bakan</h2>
  <hr>
  <form method="post" id="enviar_postulacion">
  <div class="row">
    <div class="col-xs-6">
      <label for="regiones">Regiones</label>
      <select id="regiones" class="form-control">
        <option value="">Seleccione una región</option>
        <?php echo regiones(""); ?>
      </select>
    </div>
    <div class="col-xs-6 ocultar comunas">
      <label for="comunas">Comunas</label>
      <select id="comunas" class="form-control"></select>
    </div>
  </div>
  <div class="row formulario ocultar">
    <div class="col-xs-12">
      <div class="spacer-10"></div>

        <div class="form-group  has-feedback nombre-text">
          <label class="control-label"  for="inputSuccess2">Ingrese su nombre:</label>
          <input type="text" class="form-control status" id="nombre" aria-describedby="inputSuccess2Status" placeholder="Ingrese nombre" minlength="5" required/>
          <span class="glyphicon glyphicon-ok form-control-feedback ocultar" aria-hidden="true"></span>
          <span id="inputSuccess2Status" class="sr-only">(success)</span>
        </div>

        <div class="form-group s has-feedback">
          <label class="control-label" for="inputGroupSuccess1">Ingrese su email:</label>
          <div class="input-group">
          <span class="input-group-addon">@</span>
          <input type="email" class="form-control status" id="email" aria-describedby="inputGroupSuccess1Status" placeholder="alguien@dominio.com" minlength="5" required/>
          </div>
        </div>

        <div class="form-group  has-feedback">
          <label class="control-label" for="inputGroupSuccess1">¿Por qué debo elegirte?</label>
          <textarea class="form-control status" rows="3" id="mensaje" placeholder="Escriba un texto de porque debemos escogerlo" minlength="5" required></textarea>
        </div>

        <div class="text-right">
          <input type="submit" class="btn btn-primary btn-lg posutlar" value="Enviar Postulación">
        </div>

    </div>
  </div>
  <div class="spacer-10"></div>
  </form>
  <div id="response" class="alert bg-primary ocultar">
     <strong>Ups...</strong> no hay nada.</div>
  </div>
</div>
<div class="jumbotron">
  <h2>Postulaciones</h2>
  <table class="table table-condensed table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Fecha</th>
      <th>Mensaje</th>
    </tr>
  </thead>
  <tbody>
    <?php echo get_postulaciones(); ?>
  </tbody>
</table>
</div>
