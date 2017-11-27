
$(document).ready(function() {
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
			
		}
		else
		{
			//if everything is successful
			$("label[id=status]").removeClass('text-warning text-danger').addClass('text-success');
			$("label[id=status] > i.fa-check").removeClass('hidden');		
			$("label[id=status] > i.fa-times").addClass('hidden');
			$("label[id=status] > span").html("File upload successful ");
		}
	});
});