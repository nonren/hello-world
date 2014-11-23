<?php
	$response = array();
	
	if(isset($_POST['name'])&&isset($_POST['description'])){
		$name = $_POST['name'];
		$description = $_POST['description'];
		
		require_once_DIR_.'/db_connect.php';
		
		$db = new DB_CONNECT();
		
		$result = mysql_query("INSERT INTO tasks(name,description,dateCreated,
		dateUpdated)VALUES('$name','$description',NOW(),NOW())");
		
		if($result){
			$response["success"]=1;
			$response["message"]="Task successfully created.";
			
			echo json_encode($response);
		} else {
			$response["success"]=0;
			$response["message"]="Oops! An error occurred.";
		}
		
	} else {
		$response["success"]=0;
		$response["message"]="Required field(s) is missing";
		echo json_encode($response);
	}
?>