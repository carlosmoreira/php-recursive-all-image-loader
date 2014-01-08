<?php
	//Get All Images
	
	function get_recursive_images($start_path){
		$dir_check = glob("$start_path");
		foreach ($dir_check as $file) {
			echo "<ul>";
			//Check if its an image		
			
			if(is_dir($file)){
			
				get_recursive_images("$file/*");
				
			}else{
				$ext = is_image($file);
				if($ext =="jpg" || $ext == "JPG" || $ext == "PNG" || $ext == "png"){
					echo "<li><img style='width:10%;' src='$file'>";
				}	
			}
			echo "</ul>";
		}
		return;	
	}
	function is_image($path)
	{
	    $a = getimagesize($path);
	    $image_type = $a[2];
	     
	    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	    {
	        return true;
	    }
	    return false;
	}
	
	
	
	get_recursive_images("*")
	
	
	
	
	
?>