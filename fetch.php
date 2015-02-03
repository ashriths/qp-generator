<?php
require_once('php/function.php');



switch ($_GET['q']) {
  case 'courses':
          $courses = getCoursesBySemAndDept($_GET['sem'],$_GET['dept']);
          //print_r($courses);
          foreach ($courses as $c ) {
            echo '<option value="'.$c['course_id'].'">'.$c['name'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.$c['course_code'].')</option>';
          }
          
    
    break;
  case 'questions':
          $questions = getQuestions($_GET['course_id'],$_GET['unit']);
          $flag=false;
          
            
          
          foreach ($questions as $q ) {
            
            $flag=true;
             
            echo '
              
                  <div title="Click on Add to select" class="sub-question well well-sm">
                    <div class="row">
                      <div class="col-md-1">
                              <button type="button" disabled class="btn btn-default">'.$q['question_id'].'</button>
                      </div>
                      <div class="col-md-8">
                      <div class="qtext">'.$q['text'].'</div> <strong> <span> [ '.$q['co'].", ".$q['po'].' ]</span> from '.$q['unit'].'</strong>
                      </div>

                       <div class="col-md-3">
                            <div class="input-group">
                              <input type="number" title="Change marks to your requirement" disabled class="form-control" value="'.$q['marks'].'">
                              <span class="input-group-btn">
                               <button type="button" unit="'.$_GET['unit'].'" text="'.$q['text'].'" marks="'.$q['marks'].'" question="'.$q['question_id'].'" class="addQ btn btn-success">Add</button>
                              </span>
                            </div>
                            
                       </div>
                    </div>
                  </div>
                
              

                 ';
            
          }
          if(!$flag)
            echo '<div class="alert alert-danger" role="alert">Oh Snap! Looks like there are no questions from there in the database.</div>';

          
    
    break;
	
case 'similar':
	//prettyPrint($_GET); 
	if(strlen($_GET['text']) < 1 || count(explode(' ', $_GET['text'])) < 1 ){
		echo 'Please start typing to see similar Questions';
		exit;
	}
	$questions = getRelatedQuestions($_GET['course_id'],$_GET['unit'],$_GET['text']);
	//echo '<pre>';print_r($questions);echo '</pre>';
	
	if($questions['count']==0){
		echo 'Good work! No similar questions found. Go Ahead and add this question';
		exit;
	}
	echo '<small><table class="table table-striped table-hover">';
	$i= 0; //limit
	echo '<tr><th>#</th><th>Question</td><th>Marks</th></tr>';
	foreach ($questions['rows'] as $question) {
		echo '<tr><th>'.($i+1).'</th><td>'.$question['text'].'</td><td><strong>('.$question['marks'].')</strong></td></tr>';
		if(++$i>4) break;
	}
	
	echo '</table></small>';
	break;
  
  default:
    # code...
    break;
}


?>