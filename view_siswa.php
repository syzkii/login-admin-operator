<?
	error_reporting(0);
	session_start();

	if($_SESSION["hak_akses"]=="")
	{
		header("location: login.php");
	}

	//KONEKSI PHP MYSQL
	$database="sppadminop";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);

	if ($_POST["simpan"])
	{
		//SIMPAN DATA
		$nama_siswa=$_POST["nama_siswa"];
		$alamat_siswa=$_POST["alamat_siswa"];
		$no_hp_siswa=$_POST["no_hp_siswa"];
		$kelas=$_POST["kelas"];

		$q_simpan="insert into data_siswa (nama_siswa,alamat_siswa,no_hp_siswa,kelas) values ('".$nama_siswa."','".$alamat_siswa."','".$no_hp_siswa."','".$kelas."')";
		$sql_simpan = mysql_query($q_simpan, $conn);
	}
?>
<!doctype html>
<html lang="en">
 <head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>SPP</title>
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

		.btn-kere {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-left: 100px;
			position: absolute;
			left: 560px;
			top: 30px;
		}

		.btn-kere2 {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: -1px;
			top: 30px;
		}

		.btn-kere3 {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: 720px;
			top: 30px;
		}

		.btn-kere4 {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 15px;
			border-radius: 2rem;
			float: right;
			margin-right: 40px;
			position: absolute;
			right: 180px;
			top: 30px;
		}


		.btn-kanan {
			font-size: 15px;
			letter-spacing: 1px;
			padding: 10px -10px 10px;
			border-radius: 2rem;
			float: right;
			margin-right: 20px;
			position: absolute;
			right: 390px;
			top: 153px;
		}
  </style>
 </head>
 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">
  <table cellpadding='0' cellspacing='0' width='80%' align='center'>
	<tr>
		<td width='100%'>
			<br><br>
			<table width='100%'>
			<form method='post' action='view_siswa.php'>
			<tr>
				<td>Cari Data
				<br><br>
				<input type="text" class="form-control mb-3" name="keyword" size="50" placeholder=" Cari data.."  title="cari data.."></td>
				<br>
				<input type="submit" name="cari" class='btn btn-primary btn-kanan' value="Search" title="cari"></td>
				<td >
				<?php

				$sql = " select * from data_siswa ";
				$qry = mysql_query($sql);
		
				?>
				</td>
				<td width='50%' align='left'>
					<a href="logout.php" class="btn btn-lg btn-danger btn-kere3 text-uppercase font-weight-bold mb-2">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></a>
					<a href='add_siswa.php' class='btn btn-primary btn-kere2'><i class="fa fa-address-book"> Tambah Data Siswa</i></a>
					<?
						if($_SESSION["hak_akses"]=="admin")
						{
					?>
					<a href='user.php' class="btn btn-primary btn-kere4"><i class="fa fa-address-book"> User Admin</a></i>
					<?
						}
					?>
				</td>
			</tr>

			</form>
			</table>
			<br>
			<TABLE width='100%' cellspacing='0' cellpadding='5' border='0' class='table table-striped table-dark'>
				<thead>
				<TR>
					<th><center>NO Induk</th>
					<th><center>Nama Siswa</th>
					<th><center>Alamat Siswa</th>
					<th><center>NO HP Siswa</th>
					<th><center>Kelas</th>
					<th><center>Action</th>
				</TR>
				</thead>
				<?php
			if($_POST["cari"])
			{
				$sql_cari = "where (no_induk like '%".$_POST["keyword"]."%' or nama_siswa like '%".$_POST["keyword"]."%' or alamat_siswa like '%".$_POST["keyword"]."%' or no_hp_siswa like '%".$_POST["keyword"]."%' or kelas like '%".$_POST["keyword"]."%') ";
			}
			$result = mysql_query("SELECT * FROM data_siswa");

			$show = " select * from data_siswa ".$sql_cari." ORDER BY no_induk ";
			$query = mysql_query($show, $conn);
			
			while ($data = mysql_fetch_assoc($query))
					{
				?>
				<TR>
					<TD align='center'><?php echo $data["no_induk"];?></TD>
					<TD align='center'><?php echo $data["nama_siswa"];?></TD>
					<TD align='center'><?php echo $data["alamat_siswa"];?></TD>
					<TD align='center'><?php echo $data["no_hp_siswa"];?></TD>
					<TD align='center'><?php echo $data["kelas"];?></TD>
					<TD><center>
						<a href='edit_siswa.php?no_induk=<?php echo $data["no_induk"]; ?>' class="btn btn-warning"><i class="fa fa-edit">Edit</a></i>
						<a href='delete_siswa.php?no_induk=<?php echo $data["no_induk"]; ?>' class="btn btn-danger"><i class="fa fa-eraser">Delete</a></i>
					</TD>
				</TR>				
				<?php
					}
				?>
		</td>
	</tr>
  </table>
  <div class="footer">
  	<div class="text-center mt-5">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0);">
     2021 All Rights Reserved By
    <a href="#">RifkiArdian </p></a>
  </div>
</div>
</footer>
 </body>
</html>
