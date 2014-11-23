<?php
	$response = array();
	
	if(isset($_POST['taskId'])){
		$taskId = $_POST['taskId'];
		
		require_once_DIR_.'/db_connect.php';
		
		$db = new DB_CONNECT();
		
		$result = mysql_query("DELETE FROM tasks WHERE taskId = $taskId");
		
		if(mysql_affected_rows()>0){
			$response["success"]=1;
			$response["message"]="Task successfully deleted";
			echo json_encode($response);
		} else{
			$response["success"]=0;
			$response["message"]="No task found";
			echo json_encode($response);
		}
	} else {
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
		echo json_encode($response);
	}
?>