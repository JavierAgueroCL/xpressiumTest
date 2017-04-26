<section  data-step="1" data-intro="Puede ver las respuesta a las preguntas dentro de cada desafio">
  <h3>Desafío 1</h3>
  <p>
    Escribe el código necesario en jQuery para que el formulario envié la información al servicio web, analice la respuesta y le muestre un mensaje al usuario según el resultado. <br />
    <em><strong>R:</strong> El código de este archio puede ser visto en /assets/js/main.js</em>
  </p>
  <pre class="limitar-altura">
  $('#login').on('submit', function(e) {
      e.preventDefault();
      var url_rest = $(".resurl").val();
      if(url_rest == "") {
        $('#respuesta').addClass('alert-danger');
        $('#respuesta').html('Ingrese la URL de la API REST');
      }
      else {
        $.ajax({
            url: url_rest // URL A MODIFICAR (json)
        }).then(function(data) {
            $('#respuesta').removeClass('alert-success');
            $('#respuesta').removeClass('alert-danger');
            var response = data;
            if(response == true){
              $('#respuesta').addClass('alert-success');
              $('#respuesta').html('Ha ingresado correctamente: ' + response);
            }
            else {
              $('#respuesta').addClass('alert-danger');
              $('#respuesta').html('Los datos son incorrectos: ' + response);
            }
        });
      }
      return false;
  });
  </pre>
  <div class="text-right">
    <a href="/?ruta=examen1" type="button" class="btn btn-primary text-right"  data-step="1" data-intro="Ademas puede ver el codigo en funcionamiento">VER EL CODIGO FUNCIONANDO</a>
  </div>
</section>
<hr>
<section>
<h3>Desafío 2</h3>
<ol>
  <li>¿Para que se utiliza === en PHP?
    <ul>
      <li><em>Comprueba que los valores, además de ser el mismo valor, sean del mismo tipo (int, str, bol, etc)</em></li>
    </ul>
  </li>
  <li>¿Cuál es la diferencia entre include & include_once?
    <ul>
      <li><em>Tal como su nombre lo dice, "once" comprueba si el archivo a incluir ya ha sido incluido con anterioridad, de ser asi el archivo no es incluido. De otra manera, si el archivo no ha sido incluido, funciona como un "include" normal.</em></li>
    </ul>
  </li>
  <li>¿Qué imprimirá el siguiente código en la pantalla?
    <ul>
      <li>
<pre class="limitar-altura">
  $num = 10;
  function multiply(){
    $num = $num * 10;
  }
  multiply();
  echo $num;
</pre>
        <h5><em>Imprime:</em></h5>
<pre class="limitar-altura">
Notice: Undefined variable: num in /var/www/examen/index.php on line 4
10
</pre>
      </li>
    </ul>
  </li>
</ol>
</section>
<hr>
<section>
<h3>Desafío 3</h3>
<p>
  Encuentra y resuelve los problemas del siguiente código:<br />
  <em><strong>R:</strong> El código de este archio puede ser visto en /examen_2/index.php</em>
  <pre class="limitar-altura">
  private function get($id) {
  	$response = array();

  	if($s_user = $this->db->select('SELECT `user`, `api_key`, `email`, `first_name` `user` WHERE `id` = :id', array(':id' => $id))) {
  		$response['token'] = $s_user['api_key'];
  		$response['username'] = $s_user['user'];
  		$response['email'] = $s_user['email'];
  		$response = $s_user['first_name'];
  	}

  	echo $response;
  }
  </pre>
  <h5><em>Funcion reparada:</em></h5>
<pre class="limitar-altura">
private function get($id) {
    $response = array();

    if($s_user = $this->select('SELECT `user`, `api_key`, `email`, `first_name` FROM users WHERE `id` = '.$id.' LIMIT 0,1')) {
        $response['token'] = $s_user[0]['api_key'];
        $response['username'] = $s_user[0]['user'];
        $response['email'] = $s_user[0]['email'];
        $response['first_name'] = $s_user[0]['first_name'];
    }
    return $response;
}
</pre>
  <div class="text-right">
    <a href="/?ruta=examen2" type="button" class="btn btn-primary text-right">VER EL CODIGO FUNCIONANDO</a>
  </div>
</section>
  <hr>
  <section>
  <h3>Desafío 4</h3>
  <p>Tienes las siguientes tablas de una <strong>base de datos MySQL</strong>, que está ubicada en (la base de datos existe realmente):</p>
<ul>
<li>Servidor: xxx.xxx.xxx.xxx</li>
<li>Usuario: ************</li>
<li>Contraseña: ************</li>
<li>Base de datos: ********</li>
</ul>

<strong>Tablas de la Base de Datos:</strong>
<ul>
<li>Regiones
  <ul>
    <li>Id</li>
    <li>Nombre</li>
  </ul>
</li>
<li>Comunas
  <ul>
    <li>Id</li>
    <li>Nombre</li>
    <li>Region_Id</li>
  </ul>
</li>
<li>Postulaciones
  <ul>
    <li>Id
      <li>Email</li>
      <li>Nombre</li>
      <li>Descripcion</li>
      <li>Fecha_Postulacion</li>
    </ul>
  </li>
</ul>
<p>Las tablas Regiones y Comunas ya están llenas con datos reales. <br />
Sólo la tabla Postulaciones esta limpia.</p>

<strong>La petición es:</strong>

<ol>
  <li>Realiza un formulario cool, usando bootstrap, php y jQuery</li>
  <li>El formulario se llama  "Postula a una práctica bakan"</li>
  <li>Al entrar deben haber dos listas: Regiones y Comunas</li>
  <li>La lista Regiones mostrará todas las regiones de la tabla Regiones</li>
  <li>La lista Comunas debe mostrar todas las comunas de la región previamente seleccionada</li>
  <li>Sólo cuando seleccione Región: Región de Valparaiso y  Comuna "Viña del Mar", debe aparecer una etiqueta que diga "Bakan" hay práctica disponible, ingresa tus datos y postula: Nombre, Email, Por qué debo elegirte</li>
  <li>Si marcas otra región y otra comuna (obviamente) debe aparecer un mensaje grande "ups...no hay nada"</li>
</ol>
<div class="text-right">
  <a href="/?ruta=examen3" type="button" class="btn btn-primary text-right">VER EL CODIGO FUNCIONANDO</a>
</div>
</section>
<hr>
<div class="spacer-10"></div>
<div class="well text-center">Gracias por la oportunidad, espero ser aceptado. \(◕ ◡ ◕\)</div>
  <div class="text-center">
    <button type="button" class="btn btn-success btn-lg descargar-github"><img src="assets/images/github.png" width="32"> Descargar desde GitHub</button>
  </div>
<hr>
<div class="spacer-10"></div>
