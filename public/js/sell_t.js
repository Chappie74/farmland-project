
$(document).ready(function() {
	//for uploading image
	$("#img_file").change(function() {
		//validation variables
		var valid_extension = false;
		var valid_size = false;
		var error = false;
		var accepted_size = 1049600;
		var  accepted_size_check = false;
		var accepted_extensions = ["jpg", "png", "jpeg", "gif","bmp"]; //valid file extensions

		if($(this)[0].files.length === 0) //check to see if there was an error
		{
			error = true;
			$("label[id=status] > span").html("Error uploading file. Try again.");
		}
		else
		{
			var file = $(this)[0].files[0]; //store the file capture the details of the file uploaded
			var file_name_split = file.name.split("."); //split the name and the file extension
			var file_extension = file_name_split[file_name_split.length-1].toLowerCase(); //convert file extension to lower case
			accepted_extensions.forEach(function(current, index)//check to see if extension matches valid ones
			{ 
				if( current == file_extension)
				{
					valid_extension = true;
				}
			});

			if(file.size <= accepted_size){
				accepted_size_check = true;
			}	
		}

		if(error === true || valid_extension === false || accepted_size_check === false)
		{
			$("label[id=status]").removeClass('text-warning text-success').addClass('text-danger');
			$("label[id=status] > i.fa-times").removeClass('hidden');		
			$("label[id=status] > i.fa-check").addClass('hidden');

			if(valid_extension === false && error === false)
			{
				$("label[id=status] > span").html("Invalid file extension.(use jpg,png,bmp or gif)");
			}	
			else if(accepted_size_check === false && error === false)
			{
				$("label[id=status] > span").html("File too large. 1MB limit.");
			}
			$("button[type=submit").addClass('disabled');
			
		}
		else
		{
			//if everything is successful
			$("label[id=status]").removeClass('text-warning text-danger').addClass('text-success');
			$("label[id=status] > i.fa-check").removeClass('hidden');		
			$("label[id=status] > i.fa-times").addClass('hidden');
			$("label[id=status] > span").html("File upload successful ");
			$("button[type=submit").removeClass('disabled');
		}		
	});


	//handles suggestions for name picking
	$("input[name=product_name]").keyup(function(){
		var product_name = $(this).val();
		$("#dropdown").empty();
		$("#dropdown").addClass("hidden");

		if ($.trim(product_name) != '')
	    {
	      $.post('../public/product_names.php', {product_name: product_name},function(data, textStatus, xhr)
	      {

	          var results = JSON.parse(data);

	          if(results.length > 0)
	          {
	          	$("#dropdown").removeClass("hidden");
		          for (var i = results.length - 1; i >= 0; i--) 
		          {
		          	$("#dropdown").append('<li><a onclick="useSuggestion(this)"> '+results[i]["name"]+'</a></li>');
		          }
	          }

	      });
	  	};
	});
	

});

function useSuggestion(element) 
{
	var name = element.innerHTML;
	$("input[name=product_name]").val(name); 
}