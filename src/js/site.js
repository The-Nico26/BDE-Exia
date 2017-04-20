function getAJAX(clas, page){
	$.ajax({
		url : page,
		method : "GET",
		dataType : "html",
		success : function(html){
			$(clas).append(html);
		}
	});
}

function postAJAX(clas, page, para){
	$.ajax({
		url : page,
		method : "POST",
		data : para,
		dataType : "html",
		success : function(html){
			if(clas !== null)
				$(clas).append(html);
		}
	});
}

function send(page, para){
	$.ajax({
		url : page,
		method : "POST",
		data : para,
		dataType : "html",
		success : function(html){
			document.location.reload(true);
		}
	});
}