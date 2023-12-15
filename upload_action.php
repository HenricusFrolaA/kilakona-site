OCTYPE html>
<?php
$image_id= $_POST["image_id"];
$detail_id= $_POST["detail_id"];
$conn =mysqli_connect("localhost", "root", "" , "kilakona_web");
if (!$conn)
{
	
die ("could not connect: " . mysql_error());
}

$file =	$_FILES['file'];
		$fileName =	$_FILES['file']['name'];
		$fileSize =	$_FILES['file']['size'];
		$fileTmp =	$_FILES['file']['tmp_name'];
		$fileError=	$_FILES['file']['error'];
		$filedetail =	$_FILES['file']['detail'];
		$fileExt=	explode('.', $fileName);
		$fileActualExt=strtolower(end($fileExt));
		$allowed =	array('jpg','npg','jpeg','png');

if (in_array($fileActualExt, $allowed)) {
	if ($fileError===0) {
			$filenameNew=uniqid('',true).".".$fileActualExt;
			$fileDestination = 'images/'.$filenameNew;
			//query of upload proposal file 
			$sql = "INSERT INTO image (image_id,image_size,image_size )VALUES ('$filenameNew')";
            $result = mysqli_query($conn,$sql)or die(mysqli_error($con));
			if ($result) {
				move_uploaded_file($fileTmp, $fileDestination);
				header('location:car_list.php');
			}	else
            {
                echo "record is noadded". mysqli_error($conn);
            } 
	} else {

		echo "upload file feiled";
	}
		
}
else {
			$filenameNew="car_vs.png";
			$sql = "INSERT INTO stock (  detail_id, image )VALUES (   '$type_id' , '$price_id' ,'$filenameNew')";
            $result = mysqli_query($conn,$sql)or die(mysqli_error($con));
			if ($result) {
				header('location:car_list.php');
			}	else
            {   
                echo "record is noadded". mysqli_error($conn);
            } 
	}


// $sql = "INSERT INTO stock (  type_id, price_id )
// VALUES (   '$type_id' , '$price_id' )";
// $my= mysqli_query($conn, $sql);
// if ($my)
// {
    
//     // echo "record added";  
//     header('location:car_list.php');
//     saveImageToDatabase($imageurl);  


// }
// else
// {
//     echo "record is noadded". mysqli_error($conn);
// } 
?>  
