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

	$q_hapus="delete from userkiki where id='".$_GET["id"]."'";
	$sql_hapus = mysql_query($q_hapus, $conn);

	header("location: user.php");
?>
