<?php
require_once('koneksi.php');
if($_POST){
	try {
		$sql = "INSERT INTO tb_peg (id_kategori,tanggal,nama,isi,status) VALUES ('".$_POST['id_kategori']."','".$_POST['tanggal']."','".$_POST['nama']."','".$_POST['isi']."','".$_POST['status']."')";
		if(!$koneksi->query($sql)){
			echo $koneksi->error;
			die();
		}

	} catch (Exception $e) {
		echo $e;
		die();
	}
	  echo "<script>
	alert('Data berhasil di simpan');
	window.location.href='index.php?page=crud/index';
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<div class="form-group">
				<label>Kategori</label>
				<input type="text" value="" class="form-control" name="id_kategori">
			</div>
			<div class="form-group">
				<label>Tanggal</label>
				<input type="text" value="" class="form-control" name="tanggal">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Isi</label>
				<input type="text" value="" class="form-control" name="isi">
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" value="" class="form-control" name="status">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="create" value="Create">
		</form>
	</div>
</div>