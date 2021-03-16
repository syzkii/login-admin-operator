<?
	error_reporting(0);
	session_start();

	//KONEKSI PHP MYSQL
	$database="sppadminop";
	$host="localhost";
	$username="root";
	$password="";

	$conn = mysql_connect ($host,$username,$password) or die ("koneksi gagal");
	mysql_select_db ($database, $conn);
	
	$username=$_POST["username"];
	$password=$_POST["password"];

	$q_user="select * from userkiki where username='".$username."' and password='".$password."'";
	$cek_user=mysql_query($q_user,$conn);
	$total_user=mysql_num_rows($cek_user);

	if($total_user>0)
	{
		$user=mysql_fetch_array($cek_user);

		$_SESSION["hak_akses"]=$user["hak_akses"];
		header("location: view_siswa.php");
	}
	else{
		header("location:login.php?pesan=Gagal! DATA TIDAK DITEMUKAN.");
	}
?>