<?php
require 'db.php';
if(isset($_POST))
{
	echo print_r($_POST);
	if(!empty($_POST['id_ary']))
	{
		$id_ary = explode(" ", $_POST['id_ary']);
		foreach ($id_ary as $data) {
		for ($i=0; $i <$data; ) { 
			$query = "DELETE FROM contact WHERE id='$data'";
			mysqli_query($con,$query);
			$i++;
			echo mysqli_error($con);
		}
		}
		echo '<div class="alert alert-success">Successfully Deleted.</div><script>window.location.reload();</script>';
	}
	else
	{
		echo '<div class="alert alert-warning">Nothing has been selected.</div>';
	}
}
?>
