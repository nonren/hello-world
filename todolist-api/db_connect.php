<?php
	class DB_CONNECT{
		function _construct(){
			$this->connect();	
		}
		
		function _destruct(){
			$this->close();	
		}
		
		function connect(){
			require_once_DIR_.'/db_config.php';
		
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD)or
	die(mysql_error());
	
		$db = mysql_select_db(DB_DATABASE)or die(mysql_error()) or 
	die(mysql_error());
	
		return $con;
		}
		
		function close(){
			mysql_close();
		}	
	}
?>