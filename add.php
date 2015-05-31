<?php

$rp = './';
require ($rp.'redirect.php');
require($rp.'php/design.php');
require($rp.'php/function.php');
if(!isset($_SESSION['id']) || $_SESSION['type']!='admin')
		Redirect::redirectTo($rp."login.php");
//print_r($_POST);

if(isset($_POST['course'])) {
	$pos="";
	foreach ($_POST['po'] as $po) {
		$pos = $pos.", ".$po;
	}
    $result =  addQuestion($_POST['course'],$_POST['unit'],$_POST['text'],$_POST['marks'],"CO".$_POST['co'],substr($pos,1)," ");		
}

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
      <div class="jumbotron">
		  <h1>Hello!</h1>
		   <?php
      	if(isset($_POST['course'])) {
      		if($result>0){
      			echo '<div class="alert alert-success" role="alert">Oh wow! Your question was uploaded successfully.</div>';
      		}else{
      			echo '<div class="alert alert-danger" role="alert">Oh Snap! Your question was not uploaded. Please try again.</div>';
      		}
      	}
      ?>
		  <p>create question papers very easily.</p>
		  <div class="btn-group">
		 	 <p><a href="./?create" ><button class="btn btn-success btn-lg" id="create" href="#" role="button">Create Now</button></a><button class="btn btn-warning btn-lg" id="add" href="#" role="button">Add Question</button></p>
		  </div>
     </div>
		  

			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
				        <h3 class="modal-title" id="myModalLabel">Ready to add Question!</h3>
				      </div>
				      <div class="modal-body">
				        <form action="add.php" method="post" class="form-horizontal" id="myForm">
						 
						</form>
				      </div>
				      <div class="modal-footer">
				       <div class="spinner-container">
					    	<div style="display:none;" class="spinner" ><img width="50px" src="img/loader.gif"/></div>
					    </div>
					     <a href="./"><button type="button" id="exit" class="btn btn-danger" >Exit</button></a>
				        <button type="button" id="reset" class="btn btn-default" >Reset</button>
				        <!-- <button type="button" class="btn btn-primary">Proceed</button> -->
				      </div>
			    </div>
			  </div>
			</div>

		

	</div>
     
        
   




    <div class="container-fluid" style="margin-top:40pt;" >
   
      <div class="container" >
        <div class="well">
        <p class="text-muted">&copy; Ashrith Sheshan 2015  All Rights reserved.</p>
        </div>
      </div>
    </div>

    <?php
        $design->getJSIncludes($rp);
    ?>
    <script type="text/javascript">


    $(document).ready(function(){
    	<?php 
    	if(!isset($_POST['course'])) {
    		echo '
    				$(\'#myModal\').modal({
		    		show : true,
		    		backdrop: \'static\',
		  			keyboard: false
		    		});
    
    			';
    		}
    	?>
    		
    	$('#add').click(function(){
    		resetForm();
    		$('#myModal').modal({
		    		show : true,
		    		backdrop: 'static',
		  			keyboard: false
		    		});
    
    	});

 
    	

    	function resetForm(){
			$("#myForm").html('<div class="form-group">\
						    <label for="dept" class="col-sm-2 control-label">Department</label>\
						    <div class="col-sm-9">\
						      <select id="select-dept" name="dept" class="form-control">\
								  <option selected disabled>Please Choose a Department</option>\
								  <option>CSE</option>\
								</select>\
						    </div>\
						  </div>\
    				');
    		$( "#select-dept" ).change(function () {
				    var se = $(this).val();
				    $(this).prop("disabled", true);
				    $(this).parent().addClass("has-success has-feedback");
				    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
					$("#myForm").append('<div class="form-group">\
						    <label for="semester" class="col-sm-2 control-label">Semester</label>\
						    <div class="col-sm-9">\
						      <select id="select-sem" name="sem" class="form-control">\
								  <option selected disabled>Please Choose a semester</option>\
								  <option>1</option>\
								  <option>2</option>\
								  <option>3</option>\
								  <option>4</option>\
								  <option>5</option>\
								  <option>6</option>\
								  <option>7</option>\
								  <option>8</option>\
								</select>\
						    </div>\
						  </div>');
					$( "#select-sem" ).focus();
					afterSem();
			});
    		
    	}
		$(document).tooltip();
    	function afterSem(){
				$( "#select-sem" ).change(function () {
				    var se = $(this).val();
				    $(this).prop("disabled", true);
				    $(this).parent().addClass("has-success has-feedback");
				    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
				    $('.spinner').fadeIn('slow');
				    var query = "courses";
				    var dep= $("#select-dept").val();
				     $.ajax({
		              type: "get",
		              url: "fetch.php",
		              data: { q: query ,sem :se,dept:dep},
		              cache: false
		            })
		              .done(function( html ) {
		              	//alert(html);
			                $('<div class="form-group"> \
									    <label for="course" class="col-sm-2 control-label">Course</label>\
									     <div class="col-sm-9">\
									      <select id="select-course" name="course" class="form-control">\
									      <option id="loadingOption" selected disabled>Loading Relevant Courses...</option>\
									      '+html+' </select>\
										</div>\
					 	 	</div>').appendTo("#myForm"); 
			               	 $('.spinner').fadeOut('slow');
			               	 $('#loadingOption').html("Please Choose a course");
			               	 $( "#select-course" ).focus();
			               	 afterCourse();
			              });
				});
		}

    	function afterCourse(){
    		$( "#select-course" ).change(function () {
				    var co = $(this).val();
				   
				    $(this).parent().addClass("has-success has-feedback");
				    if( $( "#select-unit" ).length){
				    	$( "#select-unit" ).focus();
				    }else{

					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						$('<div class="form-group"> \
										    <label for="test" class="col-sm-2 control-label">Select Unit</label>\
										     <div class="col-sm-9">\
										      <select id="select-unit" name="unit" class="form-control">\
										      <option selected disabled>Please Choose a Unit Number</option>\
										     	<option>1A</option><option>1B</option><option>2A</option><option>2B</option><option>3A</option><option>3B</option><option>4A</option><option>4B</option><option>5A</option><option>5B</option>\
									     </select>\
										     <span id="helpBlock" class="help-block">Unit 1A indicates first half of Unit 1 and Unit 1B indicates second half.</span>\
											</div>\
						 	 	</div>').appendTo("#myForm"); 
						 $( "#select-unit" ).focus();   
						 afterUnit();
					}
			});
    	}

    	function afterUnit(){
			$('#select-unit').change(function(){
				var co = $(this).val();
				   
				    $(this).parent().addClass("has-success has-feedback");
				    if( $( "#select-text" ).length){
				    	$( "#select-text" ).focus();
				    }else{

					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						$('<div class="form-group"> \
										    <label for="test" class="col-sm-2 control-label">Question:</label>\
										     <div class="col-sm-9">\
										      <textarea data-trigger="focus" data-placement="bottom" title="Similar Questions" id="select-text" name="text" class="form-control"></textarea>\
											</div>\
						 	 	</div>').appendTo("#myForm");
						 $( "#select-text" ).popover(
						 	{
						 		html:true,
						 	}); 
						 //alert('Here');
						 $( "#select-text" ).focus();   
						 afterText();
					}
						
			});    		 		
    	}

    	function afterText(){
    		//alert('after Text');
    		var ajax=null;
    		$('#select-text').keyup(function() {
    			var t = $(this).val().trim();
    			
				if(ajax){
					ajax.abort();
				}
					//alert('fetch');
					var query='similar';
					var cid=$('#select-course').val();
					var u= $('#select-unit').val();
					ajax = $.ajax({
		              type: "get",
		              url: "fetch.php",
		              data: { q: query ,course_id: cid,unit:u ,text:t},
		              cache: false
		            })
		            .done(function( reply ) {
		            	$('.popover-content').html(reply);
		            	$('.popover').css('width','100%');		            
		            });
				
			});
			$('#select-text').change(function(){
				var co = $(this).val();
				   
				    $(this).parent().addClass("has-success has-feedback");
				    if( $( "#select-marks" ).length){
				    	$( "#select-marks" ).focus();
				    }else{

					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						$('<div class="form-group"> \
										    <label for="test" class="col-sm-2 control-label">Marks:</label>\
										     <div class="col-sm-9">\
										      <input id="select-marks" type="number" name="marks" class="form-control"/>\
										       <span id="helpBlock" class="help-block">Enter the number of marks this question can be asked for.</span>\
											</div>\
						 	 	</div>').appendTo("#myForm"); 
						 $( "#select-marks" ).focus();   
						 afterMarks();
					}
						
			});    		 		
    	}

    	function afterMarks(){
    		$( "#select-marks" ).change(function () {
				    var co = $(this).val();
				   
				    $(this).parent().addClass("has-success has-feedback");
				    if( $( "#select-co" ).length){
				    	$( "#select-co" ).focus();
				    }else{

					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						$('<div class="form-group"> \
										    <label for="test" class="col-sm-2 control-label">Test Type</label>\
										     <div class="col-sm-9">\
										      <select id="select-co" name="co" class="form-control">\
										      <option selected disabled>Please Choose a Course Outcome</option>\
										     	<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>\
									     </select>\
										     </div>\
						 	 	</div>').appendTo("#myForm"); 
						 $( "#select-co" ).focus();   
						 afterCo();
					}
			});
    	}
    	
    	function afterCo(){
			$('#select-co').change(function(){
				var type = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");

					  
					
				     if( $( "#select-po" ).length){
				    	$( "#select-po" ).focus();
				    }else{
				    	  var s = '<div class="form-group"> \
												     <div id="select-po" class="col-sm-9">\
														  <legend >Programme Outcomes</legend>\
														  <p>\
														  <div id="unit-option">\
														   	<input type="checkbox" name="po[]" value="PO1" />PO1\
														  	<input type="checkbox" name="po[]" value="PO2" />PO2\
														  	<input type="checkbox" name="po[]" value="PO3" />PO3\
														  	<input type="checkbox" name="po[]" value="PO4" />PO4\
														  	<input type="checkbox" name="po[]" value="PO5" />PO5\
														  	<input type="checkbox" name="po[]" value="PO6" />PO6\
														  	<input type="checkbox" name="po[]" value="PO7" />PO7\
														  	<input type="checkbox" name="po[]" value="PO8" />PO8\
														  	<input type="checkbox" name="po[]" value="PO9" />PO9\
														  	<input type="checkbox" name="po[]" value="PO10" />PO10\
														  	<input type="checkbox" name="po[]" value="PO11" />PO11\
														  	<input type="checkbox" name="po[]" value="PO12" />PO12\
														  </div>\
														  </p>\
														  <p> 1A indicates first half of Unit - 1 </p> \
													</div>\
								 	 	</div>';
					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						
							$("#myForm").append(s); 
						
						 
						  afterPo();
					}  
						
			});    		 		
    	}

    	function afterPo(){
    		
    		$('.modal-footer').append('<button type="button" id="submit-button" class="btn btn-primary">Submit</button>');
    		var s = '<label>Add another similar Question<input type="checkbox" name="add-another" checked="false" /></label>';
    		$("#myForm").append(s); 
    		$("#submit-button").click(function(){
    			if( $("#select-po input:checked").length == 0 ) {
    				alert("Please select atleast one PO");
    				return;
    			}
    			$("#myForm").submit();

    		});

    	}
    	resetForm();
    	$("#reset").click(resetForm);
    });
    </script>
        
  </body>
</html>