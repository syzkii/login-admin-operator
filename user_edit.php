<?
	error_reporting(0);
	session_start();

	if($_SESSION["hak_akses"]<>"admin")
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
		$username=$_POST["username"];
		$password=$_POST["password"];
		$hak_akses=$_POST["hak_akses"];

		$q_simpan="update userkiki set username='".$username."',password='".$password."',hak_akses='".$hak_akses."' where id='".$_GET["id"]."'";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: user.php");
	}

	$show="select * from user where id='".$_GET["id"]."'";
	$query=mysql_query($show,$conn);
	$data=mysql_fetch_array($query);
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 </head>

 <body>
 <div class="container">
<form action="" method="post" class="form-group">
<div class="row">
<div class="col-lg-15 col-xl-10 mx-auto">
<div class="card card-signin flex-row my-5">
<div class="card-body">
 <form method="post" action="user_edit.php?id=<?php echo $data["id"];?>">
  <table>
  <tr>
	<td>Username</td>
	<td>:</td>
	<td><input type="text" class="form-control mb-2" name="username" size='30' value='<?php echo $data["username"];?>'></td>
  </tr>
  <tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="text" class="form-control mb-2" name="password" size='30' value='<?php echo $data["password"];?>'></td>
  </tr>
  <tr>
	<td>Hak Akses</td>
	<td>:</td>
	<td>
		<select class="form-control mb-2" name='hak_akses'>
			<option value=''>PILIH</option>
			<option value='admin' <?
			if($data["hak_akses"]=="admin"){ echo "selected"; }
			?>>Admin</option>
			<option value='operator'<?
			if($data["hak_akses"]=="operator"){ echo "selected"; }
			?>>Operator</option>
		</select>
	</td>
  </tr>
  <tr>
	<td colspan='3'><input type="submit" class="btn btn-success mt-4" name='simpan' value='Simpan'>
	<a href="user.php" class="btn btn-danger mt-4">Kembali</a></td>
  </tr>
  </table>	
 </form>
 </body>
</html>
