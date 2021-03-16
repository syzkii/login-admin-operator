<?php
	error_reporting(0);
	$conn = @mysql_connect("localhost","root","");
	@mysql_select_db("sppadminop", $conn);
	
	if ($_POST["simpan"]<>"")
	{
		$qry_insert = "insert into data_siswa (nama_siswa,alamat_siswa,no_hp_siswa,kelas) values('".$_POST["nama_siswa"]."','".$_POST["alamat_siswa"]."','".$_POST["no_hp_siswa"]."','".$_POST["kelas"]."')";
		$insert = @mysql_query($qry_insert, $conn) or die (mysql_error());

		header("Location: view_siswa.php"); 
	}
?>
<html lang="en">
 <head>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>
  <title>Tambah Data Siswa</title>
  <style>
		td 
		{
			padding: 10px;
		}

		body
		{
			color: #555555;
			font-size: 15px; 
			font-weight: normal;
			font-family:  Segoe UI;
		}
  </style>
 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">
  <table cellpadding='0' cellspacing='0' width='100%' align='center'>
		<td>
			<h5>SISWA</h5>
			<br>
			<table border="0" cellpadding='5' class='table table-bordered'>
			<form method="POST" action="add_siswa.php" >
			<tr>
				<td width='50%'>
					<strong>Nama Siswa : </strong><input type="text" class="form-control" name="nama_siswa">
				</td>
			</tr>
			<tr>
				<td width='50%'>
					<strong>Alamat Siswa : </strong>
					<br><input type="text" class="form-control mb-3" name="alamat_siswa">
                </td>

			</tr>
			<tr>
				<td width='50%'>
					<strong>NO HP Siswa : </strong><input type="text" class="form-control mb-3" name="no_hp_siswa">
				</td>
			</tr>
			<tr>
				<td width='50%'>
					<strong>Kelas : </strong>
                    <br>
                    <input type="radio" name="kelas" value='10'>10
					<br>
					<input type="radio" name="kelas" value='11'>11	
					<br>
					<input type="radio" name="kelas" value='12'>12
				</td>
			</tr>
			<tr>
				<td width='50%'>
					<input type="submit" value="simpan" name="simpan" class="btn btn-success"><i class="fa fa-save"></i>
					<form>
					<input type="button" class="btn btn-danger fa fa-trash-o" value="Kembali" onclick="window.location.href='view_siswa.php'" />
					</form>
				</td>
			</tr>
			</form>
			</table>
		</td>
	</tr>
  </table>
 </body>
</html>