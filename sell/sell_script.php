<?php
require_once('../includes/connect.php');
	

	//echo $name, " ", $email, " ", $item_name, " ", $item_desc, " ", $item_cost;

	
	

	try {

	    

	    // upload the image
	    //echo '<pre>',print_r($_FILES),'</pre>';

	    $all_ok = 1;
		if ($_POST["submit"]) {

			$name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);
			$item_name = htmlentities($_POST['item_name']);
			$item_desc = htmlentities($_POST['item_desc']);
			$item_cost = (intval($_POST['item_cost']));
			$ph_no = (intval($_POST['ph_no']));

			
	    	$sql = "SELECT count(*) FROM sell_table"; 
			$result = mysqli_query($conn , $sql);
			$number_of_rows = mysqli_num_rows($result);
			$last_id = $number_of_rows;

			
			
			if (!empty($_FILES['fileToUpload']['name'][0]) && $all_ok == 1) {

				 
				$files = $_FILES['fileToUpload'];

				$uploaded = array();
				$failed = array();
				
				$allowed = array('jpg', 'jpeg' , 'png', 'bmp');
				foreach ($files['name'] as $position => $file_name) {
					
					$file_tmp = $files['tmp_name'][$position];
					$file_size = $files['size'][$position];
					$file_error = $files['error'][$position];

					$file_name_array = explode('.', $file_name);
					$file_ext = strtolower(end($file_name_array));
					
					if (in_array($file_ext, $allowed)) {
						
						if ($file_error === 0){

							if ($file_size <= 3097152) { // size of 3MB

								$file_name_new = $last_id.'.'.$file_ext;
								$file_destination = 'sell_upload/'.$file_name_new;
								//echo $file_destination, "file dest<br>";
								// echo $file_tmp, " temp dest<br>";
								if (move_uploaded_file($file_tmp, $file_destination)) {
									$upload[$position] = "[{$file_name}] successfully uploaded.";
									$sql = "INSERT INTO sell_image(image_name) VALUES ('$file_name_new')";
									$result = mysqli_query($conn , $sql);
	    						
									if($result){
										//echo $file_name." is inserted in sell_image table.<br>";
										file_put_contents('file.txt', 'heres');
										$sql = "INSERT INTO sell_table (name, email, item, description, cost, phone_number) VALUES ('$name', '$email', '$item_name', '$item_desc', $item_cost, $ph_no)";
										// echo $sql;
										$result = mysqli_query($conn , $sql);

								    	header("Location: ../shop/form.php");
										exit();
									} else {
										echo "Unable to add to table sell_image<br>";
									}			
								} else {
									$failed[$position] = "[{$file_name}] unable to upload.";
								}
							} else {	
								$failed[$position] = "[{$file_name}] has size greater than upload limit of 3MB.";
							}
						} else {
							$failed[$position] = "[{$file_name}]  errored with code {$file_error}";
						}
					} else {
						$failed[$position] = "[{$file_name}] does to support the allowed upload extension.";
					}
				}
				if (!empty($uploaded)) { // not empty
					foreach($uploaded as $x => $x_value) {
					    echo $x_value."<br>";
					}
					// echo '<pre>',print_r($uploaded),'</pre>';
				}

				if (!empty($failed)) {
					foreach($failed as $x => $x_value) {
					    echo $x_value."<br>";
					}
					// echo '<pre>',print_r($failed),'</pre>';
				}
			} else {
				echo "Please upload at least one file<br>";
			}
		}






	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }


	//phpinfo();

?>
