<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
?><style type="text/css">
<!--
body {
	margin-top: 100px;
	background-color: ;
}
body,td,th {
	color: #CCCCCC;
}
.style9 {color: #333333; font-weight: bold; }
-->
</style>
<title>Login Administrator</title>
<link href="images/favicon.ico" rel="shortcut icon" />  
<form action="" method="post">
                
<table width="270" align="center" bgcolor="#FFFFFF" bordercolor="#FFCC33">
<tr>
              <td height="26" colspan="2"><div align="center" class="style9">Login Admin</div></td>
            </tr>
            <tr>
              <td width="72" ><span class="style9">Pengguna</span></td>
              <td width="201"><input name="txtuser" type="text" id="txtuser" size="20" /></td>
            </tr>
            <tr>
               <td><span class="style9">KataSandi</span></td>
               <td><input name="txtpass" type="password" id="txtpass" size="20" /></td>
            </tr>
            <tr>
               <td height="26"></td>
               <td valign="top"><input name="Login" type="submit" id="Login" value="Masuk" />
               <a href="index.php"><input name="reset" type="reset" value="Batal" /></a></td>
            </tr>
            
</table>

</form>
</div>


<?php	//	LOGIN SYSTEM
	require_once"koneksi.php";	
	if(isset($_POST["Login"])){
		$username=$_POST["txtuser"];
		$password=md5($_POST[txtpass]);
		$sql="select * from `tbl_user` where f_username='$username' and f_password='$password'";
		$hasil=mysql_query($sql);
		$ada=mysql_num_rows($hasil);
		$data=mysql_fetch_array($hasil);
		$username=$data["f_username"];
		$ckode=$data["f_kodeuser"];
		$nm=$data["f_namalengkap"];
		$tingkat=$data["f_hakakses"];
		if($ada >0){
			$_SESSION["1KODELOG"]=$ckode;
			$_SESSION["1CNAMA"]=$nm;
			$_SESSION["1CLEVEL"]=$tingkat;
			$_SESSION["1ULOGIN"]=$username;
	
			echo "<script>alert('$nm, Login Berhasil');document.location.href='administrator.php';</script>";
		}
		else{
			session_destroy();
			echo "<script>alert('Login Gagal');document.location.href='login.php';</script>";
		}
	
	}

?>