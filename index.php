<?php

$rp = './';
require ($rp.'redirect.php');
require($rp.'php/design.php');
require_once 'php/config.php';

?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    $design->getIncludeFiles($rp);
    ?>
      <title>Question Paper Generator | BMSCE</title>
  </head>
  <body >
   
    <hr />
    <div class="container ">
      <div class="row">
		  <div class="jumbotron">
		  <h1>Hello!</h1>
		  <p>create question papers very easily.</p>
		  <div class="btn-group">
		 	 <p><button class="btn btn-success btn-lg" id="create" href="#" role="button">Create Now</button><a href="add.php" ><button class="btn btn-warning btn-lg" id="add" href="#" role="button">Add Question</button></a></p>
		  </div>
		</div>

			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
				        <h1 class="modal-title" id="myModalLabel">Welcome!</h1>
				      </div>
				      <div class="modal-body">
				        <h3>A few steps and your Question paper is ready...</h3>
				        <hr/>
				        <form action="generator.php" method="post" class="form-horizontal" id="myForm">
						 
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
        <p class="text-muted">&copy; Ashrith Sheshan 2015 All Rights reserved.</p>
        </div>
      </div>
    </div>

    <?php
        $design->getJSIncludes($rp);
    ?>
    <script type="text/javascript">


    $(document).ready(function(){

    	$("#create").click(function(){
    		$('#myModal').modal({
    		show : true,
    		backdrop: 'static',
  			keyboard: false
    		});
    	});
    	

    	<?php if(isset($_GET['create'])){
    		echo '$("#create").click();';
    	} ?>
   
    	

    	function resetForm(){

    		$("#myForm").html('<div class="form-group">\
						    <label for="dept" class="col-sm-2 control-label">Department</label>\
						    <div class="col-sm-9">\
						      <select id="select-dept" name="dept" class="form-control">\
								  <option selected disabled>Please Choose a Department</option><?php 
								  foreach($DEPT as $key => $value){
								  		echo '<option>'.$key.'</option>';
								  }
								  ?></select>\
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
				    if( $( "#select-test" ).length){
				    	$( "#select-test" ).focus();
				    }else{

					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						$('<div class="form-group"> \
										    <label for="test" class="col-sm-2 control-label">Test Type</label>\
										     <div class="col-sm-9">\
										      <select id="select-test" name="test" class="form-control">\
										      <option selected disabled>Please Choose a Test Number</option>\
										     	<option>CIE</option><option>SEE</option>\
										     </select>\
											</div>\
						 	 	</div>').appendTo("#myForm"); 
						 $( "#select-test" ).focus();   
						 afterTest();
					}
			});
    	}

    	
    	function afterTest(){
			$('#select-test').change(function(){
				var type = $(this).val();
				    $(this).parent().addClass("has-success has-feedback");
				    if(type=="CIE"){
					    var s = '<div class="form-group"> \
												     <div id="select-unit">\
														  <label for="unit" class="col-sm-2 control-label">Portions Units</label>\
														  <p>\
														  <div id="unit-option">\
														   	<input type="checkbox" name="unit[]" value="1A" />1A\
														  	<input type="checkbox" name="unit[]" value="1B" />1B\
														  	<input type="checkbox" name="unit[]" value="2A" />2A\
														  	<input type="checkbox" name="unit[]" value="2B" />2B\
														  	<input type="checkbox" name="unit[]" value="3A" />3A\
														  	<input type="checkbox" name="unit[]" value="3B" />3B\
														  	<input type="checkbox" name="unit[]" value="4A" />4A\
														  	<input type="checkbox" name="unit[]" value="4B" />4B\
														  	<input type="checkbox" name="unit[]" value="5A" />5A\
														  	<input type="checkbox" name="unit[]" value="5B" />5B\
														  </div>\
														  </p>\
														  <p> 1A indicates first half of Unit - 1 </p> \
													</div>\
								 	 	</div>';
					}else{
						var s='<div class="form-group"> \
												     <div id="select-unit" class="col-sm-9">\
												      	All Units Selected Automatically\
													</div>\
								 	 	</div>';
					}
				     if( $( "#select-unit" ).length){
				    	$( "#select-unit" ).html(s);
				    }else{
					    $(this).parent().parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
						if(type=="CIE"){
							$("#myForm").append(s); 
						}
						else{
							$("#myForm").append(s); 
						}
						 $( "#select-unit" ).focus(); 
						  afterUnit();
					}  
						
			});    		 		
    	}
    	
    	function afterUnit(){
    		$('.modal-footer').append('<button type="button" id="submit-button" class="btn btn-primary">Proceed</button>');
    		$("#submit-button").click(function(){
    			if( $('#select-test').val()=="CIE" && $("#select-unit input:checked").length == 0 ) {
    				alert("Please select atleast one unit");
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