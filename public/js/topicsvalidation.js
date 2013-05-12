	$(document).ready(function() { 
		$("input[name='projectname']").blur(function() {  
		    $("input[name='TopicsTable']").val("topics" +  this.value);
		    }  
		);
	});