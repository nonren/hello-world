<?php
	$response = array();
	
	if(isset($_POST['taskId'])&&isset($_POST['name'])&&isset($_POST['description'])){
		
		$taskId = $_POST['taskId'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		
		require_once_DIR_.'/db_connect.php';
	
		$db = new DB_CONNECT();
		
		$result = mysql_query("UPDATE tasks SET name = '$name', 
		description = '$description', dateUpdate = NOW() WHERE taskId = $taskId");
		
		if($result){
			$response["success"]=1;
			$response["message"]="Task successfully updated.";
			echo json_encode($response);
		} else {
			
		}
	} else {
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
		echo json_encode($response);
	}
?>