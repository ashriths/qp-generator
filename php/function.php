<?php
require_once('dbconfig.php');



function setupDatabase(){
    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if($db->connect_errno>0){
      die('Error:'.$db->connect_error.' ');
    }
    return $db;
  }

function getTableDetailsbyNonId($table,$att,$value)
  {
    $db = setupDatabase();
    $sql = "SELECT * FROM $table WHERE $att = '$value'";
    $result = $db->query($sql);
    if(!$result){ 
      die('Error:'.$db->error);
    }
    //return multiple rows when query fetches more than one
    
    if(mysqli_num_rows($result)>1){
    $rows = array();
        while($row = $result->fetch_assoc()) {
             $rows[] = $row;
        }
    return $rows;
    } 
    return $result;
  }

function getFullDeptName($d){
	$s = "Dept. of ";
	switch ($d) {
		case 'CSE':
				return $s."Computer Science and Engineering";
			
		default:
				return "";
			


	}
	
}

function getCoursesBySemAndDept($sem,$dep)
  {
    $db = setupDatabase();
    $sql = "SELECT * FROM course WHERE sem = $sem AND dept = '$dep'";
    //echo $sql;
    $result = $db->query($sql);
    if(!$result){ 
      die('Error:'.$db->error);
    }
    //return multiple rows when query fetches more than one
    
    if(mysqli_num_rows($result)>1){
    $rows = array();
        while($row = $result->fetch_assoc()) {
             $rows[] = $row;
        }
    return $rows;
    } 
    return $result;
  }

  function getQuestions($cid,$unit)
  {
    $db = setupDatabase();
    if(strlen($unit)==1)
    	$sql = "SELECT * FROM question WHERE course_id = $cid AND (unit = '".$unit."A' OR unit = '".$unit."B')";
	else
		$sql = "SELECT * FROM question WHERE course_id = $cid AND unit = '$unit'";
    //echo $sql;
    $result = $db->query($sql);
    if(!$result){ 
      die('Error:'.$db->error);
    }
    //return multiple rows when query fetches more than one
    
    if(mysqli_num_rows($result)>1){
    $rows = array();
        while($row = $result->fetch_assoc()) {
             $rows[] = $row;
        }
    return $rows;
    } 
    return $result;
  }

function getTableDetailsbyId($table,$att,$value){
    $db = setupDatabase();
    $sql = "SELECT * FROM $table WHERE $att = '$value'";
   
    $result = $db->query($sql);
    if(!$result){ 

      die('Error:'.$db->error);
    }
    
    //by id cant return multiple rows ever cos its by id
    $result = $result->fetch_assoc();
    return $result;
  }

 function addQuestion($c_id,$unit,$text,$marks,$co,$po,$img){
		$db = setupDatabase();
		foreach (func_get_args() as $arg) {
			$arg = $db->real_escape_string($arg);
		}

		$sql = "INSERT INTO question (course_id, unit ,`text`,marks,co,po,img) VALUES ($c_id, '$unit','$text',$marks, '$co','$po','$img')";
		$result = $db->query($sql);
		if(!$result){
			die('Error:'.$db->error);
		}
		$id = $db->insert_id;
		return $id;
	}



?>