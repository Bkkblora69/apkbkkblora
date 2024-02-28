<?php require_once('includes/init.php'); ?>

<?php
$errors = array();
$sukses = false;

if(isset($_POST['submit'])):	
	$request = $_POST['request'];
	$kategori = $_POST['kategori'];
	// $priority = $_POST['priority'];

	if(!$request) {
		$errors[] = 'Kode tiket tidak boleh kosong';
	}
	// Validasi kategori Kriteria
	if(!$kategori) {
		$errors[] = 'kategori tiket tidak boleh kosong';
	}		
	// Validasi Tipe
	// if(!$priority) {
	// 	$errors[] = 'priority tiket tidak boleh kosong';
	// }
	
	$target_dir = "uploads/";
	$namaFile = time().$_FILES['file']['name'];
	$namaSementara = $_FILES['file']['tmp_name'];

	$path = $target_dir.$namaFile;

	$terupload = move_uploaded_file($namaSementara, $path);

	if(empty($errors)):
		$user_id = $_SESSION["user_id"];
		$n = date('Y-m-d');
		$q = mysqli_query($koneksi,"SELECT * FROM tiket WHERE DATE(created_at)='$n' AND user_id='$user_id'");
		$no = 1;
		while($d = mysqli_fetch_array($q)){
			$no = (int)substr($d['no'],-4)+1;
		}

		
		$no = 'TIC'.$_SESSION['kode_cabang'].date('Ymd').sprintf("%'.04d\n", $no);
		
		$date = date('Y-m-d H:i:s');
		$simpan = mysqli_query($koneksi,"INSERT INTO tiket VALUES ('','$no', '$request','$user_id', '$kategori','$path', '','','Pending','$date')");
		if($simpan) {
			redirect_to('tiket.php?status=sukses-baru');		
		}else{
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;
?>

<?php
$page = "Kriteria";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Tiket</h1>

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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-fw fa-plus"></i> Tambah Data Tiket</h6>
    </div>
	
	<form action="tambah-tiket.php" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Request</label>
					<input autocomplete="off" type="text" name="request" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Kategori</label>
					<input autocomplete="off" type="text" name="kategori" required class="form-control"/>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">File</label>
					<input autocomplete="off" type="file" name="file" required class="form-control"/>
				</div>
				
				<!-- <div class="form-group col-md-6">
					<label class="font-weight-bold">Priority</label>
					<select name="priority" class="form-control" required>
						<option value="">--Pilih--</option>
						<option value="Low">Low</option>
						<option value="Medium">Medium</option>
						<option value="High">High</option>						
					</select>
				</div> -->
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>


<?php
require_once('template/footer.php');
?>