<?php
include("db.php");
class examen extends db_normal {

    private $privateProp;
    protected $rows = array();

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


    public function displayMethod($id)
    {
        $this->privateProp=$this->get($id);
        return $this->privateProp;
    }

}
$showtext = new examen();
?>
<h1>RESULTADO DE LA CONSULTA</H1>
<pre>
<?php var_dump($showtext->displayMethod(1));  ?>
</pre>
<h1>FUNCION FINAL</H1>
<pre>
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
<h1>QUERY PARA LA BASE DE DATOS</H1>
<pre>
--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `api_key` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `user`, `api_key`, `email`, `first_name`) VALUES
(1, 'JavierPro', '8nwe87fbw8e7ch8ew7xn8zjnz8hj8wd', 'soy@el.javier.pro', 'Javier');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
</pre>
