<?
	error_reporting(0);
	session_start();

	if($_SESSION["hak_akses"]<>"admin")
	{
		header("location: login.php");
	}

	//KONEKSI PHP MYSQL
	$database="spp";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);
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
  <title>SPP</title>
 </head>
 <body>
 <div class="container">
 <div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">

   <a href='user_add.php' class="btn btn-primary ml-4">tambah data</a> <a href='view_siswa.php' class="btn btn-primary ml-3">SPP</a> <a href='logout.php' class="btn btn-danger ml-3">Logout</a>
   <br>
   <br>
  <form method="post" action="user.php">
	<table>
	<tr>
		<td>Cari Data</td>
		<td><input type="text" class='form-control' name="keyword" size='30' value='<?php echo $_POST["keyword"]; ?>'></td>
		<td><input type="submit" name='cari' class="btn btn-info" value='Cari'></td>
	</tr>
	</table>
</form>
<br>
 <table width="100%" border='0' width="80" cellpadding='0' cellspacing='0' class="table table-bordered">
	<thead class="thead-dark">
 <tr>
	<th><center>NO</th>
	<th> <center>USERNAME</th>
	<th> <center>PASSWORD</th>
	<th> <center>HAK AKSES</th>
	<th> <center>ACTION</th>
 </tr>
	</thead>
 <?php
 	if ($_POST["cari"])
	{
		$sql_cari=" where (username like '%".$_POST["keyword"]."%')";
	}
	$show="select * from userkiki ".$sql_cari."";
	$query=mysql_query($show,$conn);
	while($data=mysql_fetch_array($query))
	{
		$no++;
  ?>
  <tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $data["username"]; ?></td>
	<td><?php echo $data["password"]; ?></td>
	<td><?php echo $data["hak_akses"]; ?></td>
	<td align="center"><a href='user_edit.php?id=<?php echo $data["id"]; ?>' class="btn btn-warning">Edit</a> <a href='user_hapus.php?id=<?php echo $data["id"]; ?>' class="btn btn-primary">Hapus</a></td>
  </tr>
  <?php
	}
  ?>
 </table>
</div>
</div>
</div>
 </div>
 </div>
 </form>
 </body>
</html>
