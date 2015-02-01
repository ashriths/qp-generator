<?php

$rp = './';
require ($rp.'redirect.php');
require($rp.'php/design.php');
require($rp.'php/function.php');

//print_r($_POST);

$sub =  getTableDetailsbyId("course","course_id",$_POST['course']);
//print_r($sub);
//echo getFullDeptName($sub['dept']);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    $design->getIncludeFiles($rp);
    ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
      <title>Question Paper Generator | BMSCE</title>
  </head>
  <body >
   
    <hr />
    <div class="container ">
      <div class="row">
      	<div class="col-md-2">
      		<div class="panel panel-warning">      		
				 <div class="panel-heading">Control:</div>
				 <div class="panel-content">
				 	<form class="form-horizontal" id="myForm">
				 		<?php
				 			if($_POST['test']=="CIE"){
				 				echo '<label for="test-no" class="control-label">Test Number</label>
								<select id="select-test-no" name="test" class="form-control">
										      <option selected disabled>Select</option>
										     	<option value="1" >Test 1</option><option value="2" >Test 2</option><option value="3" >Test 3</option>
										     </select>';
				 			}
				 		?>
						<label for="max" class="control-label">Max Marks</label>
						<input type="number" name="max" id="select-max" class="form-control" value="<?php if($_POST['test']=="SEE") echo "100" ; else echo "40"; ?>" placeholder="Select Max Marks">
						<label for="date" class="control-label">Date</label>
						<input type="date" name="date" id="select-date" class="form-control" placeholder="Select Date">
						<label for="duration" class="control-label">Duration</label>
						<input type="text" name="duration" id="select-duration" class="form-control" value="<?php if($_POST['test']=="SEE") echo "3 Hours" ; else echo "75 Min"; ?>">
						<label for="date" class="control-label">Instruction:</label>
						<input type="text" name="instruction" id="select-instruction" class="form-control" value="<?php
								 if($_POST['test']=="SEE") echo "Answer any five full questions, choosing one full question from each unit." ; 
												else echo "Answer any TWO full questions"; 
							?>">
					</form>
				 	
				 </div>	
      		</div>
		 </div>
		  <div class="col-md-10">
		  		<div class="panel panel-default">
				  <div class="panel-heading">Questions Paper Design and Preview:</div>
				  <div class="panel-body">
				    		<strong><u><h3 class="text-center">BMS College of Engineering</h3></u></strong>
				    		<h4 class="text-center">
				    		<?php echo getFullDeptName($sub['dept']);?>
				    		</h4>
				    		<strong><h3 class="text-center" id="test-type"><?php if($_POST['test']=="SEE") echo "Semester End Main Examintation" ; else echo "Test - <span id=\"pTest\">?</span>"; ?></h3></strong>
				    		<table class="table">
							<tr><td><strong>Class:</strong> <?php echo $sub['sem']; ?> <br/><strong>COURSE:</strong><?php echo $sub['name']; ?><br/><strong>COURSE CODE:</strong><?php echo $sub['course_code']; ?></td><td><strong>Duration:</strong><span id="pDur"><?php if($_POST['test']=="SEE") echo "3 Hours" ; else echo "75 Min"; ?></span><br/><strong>Max Marks:</strong><span id="pMax"><?php if($_POST['test']=="SEE") echo "100" ; else echo "40"; ?></span><br/><strong>Date:</strong><span id="pDate">??/??/????</span></td></tr>
							</table>
				    		<hr/>
				    		<strong><u><h4 id="pIns" class="text-center"><?php
								 if($_POST['test']=="SEE") echo "Answer any five full questions, choosing one full question from each unit." ; 
												else echo "Answer any TWO full questions"; 
							?></h4></u></strong>
				    		<div id="questions">
				    			<div id="q1" class="panel panel-info">
				    				<div class="panel-heading"><input class="text-center" placeholder="Enter Unit or Question no" id="q1Title" value="<?php if($_POST['test']=="SEE") echo "Unit" ; else echo "Question"; ?> 1"/> <a class="pull-right" href="#"><span class="badge" style="font-size:1em">0</span>  marks</a> </div>
				    				<div class="panel-body">
				    					<div class="sub-container"></div>
				    					<button title="Add Question" type="button" id="q1plus" question="1" class="addSub btn btn-success" >Add Subquestion</button>
				    				</div>
				    			</div>
				    			<div id="q2" class="panel panel-info">
				    				<div class="panel-heading"><input class="text-center" id="q2Title" placeholder="Enter Unit or Question no" value="<?php if($_POST['test']=="SEE") echo "Unit" ; else echo "Question"; ?> 2"/> <a class="pull-right" href="#"><span class="badge" style="font-size:1em">0</span>  marks</a> </div>
				    				<div class="panel-body">
				    					<div class="sub-container"></div>
				    					<button title="Add Question" type="button" id="q1plus" question="2" class=" addSub btn btn-success" >Add Subquestion</button>
				    				</div>
				    			</div>
				    			<div id="q3" class="panel panel-info">
				    				<div class="panel-heading"><input class="text-center" placeholder="Enter Unit or Question no" id="q3Title" value="<?php if($_POST['test']=="SEE") echo "Unit" ; else echo "Question"; ?> 3"/><a class="pull-right" href="#"><span class="badge" style="font-size:1em">0</span>  marks</a> </div>
				    				<div class="panel-body">
				    					<div class="sub-container"></div>
				    					<button title="Add Question" type="button" id="q1plus" question="3" class="addSub btn btn-success" >Add Subquestion</button>
				    				</div>
				    			</div>
				    		</div>
				  </div>
				  <div class="panel-footer">
				  		<button title="Add Question" type="button" id="qplus" width="100px" class="btn btn-success" >+</button>
				  		
						 <a href="./"><button type="button" class="btn btn-default" >Reset</button></a>
						<button type="button" id="create" class="btn btn-warning" >Create</button></div>
				</div>
		  </div>
		  
	  </div>
		  
	</div>


	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
				        <h3 class="modal-title" id="myModalLabel">Choose Question <a class="pull-right" href="add.php" target="_blank"><span class="badge success btn-default" style="font-size:1em">Add New</span> </a></h3>
				      </div>
				      <div class="modal-body">
							        <div id="myTab" role="tabpanel">

										  <!-- Nav tabs -->
										 
										  <ul class="nav nav-tabs" role="tablist">
										  <?php
										  	if($_POST['test']=="CIE"){
										  		foreach ($_POST['unit'] as $u) {
										  			echo '<li role="presentation"><a href="#u'.$u.'" aria-controls="u'.$u.'" role="tab" data-toggle="tab">Unit '.$u.'</a></li>';
										  		}
										  		echo '</ul><div class="tab-content">';
										  		foreach ($_POST['unit'] as $u) {
										  			echo ' <div role="tabpanel" class="tab-pane" id="u'.$u.'"></div>';
										  		}
										  		echo '</div>';
										  		
										  	}else{
										  		echo '
										  			<li role="presentation" class="active"><a href="#u1" aria-controls="u1" role="tab" data-toggle="tab">Unit 1</a></li>
												    <li role="presentation"><a href="#u2" aria-controls="u2" role="tab" data-toggle="tab">Unit 2</a></li>
												    <li role="presentation"><a href="#u3" aria-controls="u3" role="tab" data-toggle="tab">Unit 3</a></li>
												    <li role="presentation"><a href="#u4" aria-controls="u4" role="tab" data-toggle="tab">Unit 4</a></li>
												    <li role="presentation"><a href="#u5" aria-controls="u4" role="tab" data-toggle="tab">Unit 5</a></li>
												    	</ul>
												     <div class="tab-content">
													    <div role="tabpanel" class="tab-pane active" id="u1"></div>
													    <div role="tabpanel" class="tab-pane" id="u2"></div>
													    <div role="tabpanel" class="tab-pane" id="u3"></div>
													    <div role="tabpanel" class="tab-pane" id="u4"></div>
													    <div role="tabpanel" class="tab-pane" id="u4"></div>
													  </div>
												  		';
										  	}
										  ?>
										   
										  

									</div>
				      </div>
				      <div class="modal-footer">
				       	<button type="button" id="refresh" class="btn btn-default" >Refresh</button>
				        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				      </div>
			    </div>
			  </div>
			</div>
     
    <div class="container-fluid" style="margin-top:40pt;" >
   
      <div class="container" >
        <div class="well">
        <p class="text-muted">&copy; Ashrith Sheshan 2015 All Rights reserved.</p>
        </div>
      </div>
    </div>

    <?php
        $design->getJSIncludes($rp);
    ?>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script type="text/javascript">


    $(document).ready(function(){
    	var noQ = 3; // Total questions
    	var questions =[];
    	var qN =1; // Question being editted
    	var query = "questions";
    	//var tabs = ;
    	var c_id = "<?php echo $sub['course_id'] ; ?>";
    	
    	function refreshBank(){
			$(".tab-pane").each(function(){
    			var id = $(this).attr("id").substring(1);
    			$("#u"+id).html('<div class="spinner-container"><div class="spinner" ><img width="50px" src="img/loader.gif"/></div></div>');
    			$.ajax({
		              type: "get",
		              url: "fetch.php",
		              data: { q: query ,course_id :c_id, unit:id},
		              cache: false,
		              async : false
		            })
		              .done(function( html ) {
		              	
			                $("#u"+id).html(html); 
			                
					});
    		});
		}

		$("#refresh").click(refreshBank);
    	
    	refreshBank();
    	
    	
    		
		
		$("#qplus").click(function(){
			qN++;
			$("#questions").append('<div id="q1" class="panel panel-info">\
				    				<div class="panel-heading"><input class="text-center" placeholder="Enter Unit or Question no" id="q'+qN+'Title" value="<?php if($_POST['test']=="SEE") echo "Unit" ; else echo "Question"; ?> '+qN+'"/> <a class="pull-right" href="#"><span class="badge" style="font-size:1em">0</span>  marks</a> </div>\
				    				<div class="panel-body">\
				    					<div class="sub-container"></div>\
				    					<button title="Add Question" type="button" id="q'+qN+'plus" question="'+qN+'" class="addSub btn btn-success" >Add Subquestion</button>\
				    				</div>\
				    			</div>');
			assignQHandler();
		});

		

    	$('#myTab a:first').tab('show') ;

    	var container;

    	function assignQHandler(){
    		$(".addSub").click(function(){
	    		container = $(this).parent();
	    		qN = $(this).attr("question");
	    		//alert(qN);
	    		$("#myModal").modal('show');
	    		$(".addQ").unbind('click').click(function(){
	    			addQ($(this));
	    		});
    		
    		});
    		
    		$('.sub-container').each(function(){
    				$(this).sortable({
    					placeholder: "portlet-placeholder ui-state-highlight"
    				});
    			});
    			
    		
    	}
    	
    	assignQHandler();

    	function addQ(ref){
    			//alert('Add called Caller : '+ arguments.callee.caller.toString());
    			ref.parents().eq(4).hide('fast');
    			//alert(container.find('.sub-container').html());
      			container.find('.sub-container').prepend(ref.parents().eq(4));
    			ref.removeClass("btn-success");
    			ref.addClass("btn-danger");
    			ref.html("Remove");
    			var m = ref.parent().prev();
    			m.removeAttr("disabled");
    			findTotal();
    			m.unbind().change(function(){
    				if(!parseInt($(this).val())){
    					alert("Enter a Numberic value");
    					$(this).focus();
    				}
    				findTotal();
    			});
    			ref.unbind().click(function(){
    				removeQ($(this));
    			});
    			$("#myModal").modal('hide');
    			ref.parents().eq(4).slideDown();
    			//alert(ref.click().length)
    			
    		
    	}

    	function removeQ(ref){
    				
    		 		//alert('Remove called Caller : '+ arguments.callee.caller.toString());
    				ref.addClass("btn-success");
    				ref.removeClass("btn-danger");
    				$("#u"+ref.attr("unit")).prepend(ref.parents().eq(4))
    				ref.html("Add");
	    			var m = ref.parent().prev();
	    			m.attr("disabled","disabled");
	    			findTotal();
	    			ref.unbind("click").click(function(){
	    				addQ($(this));
	    			});
    	}

    	function findTotal(){
    		
    		for (var i = 1; i <= noQ; i++) {
    			var total=0;
    			$("#q"+i+" input[type='number']").each(function(){
    				total+=parseInt($(this).val());
    			});
    			//alert(i+"Q"+total);
    			$("#q"+i+" .badge").html(total);
    		};
    		
    		//alert("total:"+total);
    	}
    	
    	function populateQuestions(){
    		
    		for (var i = 1; i <= noQ; i++) {
    			// Decide on two, three or 4 questions
    			n = [2,3,4];
    			container = $(".addSub").eq(i-1).parent();
    			n = n[Math.floor(Math.random() * n.length)];
    			//alert(n);
    			switch(n){
    				case 2:
    						q = $(".tab-content .addQ[marks='10']").eq(0);
    						addQ(q);
    						q = $(".tab-content .addQ[marks='10']").eq(1);
    						addQ(q);
    					break;
    				case 3:
    						q = $(".tab-content .addQ[marks='10']").eq(0);
    						addQ(q);
    						q = $(".tab-content .addQ[marks='5']").eq(0);
    						addQ(q);
    						q = $(".tab-content .addQ[marks='5']").eq(0);
    						addQ(q);
    					break;
    				case 4:
	    					for (var i=0; i < 4; i++) {
							  	q = $(".tab-content   .addQ[marks='5']").eq(0);
	    						addQ(q);
							}
						break;
    				
    				
    			}
    			//q = $(".tab-content .addQ[marks='5']").eq(n);
    			//alert('Adding to Question '+i+' '+q.html());
    			
    			//addQ(q);
    			
//     			
    		}
    	}
    	populateQuestions();

    	function convertDate(inputFormat) {
		  function pad(s) { return (s < 10) ? '0' + s : s; }
		  var d = new Date(inputFormat);
		  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
		}
		var date;
    	$( "#select-date" ).change(function () {
				    var value = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    var d = new Date(value);
				    date= convertDate(d);
				    $("#pDate").html(date); 
		});
		var max = $( "#select-max" ).val();
    	$( "#select-max" ).keyup(function () {
				    max = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    $("#pMax").html(max); 
		});
		var dur = $( "#select-duration" ).val();
		$( "#select-duration" ).keyup(function () {
				    dur = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    $("#pDur").html(dur); 
		});
		$( "#select-test-no" ).change(function () {
				    var value = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    $("#pTest").html(value); 
		});
		var inst = $( "#select-instruction" ).val();
    	$( "#select-instruction" ).keyup(function () {
				    inst = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    $("#pIns").html(inst); 
		});

		$("#create").click(function(){

			$('<form action="preview.php" method="post" id="hidForm" target="_blank"></form>').appendTo('body');
			$('<input>').attr({
			    name: 'dept',
			    value: '<?php echo getFullDeptName($sub['dept']); ?>'
			}).appendTo('#hidForm');
			var type = <?php if($_POST['test']=="SEE") echo '"Semester End Main Examintation"' ; else echo '"Test -"+$("#pTest").html()';?>;
			$('<input>').attr({
			    name: 'type',
			    value: type,
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'sem',
			    value: '<?php echo $sub['sem']; ?>',
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'duration',
			    value: dur,
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'course',
			    value: '<?php echo $sub['name']; ?>',
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'max',
			    value: max,
			}).appendTo('#hidForm');
			
			$('<input>').attr({
			    name: 'course-code',
			    value: '<?php echo $sub['course_code']; ?>',
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'date',
			    value: date,
			}).appendTo('#hidForm');

			$('<input>').attr({
			    name: 'instruction',
			    value: inst,
			}).appendTo('#hidForm');

			for (var i = 1; i <= noQ; i++) {
    				var q= {};
    				q.title = $("#q"+i+"Title").val();
    				//alert(q.title);
    				q.sub=[];
    				$("#q"+i+" .sub-question").each(function(){
    					var sq = {};
    					sq.text = $(this).find(".qtext").html();
    					sq.marks =  $(this).find(":input[type='number']").val();
    					sq.copo = $(this).find("span").html();
    					//alert(sq.copo);
    					q.sub.push(sq);
    				});
    				questions.push(q);

    		};
    		var data = JSON.stringify(questions);
    		$('<input>').attr({
			    name: 'questions',
			    value: data,
			}).appendTo('#hidForm');

    		

			$("#hidForm").submit();
			$("#hidForm").remove();
			questions = [];
				
		})
    });
    </script>
        
  </body>
</html>