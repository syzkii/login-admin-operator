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

		$q_simpan="insert into userkiki (username,password,hak_akses) values ('".$username."','".$password."','".$hak_akses."')";
		$sql_simpan = mysql_query($q_simpan, $conn);

		header("location: user.php");
	}
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
 <form method="post" action="user_add.php">
  <table>
  <tr>
	<td>Username :</td>
	<td><input type="text" class="form-control" name="username" size='30'></td>
  </tr>
  <tr>
	<td>Password :</td>
	<td><input type="text" class="form-control" name="password" size='30'></td>
  </tr>
  <tr>
	<td>Hak Akses :</td>
	<td>
		<select class="form-control" name='hak_akses'>
			<option value=''>PILIH</option>
			<option value='admin'>Admin</option>
			<option value='operator'>Operator</option>
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
