<?php
abstract class db {
	private $conexion;
	protected $query;
	public $result;
	public $error;
	public $mensaje;
	protected $rows = array();
	/**
	 * Abre la conexion a la base de datos
	 * @return Object
	 */
	private function abrir_conexion() {
		$this->conexion = mysqli_connect("77.104.138.226", "gunaclou_d3s4f10", "Q+p+l,n+7k5f", "gunaclou_d3s4f10");
	}
	/**
	 * Abre la conexion a la base de datos
	 * @return Bolean
	 */
		private function cerrar_conexion() {
			$this->conexion->close();
		}

  	/**
	 * Devuelve los resultados de una consulta (SELECT)
	 * @return Array
	 */
    protected function select() {
        $this->abrir_conexion();
        $result = $this->conexion->query($this->query);
          while ($this->rows[] = $result->fetch_assoc());
        $result->free();
				//array_pop($this->rows);
        $this->cerrar_conexion();
        return $this->rows;
    }


			/**
		 * Ejecuta una consulta unica (UDPDATE, INSERT)
		 * @return Object
		 */
		  protected function ejecutar_consulta() {
				if($_POST) {
					$this->abrir_conexion();
					$this->result = $this->conexion->query($this->query);
					if($this->result == false) {
		        $this->error = "Error";
		        $this->mensaje = 'Ha fallado la consulta';
					}
					else {
						$this->error = "Exito";
						$this->mensaje = 'Se ha enviado la postulación';
					}
					$this->cerrar_conexion();
				} else {
					$this->error = "Error";
					$this->mensaje = 'Metodo no permitido';
				}
			}

		/**
		 * Devuelve los resultados de una consulta (SELECT)
		 * @return Array
		 */
		  protected function sanitizar($input){
		  	$input = trim($input);
		      if (is_array($input)){
		          foreach($input as $var=>$val) {
		              $output[$var] = sanitize($val);
		          }
		      }
		      else {
		          if (get_magic_quotes_gpc()) {
		              $input = stripslashes($input);
		          }
		          //$input = cleanString($input);
		          $this->abrir_conexion();
		          $output = mysql_real_escape_string($input);
		          $this->cerrar_conexion();
		      }
		    $output = utf8_decode($output);
		    return $output;
		  }


}
?>
