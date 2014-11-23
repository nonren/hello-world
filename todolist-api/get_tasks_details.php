<?php
	$response = array();
	
	require_once_DIR_.'/db_connect.php';
	
	$db = new DB_CONNECT();
	
	if(isset($_GET["taskId"])){
		$taskId = $_GET['taskId'];
		
		$result = mysql_query("SELECT * FROM tasks WHERE taskId = $taskId");
		
		if(!empty($result)){
			if(mysql_num_rows($result)>0){
				
				$result = mysql_fetch_array($result);
				$task = array();
				$task["taskId"] = $result["taskId"];
				$task["name"] = $result["name"];
				$task["description"] = $result["description"];
				$task["dateCreated"] = $result["dateCreated"];
				$task["dateUpdated"] = $result["dateUpdated"];
				
				$response["success"]=1;
				array_push($response["task"],$task);
				echo json_encode($response);
			} else {
				$response["success"]=0;
				$response["message"]="No task found";
				echo json_encode($response);
			}
		} else {
			$response["success"]=0;
			$response["message"]="No task found";
			echo json_encode($response);
		}
		
	} else {
		$response["success"]=0;
		$response["message"]="Required field(s) is missing";
		echo json_encode($response);
	}
?>