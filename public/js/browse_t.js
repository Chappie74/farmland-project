$(document).ready(function() {
	// #511C39
	//rassign random colors to the category tags
	$(".tag").each(function(index, el) {
		var tag_colors = ["#511C39","#38B44A","#DF382C"]; 
		var index = Math.floor((Math.random() * tag_colors.length));
		$(this).css({
			"background-color": tag_colors[index],
			
		});
	});
});