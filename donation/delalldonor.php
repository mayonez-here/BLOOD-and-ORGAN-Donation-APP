<?php
require 'db.php';
if(isset($_POST))
{
	#echo print_r($_POST);
	if(!empty($_POST['id_ary']))
	{
		$id_ary = explode(" ", $_POST['id_ary']);
		foreach ($id_ary as $data) {
		// for ($i=0; $i <$data; ) { 
			$query = "DELETE FROM bloodonor WHERE id='$data'";
			
			$query1 = "select uname FROM bloodonor WHERE id = '$data'";
			$result =mysqli_query($con,$query1);
			
			$row = mysqli_fetch_assoc($result);
            $user_name = $row['uname'];
			// echo $user_id;
			$query2 = "Delete FROM death WHERE death.uname = '$user_name'";
			mysqli_query($con,$query2);
			mysqli_query($con,$query);
			// $i++;
			#mysqli_error($con);
		
		}
		// echo '<div class="alert alert-success">Successfully Deleted.</div><script>window.location.reload();</script>';

	}
	else
	{
		echo '<div class="alert alert-warning">Nothing has been selected.</div>';
	}
}
?>
