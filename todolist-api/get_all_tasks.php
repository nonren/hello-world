<?php
	$response = array();
	
	require_once_DIR_.'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	$result = mysql_query("SELECT * FROM tasks") or die(mysql_error());
	
	if(mysql_num_rows($result)>0){
		$response["tasks"] = array();
		
		while($row = mysql_fetch_array($result)){
			
			$tasks = array();
			$tasks["taskId"]=$row["taskId"];
			$tasks["name"]=$row["name"];
			$tasks["description"]=$row["description"];
			$tasks["dateCreated"]=$row["dateCreated"];
			$tasks["dateUpdated"]=$row["dateUpdated"];
			
			array_push($response["tasks"],$task);
		}
		$response["success"]=1;
		echo json_encode($response);
	} else {
		$response["success"]=0;
		$response["message"]="No tasks found";
		echo json_encode($response);
	}
?>