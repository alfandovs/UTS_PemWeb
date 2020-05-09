<?php
require_once('koneksi.php');
if($_POST){

	$sql = "UPDATE tb_peg SET id_kategori='".$_POST['id_kategori']."', tanggal='".$_POST['tanggal']."', judul='".$_POST['nama']."', isi='".$_POST['isi']."', status='".$_POST['status']."' WHERE id=".$_POST['id'];

	if ($koneksi->query($sql) === TRUE) {
	    echo "<script>
	alert('Data berhasil di update');
	window.location.href='index.php?page=crud/index';
	</script>";
	} else {
	    echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
	
}else{
	$query = $koneksi->query("SELECT * FROM tb_peg WHERE id=".$_GET['id']);

	if($query->num_rows > 0){
		$data = mysqli_fetch_object($query);
	}else{
		echo "data tidak tersedia";
		die();
	}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<input type="hidden" name="id" value="<?= $data->id ?>">
			<div class="form-group">
				<label>Kategori</label>
				<input type="text" value="<?= $data->id_kategori ?>" class="form-control" name="id_kategori">
			</div>
			<div class="form-group">
				<label>Tanggal</label>
				<input type="text" value="<?= $data->tanggal ?>" class="form-control" name="tanggal">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="<?= $data->nama ?>" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Isi</label>
				<input type="text" value="<?= $data->isi ?>" class="form-control" name="isi">
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" value="<?= $data->status ?>" class="form-control" name="status">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
		</form>
	</div>
</div>
<?php
}
mysqli_close($koneksi);
?>