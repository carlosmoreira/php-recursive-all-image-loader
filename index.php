<?php
	//Get All of file types
	
	function get_recursive_filetypes($start_path, $flags){
		$dir_check = glob("$start_path");
		if(sizeof($dir_check) < 1) return;
		echo "<ul>";
		foreach ($dir_check as $file) {
						
			if(is_dir($file)){
				get_recursive_filetypes("$file/*", $flags);
			}else{
				$ext = new SplFileInfo($file);
				$ext = $ext->getExtension();
				if(in_array($ext, $flags)){
					echo "<li><img style='width:10%;' src='$file'>";
				}	
			}
		}
		echo "</ul>";
	}
	
	get_recursive_filetypes("*", array("jpg", "png"));
	
?>
