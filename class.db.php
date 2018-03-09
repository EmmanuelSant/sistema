<?php
/*
* Filename    : class.php
* Description : Clase de PHP para manejar las conexiones a MySQL con PDO
*/

class conexion {
	
	//Definir las variables privadas en la clase
	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $dbh;
    private $error;
	private $stmt;

	/**
	 * [__construct Definir el Constructor de la Clase]
	 * @param [type] $hostc   [host]
	 * @param [type] $userc   [usuariobd]
	 * @param [type] $passc   [passwordbd]
	 * @param [type] $dbnamec [nombrebd]
	 */
	public function __construct($hostc=__HOSTDB__,$userc=__USERDB__,$passc=__PASSDB__,$dbnamec=__DBNAME__) {

		$this->host = $hostc;
		$this->user = $userc;		
		$this->pass = $passc;
		$this->dbname = $dbnamec;	

		// Setear el DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Setear opciones de PDO, conexion persistente
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        // Crear nueva instancia de PDO usando try
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Realizar Catch en caso de Error
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

	/**
	 * [__destruct Destructor de la Clase terminar con la conexion PDO]
	 */
    public function __destruct() {
        $this->dbh = null;
    }

    /**
     * [sql Funcion para Realizar Query]
     * @param  [type] $query [Consulta a ejecutar]
     * @return [type]        [Consulta obtenida]
     */
    public function sql($query){
    	$this->stmt = $this->dbh->prepare($query);
    }

    /**
     * [bind funcion bind]
     * @param  [type] $param [Parametro a reemplazar]
     * @param  [type] $value [Valor principal]
     * @param  [type] $type  [Tipo de variable]
     * @return [type]        [Sentencia bind]
     */
    public function bind($param, $value, $type = null) {
	    if (is_null($type)) {
	    	
	        switch (true) {
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }
    	$this->stmt->bindValue($param, $value, $type);
	}

	/**
	 * [execute Funcion Ejecutar]
	 * @return [type] [Consulta]
	 */
	public function execute() {
		return $this->stmt->execute();
	}
	
	/**
	 * [query2array Funcion para obtener varios registros]
	 * @return [type] [Datos]
	 */
	public function query2array() {
   		$this->execute();
    	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * [query2vars Funcion para obtener un registro]
	 * @return [type] [Datos]
	 */
	public function query2vars() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * [rscount Funcion para obtener el total de retistros]
	 * @return [type] [Total de registros]
	 */
	public function rscount() {
    	return $this->stmt->rowCount();
	}

	/**
	 * [lastInsertId Funcion para obtener el ultimo id insertado]
	 * @return [type] [id]
	 */
	public function lastInsertId() {
    	return $this->dbh->lastInsertId();
	}

	/**
	 * [beginTransaction Funcion para Transacciones]
	 * @return [type] [Inicia transaccion]
	 */
	public function beginTransaction() {
    	return $this->dbh->beginTransaction();
	}

	/**
	 * [endTransaction Funcion para Transacciones]
	 * @return [type] [Ejecuta la transaccion]
	 */
	public function endTransaction() {
    	return $this->dbh->commit();
	}

	/**
	 * [cancelTransaction Fucion para Transacciones]
	 * @return [type] [Cancela la transaccion]
	 */
	public function cancelTransaction() {
    	return $this->dbh->rollBack();
	}

	/**
	 * [debugDumpParams Funcion Debug]
	 * @return [type] [debug]
	 */
	public function debugDumpParams() {
    	return $this->stmt->debugDumpParams();
	}

	/**
	 * [date2mysql Funcion Fechas Mysql]
	 * @param  [type] $fecha [Fecha]
	 * @return [type]        [Fecha '000-00-00']
	 */
	static function date2mysql($fecha) {
		$fecha_return='0000-00-00';
		$fecha=str_replace("/","-",$fecha);
		$fecha=explode("-",$fecha);
		if(sizeof($fecha)==3) {
		    list($dia,$mes,$anio)=$fecha;
		    $fecha_return="$anio-$mes-$dia";
		}
		return $fecha_return;
	}

	/**
	 * [fecha_texto Funcion Fechas]
	 * @param  [type] $valor [Fecha]
	 * @return [type]        [Fecha en letras]
	 */
	static function fecha_texto($valor){
		$nomdia="";
		$diasemana=date('N',strtotime($valor));

		$coleccion=explode('-',$valor);

		//obtener el dia de la semana
		switch (intval($diasemana)){
			case 1:
				$nomdia='Lunes';
				break;
			case 2:
				$nomdia='Martes';
				break;
			case 3:
				$nomdia='Miercoles';
				break;
			case 4:
				$nomdia='Jueves';
				break;
			case 5:
				$nomdia='Viernes';
				break;
			case 6:
				$nomdia='Sabado';
				break;
			case 7:
				$nomdia='Domingo';
				break;
		}

		//obtener el nombre del mes
		switch(intval($coleccion[1])){
			case 1:
				$nombremes='Enero';
				break;
			case 2:
				$nombremes='Febrero';
				break;
			case 3:
				$nombremes='Marzo';
				break;
			case 4:
				$nombremes='Abril';
				break;
			case 5:
				$nombremes='Mayo';
				break;
			case 6:
				$nombremes='Junio';
				break;
			case 7:
				$nombremes='Julio';
				break;
			case 8:
				$nombremes='Agosto';
				break;
			case 9:
				$nombremes='Septiembre';
				break;
			case 10:
				$nombremes='Octubre';
				break;
			case 11:
				$nombremes='Noviembre';
				break;
			case 12:
				$nombremes='Diciemebre';
				break;
		}

		return $nomdia . ' ' . $coleccion[2] .' de ' . $nombremes . ' del ' . $coleccion[0];
	}

}