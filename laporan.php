<?php require_once('includes/init.php'); ?>

<?php
$page = "Laporan";
require_once('template/header.php');

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Laporan</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Laporan Data Tiket</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			
			<form action="cetak.php">

				<?php
				require_once('includes/init.php');
				$query = mysqli_query($koneksi,"SELECT * from user WHERE role='user' ");
				
				?>

				<div class="form-group">
					<label>Pilih Cabang</label>
					<select class="form-control" name="user_id">
						<?php while($data = mysqli_fetch_array($query)){ ?>
						<option value="<?= $data['id_user'] ?>"><?= $data['nama'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label>Dari</label>
					<input type="date" name="dari" class="form-control">
				</div>

				<div class="form-group">
					<label>Sampai</label>
					<input type="date" name="sampai" class="form-control">
				</div>
				
				<button type="submit" class="btn btn-primary">Cetak</button>	
			</form>

		</div>
	</div>
</div>

<?php
require_once('template/footer.php');
?>