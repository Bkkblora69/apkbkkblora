<?php require_once('includes/init.php'); ?>

<?php
$page = "Tiket";
require_once('template/header.php');

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Tiket</h1>

    <a href="tambah-tiket.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Buat Tiket </a>
</div>
	
<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
$msg = '';
switch($status):
	case 'sukses-baru':
		$msg = 'Data berhasil disimpan';
		break;
	case 'sukses-hapus':
		$msg = 'Data behasil dihapus';
		break;
	case 'sukses-edit':
		$msg = 'Data behasil diupdate';
		break;
endswitch;

if($msg):
	echo '<div class="alert alert-info">'.$msg.'</div>';
endif;
?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Daftar Data Tiket</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
					<tr align="center">	
						<th width="5%">No</th>
						<th>ID</th>
						<th>Request Ticket</th>
						<th>BKK/Client</th>
						<th>Category</th>
						<th>Priority</th>
						<th>Handle By</th>
						<th>Ticket Status</th>
						<th>Created At</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>			
				<?php
				$no=0;
				$query = mysqli_query($koneksi,"SELECT A.*,B.nama FROM tiket A LEFT JOIN user B ON A.user_id=B.id_user WHERE A.user_id=$_SESSION[user_id] ORDER BY A.created_at DESC");
				while($data = mysqli_fetch_array($query)):
				$no++;
				?>
					<tr align="center">
						<td><?php echo $no; ?></td>
						<td align="left"><?php echo $data['no']; ?></td>
						<td align="left"><?php echo $data['request']; ?></td>
						<td align="left"><?php echo $data['nama']; ?></td>
						<td align="left"><?php echo $data['kategori']; ?></td>
						<td align="left"><?php echo $data['priority']; ?></td>
						<td align="left"><?php echo $data['handle_by']; ?></td>
						<td align="left"><?php echo $data['status']; ?></td>
						<td align="left"><?php echo date('d-m-Y',strtotime($data['created_at'])); ?></td>
						<td>
							
							<div class="btn-group" role="group">

								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="edit-tiket.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								
								<?php if($data['handle_by'] == ""){ ?>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="hapus-tiket.php?id=<?php echo $data['id']; ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								<?php } ?>
							</div>
							
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once('template/footer.php');
?>