<?
	error_reporting(0);
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

		$q_simpan="update data_siswa set nama_siswa='".$nama_siswa."',alamat_siswa='".$alamat_siswa."', no_hp_siswa='".$no_hp_siswa."', kelas='".$kelas."' where no_induk='".$_GET["no_induk"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: view_siswa.php");
	}

	$show="select * from data_siswa where no_induk='".$_GET["no_induk"]."'";
	$query=mysql_query($show,$conn);
	$data=mysql_fetch_array($query);
?>
<!doctype html>
<html lang="en">
 <head>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <style>
	  .btn-kembali {
    font-size: 15px;
    letter-spacing: 1px;
    padding: 10px -10px 10px;
    border-radius: 2rem;
    float: right;
    margin-right: 20px;
    position: absolute;
    right: 1px;
 }
 </style>
 </head>
 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-10 col-xl-9 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">

<a href="view_siswa.php" class="btn btn-lg btn-danger btn-kembali text-uppercase font-weight-bolder">Kembali</a>
 <form method="post" action="edit_siswa.php?no_induk=<?php echo $data["no_induk"];?>">
  <table>
			<tr>
				<td width='100%'>
					Nama Siswa : <input type="text" class="form-control mb-3" name="nama_siswa"  value='<? echo $data["nama_siswa"];?>'>
				</td>
			</tr>
			<tr>
				<td width='100%'>
					Alamat Siswa : <input type="text" class="form-control mb-3" name="alamat_siswa"  value='<? echo $data["alamat_siswa"];?>'>
					
				</td>
			</tr>
			<tr>
				<td width='100%' >
					NO HP Siswa : <input type="text" class="form-control mb-3" name="no_hp_siswa" value='<? echo $data["no_hp_siswa"];?>'>
				</td>
			</tr>
			<tr>
				<td width='100%'>
					Kelas : 
                    <br>
					<input type="radio" name="kelas" value="10" <?php if($data['kelas']=='10') echo 'checked'?>>10
					<br>
					<input type="radio" name="kelas" value="11" <?php if($data['kelas']=='11') echo 'checked'?>>11
					<br>
					<input type="radio" name="kelas" value="12" <?php if($data
					['kelas']=='12') echo 'checked'?>>12				
				</td>
			</tr> 
<tr>
	<td colspan='3'>
		<input type="submit" name='simpan' value='simpan' class="btn btn-success"><i class="fa fa-save"></i></td>
  </tr>
  </table>	
 </form>
 </body>
</html>

