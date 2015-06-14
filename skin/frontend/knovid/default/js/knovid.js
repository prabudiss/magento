function loadVideo(pid, index, base_url){
		var prod_id = jQuery(this).attr("prod_id");
		var obj = jQuery(this);
		var data = "prod_id=" + pid;
		data += "&index=" + index;
		data += "&type=1"  
			jQuery.ajax({
			  url: base_url+'courses/index/GetVideo',
			  dataType: 'html',
			  type : 'post',
			  data: data,
			  statusCode: {
			  		200: function(response) {
			  			document.getElementById('divVideoContent').innerHTML = response;
			  		},
			  		404: function() {
			  		alert("Something went wrong!!!");
			  	}
			  }
			});		
}