<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak</title>

	<style type="text/css">
		table {
			border-collapse: collapse;
		}
	</style>
</head>
<body onload="window.print()">

	<h1 align="center">Laporan Tiket</h1>
	<hr>

	<table border="1">
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
					</tr>
					<?php
					require_once('includes/init.php');
				$no=0;
				$str = "SELECT A.*,B.nama FROM tiket A LEFT JOIN user B ON A.user_id=B.id_user ";

				if (@$_GET['user_id']) {
					$str .= " WHERE A.user_id = $_GET[user_id]";
				}

				if (@$_GET['dari']) {
					$str .= " AND A.created_at >= '$_GET[dari]' AND A.created_at <= '$_GET[sampai]'";
				}
				
				$query = mysqli_query($koneksi,$str);

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
					</tr>
				<?php endwhile; ?>
	</table>

</body>
</html>