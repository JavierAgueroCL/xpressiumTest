<?php
abstract class db_normal {
	private $conexion;
	protected $query;
	public $result;
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
    protected function select($consulta) {
        $this->abrir_conexion();
        $result = $this->conexion->query($consulta);
          while ($this->rows[] = $result->fetch_assoc());
        $result->free();
				//array_pop($this->rows);
        $this->cerrar_conexion();
        return $this->rows;
    }

}
?>
