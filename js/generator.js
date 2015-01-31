var noQ = 3; // Total questions
    	var questions =[];
    	var qN =1; // Question being editted
    	var query = "questions";
    	//var c_id = "<?php echo $sub['course_id'] ; ?>";
		
		$("#qplus").click(function(){
			qN++;
			// $("#questions").append('<div id="q1" class="panel panel-info">\
				    				// <div class="panel-heading"><input class="text-center" placeholder="Enter Unit or Question no" id="q'+qN+'Title" value="<?php if($_POST['test']=="SEE") echo "Unit" ; else echo "Question"; ?> '+qN+'"/> <a class="pull-right" href="#"><span class="badge" style="font-size:1em">0</span>  marks</a> </div>\
				    				// <div class="panel-body">\
				    					// <button title="Add Question" type="button" id="q'+qN+'plus" question="'+qN+'" class="addSub btn btn-success" >Add Subquestion</button>\
				    				// </div>\
				    			// </div>');
			assignQHandler();
		});

		function refreshBank(){
			$(".tab-pane").each(function(){
    			var id = $(this).attr("id").substring(1);
    			$("#u"+id).html('<div class="spinner-container"><div class="spinner" ><img width="50px" src="img/loader.gif"/></div></div>');
    			$.ajax({
		              type: "get",
		              url: "fetch.php",
		              data: { q: query ,course_id :c_id, unit:id},
		              cache: false
		            })
		              .done(function( html ) {
		              	
			                $("#u"+id).html(html); 
			               	
					});
    		});
		}

		$("#refresh").click(refreshBank);
    	
    	refreshBank();

    	$('#myTab a:first').tab('show') ;

    	var container;

    	function assignQHandler(){
    		$(".addSub").click(function(){
    		container = $(this).parent();
    		qN = $(this).attr("question");
    		//alert(qN);
    		$("#myModal").modal('show');
    		
    		$(".addQ").click(function(){
    			addQ($(this));
    		});
    		
    	});
    	}
    	
    	function getMarksFromQuestion(ref){
    		return $(ref).find("input[type='number']").val();
    	}
    	
    	function populateQuestions(){
    		for (var i = 1; i <= noQ; i++) {
    			// Decide on two, three or 4 questions
    			n = [2,3,4];
    			n = n[Math.floor(Math.random() * n.length)];
    			switch(n){
    				case 2:
    					q = $(".addQ [marks='10']").first();
    					addQ(q);
    					break;
    			}
    			
    		};
    	}
    	
    	assignQHandler();

    	function addQ(ref){
    		
    		
    			container.prepend(ref.parents().eq(4));
    			ref.removeClass("btn-success");
    			ref.addClass("btn-danger");
    			ref.html("Remove");
    			var m = ref.parent().prev();
    			m.removeAttr("disabled");
    			findTotal();
    			m.change(function(){
    				if(!parseInt($(this).val())){
    					alert("Enter a Numberic value");
    					$(this).focus();
    				}
    				findTotal();
    			});
    			ref.click(function(){
    				removeQ($(this));
    			});
    			$("#myModal").modal('hide');
    		
    	}

    	function removeQ(ref){
    		 
    				ref.addClass("btn-success");
    				ref.removeClass("btn-danger");
    				$("#u"+ref.attr("unit")).prepend(ref.parents().eq(4));
    				ref.html("Add");
	    			var m = ref.parent().prev();
	    			m.attr("disabled","disabled");
	    			findTotal();
	    			ref.click(function(){
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