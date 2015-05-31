<?php
require_once('dbconfig.php');
require_once ('config.php');

function prettyPrint($str){
	echo '<pre>';
	print_r($str);
	echo '</pre>';
}

function setupDatabase(){
    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if($db->connect_errno>0){
      die('Error:'.$db->connect_error.' ');
    }
    return $db;
  }

function authenticate($email,$password){
		$db = setupDatabase();
		$email = $db->real_escape_string($email);
		$password = $db->real_escape_string($password);
		$hashedPassword = sha1($password);
		$sql = "SELECT * FROM user WHERE email = '$email'";
		//echo $sql;
		$result = $db->query($sql);
		if(!$result){	
			die('Error:'.$db->error);
		}
		if($result->num_rows==1){
			//echo 'User Exists<br/>';
			$user=$result->fetch_assoc();
			//print_r($user);
			if($user['password']==$hashedPassword){
				//user exists
				//echo 'User Entered Correct Password';
				return array('result'=>1,'type'=>$user['type'],'user_id'=>$user['user_id'], 'user'=>$user); 
				
			}
			else{
				//echo 'User Entered Wrong password';
				return array('result'=>0,'message'=>'Hey '.$user['name'].' you didn\'t enter your coreect password.'); 
			}
		}
	
		//echo 'User Not Found anywhere';
		return array('result'=>0,'message'=>'We don\'t recognize your email. Please chack again.'); 
		
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
	global $DEPT;
	if(array_key_exists($d, $DEPT))
		return "Dept of ".$DEPT[$d];
	else {
		return '';
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
  
function fetchResult($sql){
	$db = setupDatabase();
	$result = $db->query($sql);
	if(!$result){ 
      die('Error:'.$db->error);
    }
	$rows = array();
	if(mysqli_num_rows($result)>1){
    $rows = array();
        while($row = $result->fetch_assoc()) {
             $rows[] = $row;
        }
    
    }else{
    	$rows[0]= $result->fetch_assoc(); 
    }
	//print_r($rows);
	return array('count'=>mysqli_num_rows($result),'rows'=>$rows);
	
}



function getRelatedQuestions($cid,$unit,$text){
	$usual = array("explain","describe","example","what");
	$words = split(' ', $text);
	//$words = array_reverse($words);
	$q = array();
	foreach ($words as $word) {
		if(!in_array($word, $usual)){
			$sql = "SELECT * FROM question WHERE course_id = $cid AND unit = '$unit' AND text LIKE '%$word%'";
			//echo $sql;
			$result = fetchResult($sql);
			//print_r($result);
			if($result['count']>0){
				foreach ($result['rows'] as $row) {
					//print_r($row);
					if(!isset($q[$row['question_id']])){
						$q[$row['question_id']]= $row;	
						$q[$row['question_id']]['match']=1;
					}else{
						$q[$row['question_id']]['match']++;	
					}
				}
			}
		}
		
	}
	$match = array();
	foreach ($q as $key => $value) {
		$match[$key]=$value['match'];
	}
	array_multisort($match,SORT_DESC,$q);
	//prettyPrint($q);	
	return array('count'=>count($q),'rows'=>$q);  
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

class Session{

	
	public function createSession($id,$type){
		$_SESSION['id']=$id;
		$_SESSION['type']=$type;
	}
	

	function __construct(){
		session_start();
	}

	function destroySession(){

		session_destroy();
	} 

}

$session = new Session();



?>