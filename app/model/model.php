<?php
/**
 * THIS FILE HELP TO MANAGE THE LOGIC UNDER OUR DATABASE ACTIONS
 **/
    class Model 
    {
		// Database object class
		
		private function conn(){
			// Create and return a database connection stream
			//require_once '../config.php';
			
			try 
			{
				/*$data_base_connector = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS, 
												array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", 
													  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
												)
										    );*/

				$data_base_connector = new PDO('mysql:host=localhost;dbname=ben_livraison', 'tony', '12345');

				return $data_base_connector;
			} 
			catch(Exception $e) 
			{
				die("Erreur de connexion à la base de données: " . $e->getMessage());
			}

		}

		public function add($table, $fields, $values, $data)
        {
            // create and save a database object
            $db = $this -> conn();
            $create_request = $db->prepare('INSERT INTO '.$table.'('.$fields.') VALUES('.$values.')');
            $create_request->execute($data);
		}
        
		public function read($table, $field)
		{
			// get and return a database object
			$db=$this->conn();
			$read_request=$db->query('SELECT '.$field.' FROM '.$table.'');
			return $read_request;
		}

		public function read_filter_once($table, $fields, $search_field, $value)
		{
			// get and return a database object
			$db=$this->conn();
			$read_request=$db->prepare('SELECT '.$fields.' FROM '.$table.' WHERE '.$search_field.'=?');
			$read_request->execute($value);
			return $read_request;
		}
			
		public function read_filter_or($table, $field, $sfield1, $sfield2, $values)
		{
			// get and return a database object
			$db=$this->conn();
			$read_request=$db->prepare('SELECT '.$field.' FROM '.$table.' WHERE '.$sfield1.'=? OR '.$sfield2.'=?');
			$read_request->execute($values);
			return $read_request;
		}

		public function read_filter_and($table, $fields, $field1, $field2, $field3='', $values)
		{

			if($field3!='') {
				// get and return a database object
				$db=$this->conn();
				$read_request=$db->prepare('SELECT '.$fields.' FROM '.$table.' WHERE '.$field1.'=? AND '.$field2.'=? AND '.$field3.'=?');
				$read_request->execute($values);
				return $read_request;
			}
			else
			{
				// get and return a database object
				$db=$this->conn();
				$read_request=$db->prepare('SELECT '.$fields.' FROM '.$table.' WHERE '.$field1.'=? AND '.$field2.'=?');
				$read_request->execute($values);
				return $read_request;
				
			}
		}


		public function read_jointure($table1, $table2, $fields, $value)
		{
			$db=$this->conn();
			$read_request = $db -> query('SELECT '.$fields.' FROM '.$table1.', '.$table2.' WHERE '.$table1.'.'.$value.' = '.$table2.'.'.$value);
			return $read_request;
		}

		public function read_filter_jointure($table1, $table2, $table3 = '', $fields, $jointures, $cond_field, $data)
		{
			if($table3 == '') 
			{
				$db=$this->conn();
				$read_request = $db -> prepare('SELECT '.$fields.' FROM '.$table1.', '.$table2.' WHERE '.$jointures.' and '.$cond_field.' = ?');
				$read_request -> execute($data);
				return $read_request;
			}
			else
			{
				$db=$this->conn();
				$read_request = $db -> prepare('SELECT '.$fields.' FROM '.$table1.', '.$table2.', '.$table3.' WHERE '.$jointures.' and '.$cond_field.' = ?');
				$read_request -> execute($data);
				return $read_request;
			}
		}


		public function update($table, $field, $search_field, $data) {
			$db= $this->conn();
			$read_request = $db -> prepare('UPDATE '.$table.' SET '.$field.' = ? WHERE '.$search_field.' = ?');
			$read_request -> execute($data);
		}

		public function display_offre_for_one_livraison($num_livraison) {
			$db= $this->conn();
			$read_request = $db -> prepare('SELECT id_offre, firstname, lastname, amount, description from offre, livreur, client where offre.id_livreur = livreur.id_livreur and livreur.email = client.email and offre.num_livraison = ?'); 
			$read_request -> execute(array($num_livraison));
			return $read_request;		
		}


		public function count($table, $field) 
		{
			$db =$this-> conn();
			$query = $db -> query('SELECT COUNT('.$field.') AS nbr FROM '.$table);
			return $query;
		}

		public function count_filter($table, $field, $search_field, $value)
		{
			$db = $this->conn();
			$query = $db -> prepare('SELECT COUNT('.$field.') AS nbr FROM '.$table.' WHERE '.$search_field.' = '.$value);
			return $query;
		}

		/*public function count_clients () 
		{
			$db = $this -> conn();
			$query = $db -> query('SELECT COUNT(email) AS nbr FROM client WHERE role = 0');	
			return $query;
		}*/


		public function read_filter_once_verify($table, $fields, $search_field, $value)
		{
			// get and return a database object
			$db=$this->conn();
			$read_request=$db->prepare('SELECT '.$fields.' FROM '.$table.' WHERE '.$search_field.'=?');
			$read_request->execute($value);

			$result = $read_request -> fetch();

			if($result) return true; 
			else return false;
		}

    }

?>
