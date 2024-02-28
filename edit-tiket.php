<?php require_once('includes/init.php'); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if(isset($_POST['submit'])):
	$request = $_POST['request'];
	$kategori = $_POST['kategori'];
	// $priority = $_POST['priority'];
	
	if(!$request) {
		$errors[] = 'request tidak boleh kosong';
	}		
	
	if(!$kategori) {
		$errors[] = 'kategori tidak boleh kosong';
	}
	
	// if(!$priority) {
	// 	$errors[] = 'priority tidak boleh kosong';
	// }
	
	
	if(empty($errors)):
		$update = mysqli_query($koneksi,"UPDATE tiket SET request = '$request', kategori = '$kategori' WHERE id = '$id'");
	
		if($update) {
			redirect_to('tiket.php?status=sukses-edit');
		}else{
			$errors[] = 'Data gagal diupdate';
		}
	endif;

endif;
?>

<?php
$page = "User";
require_once('template/header.php');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users-cog"></i> Data Tiket</h1>

	<a href="tiket.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
			<?php foreach($errors as $error): ?>
				<?php echo $error; ?>
			<?php endforeach; ?>
	</div>
<?php endif; ?>

<form action="edit-tiket.php?id=<?php echo $id; ?>" method="post">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-edit"></i> Edit Data Tiket</h6>
		</div>
		<?php
		if(!$id) {
		?>
		<div class="card-body">
			<div class="alert alert-danger">Data tidak ada</div>
		</div>
		<?php
		}else{
		$data = mysqli_query($koneksi,"SELECT * FROM tiket WHERE id='$id'");
		$cek = mysqli_num_rows($data);
		if($cek <= 0) {
		?>
		<div class="card-body">
			<div class="alert alert-danger">Data tidak ada</div>
		</div>
		<?php
		}else{
			while($d = mysqli_fetch_array($data)){
		?>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Request</label>
					<input autocomplete="off" type="text" name="request" required class="form-control" value="<?= $d['request'] ?>" />
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kategori</label>
					<input autocomplete="off" type="text" name="kategori" required class="form-control" value="<?= $d['kategori'] ?>" />
				</div>
				
				
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</div>
	<?php
		}
		}
		}
	?>
</form>

<?php
require_once('template/footer.php');
?>