<?php

	//Esta es la clase de coneccion Padre que hereda los atributos a los modelos
	class Connection
	{
		protected $connection;

		//Conecta a la base de datos
		public function connect()
		{
			

			if(!$this->connection = mysqli_connect("localhost","root","root","iainteractive"))
			{
				echo "<br><b style='color:red;'>Error al tratar de conectar</b><br>";	
			}
			$this->connection->set_charset('utf8');// Previniendo errores con SetCharset
		}

		//funcion que cierra la coneccion
		public function close()
		{
			$this->connection->close();
		}

		//Funcion que genera las consultas genericas a la base de datos
		protected function query($query,$nombreproceso=null)
		{
		
			$result = $this->connection->query($query) or die("<b style='color:red;'>Error en la consulta.</b><br /><br />".$this->connection->error."<br>Error:<br>".$query);
			if($nombreproceso)
				$this->transaccion($nombreproceso,$query);
			return $result;
		}
		
		protected function multi_query($query,$nombreproceso=null)
		{
		
			$result = $this->connection->multi_query($query) or die("<b style='color:red;'>Error en la consulta.</b><br /><br />".$this->connection->error."<be>Error:<br>".$query);
			if($nombreproceso)
				$this->transaccion($nombreproceso,$query);
			return $result;
		}

		protected function insert_id($query,$nombreproceso=null)
		{
			if(stristr($query, 'insert'))
			{
				$this->connection->query($query) or die("<b style='color:red;'>Error en la consulta.</b><br /><br />".$this->connection->error."<be>Error:<br>".$query);
				if($nombreproceso)
					$this->transaccion($nombreproceso,$query);
				return $this->connection->insert_id;
			}
			else
			{
				return "La consulta no incluye un INSERT.";
			}
		}
        protected function queryArray($sql, $relational = true, $nombreproceso = null)
         {
            try{
                if (empty($sql)){
                    throw new Exception("empty SQL");
                }
                $this->sql = $sql;
                //$this->connect();

                $result = $this->connection->query($sql);
                if($nombreproceso)
					$this->transaccion($nombreproceso,$sql);

                if (!$result) {
                    return array("status"=>false, "total" => $sql,"msg"=>" Favor de contactar con el area de soporte y facilitar el mensaje de error que esta entre parentesis.( ".$this->connection->error ." )");
                }

                $this->affectedRows = mysqli_num_rows($result);

                $fields = array();
                while ($finfo = mysqli_fetch_field($result)) {
                    $fields[] = $finfo->name;
                }

                $rows = array();

                if  ($relational) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $rows[] = $row;
                    }

                }else {
                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                        foreach ($row as $key => $value){
                            $rows[$key][] = $value;
                        }
                    }
                }
                $insert_id = $this->connection->insert_id;
                //$this->close();
                return array("status" => true, "total" =>  $this->affectedRows, "fields" => $fields, "rows" => $rows,"insertId"=>$insert_id);

            }catch(Exception $e){
                //$this->close();
                return array("status" => false, "msg" => $e->getMessage());
            }
        }
		//Metodo para generar transaccion con la base de datos
		protected function dataTransact($data)
		{
			$this->connection->autocommit(false);
			if($this->connection->query('BEGIN;'))
			{
				if($this->connection->multi_query($data))
				{
					do {
						/* almacenar primer juego de resultados */
						if ($result = $this->connection->store_result()) {
							while ($row = $result->fetch_row()) {
								echo $row[0];
							}
							$result->free();
						}

					} while ($this->connection->more_results() && $this->connection->next_result());

					$this->connection->commit();
					return true;
				}
				else
				{
					$error = $this->connection->error;
					//echo "Chiales esto trono!";
					$this->connection->rollback();
					return $error;
				}		
			}
			else
			{
				$error = $this->connection->error;
				$this->connection->rollback();
				return $error;
			}
		}
		
	}

?>