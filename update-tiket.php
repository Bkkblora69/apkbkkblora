<?php require_once('includes/init.php'); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

	if(empty($errors)):
		$update = mysqli_query($koneksi,"UPDATE tiket SET handle_by = '$_POST[handle_by]', status = '$_POST[status]', priority = '$_POST[priority]' WHERE id = '$id'");
	
		if($update) {
			redirect_to('list-tiket.php?status=sukses-edit');
		}else{
			$errors[] = 'Data gagal diupdate';
		}
	endif;

?>