<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#userpassword").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #FF0000}
.style3 {color: #00CCFF}
-->
</style>
<?php 
	session_start();
	$kode1=$_SESSION["1KODELOG"];
	$sql="select * from  tbl_user where f_kodeuser='$kode1'";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
	$username1=$data["f_username"];
	$namalengkap1=$data["f_namalengkap"];
	$password1=$data["f_passwrod"];
	$status1=$data["f_hakakses"];
?> 	      
	
<h2>KATA SANDI </h2>
  	
<form id="userpassword" action="" method="post" enctype="multipart/form-data" >
<table width="493" height="134" border="0">
  
  <tr>
    <td width="187" height="24" align="right" valign="top"><span class="style1">Kode:  
    </span>
    <td width="296" align="left" valign="top"><input name="kode" type="text" readonly="true" id="kode" value="<?php echo $kode1 ;?>" size="10" /> </tr>
  <tr>
    <td height="24" align="right" valign="top"><span class="style1">Username:</span>
    <td align="left" valign="top">
	
	<input name="username" type="text" id="username" value="<?php echo $username1 ;?>" size="20" readonly="true" />	
	</tr>
  
  <tr>
    <td align="right" valign="top"><span class="style1">NamaLengkap:  
    </span>
    <td height="24" align="left" valign="top">
	<input name="namalengkap" type="text" id="namalengkap" value="<?php echo $namalengkap1 ;?>" size="45" class="required" title="harus diisi" />    </tr>
  <tr>
    <td align="right" valign="top"><span class="style1">Password: </span></td>
    <td height="24" align="left" valign="top"><input name="password" id="password" type="password" value="<?php echo $password1 ;?>" size="45" class="required" title="harus diisi" />
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">  
    <td height="26" align="left" valign="top">
		<input name="Ubah" type="submit" onclick="return confirm('Ubah Data')" value="Ubah" />
      <input name="kode2" type="hidden" id="kode2" value="<?php echo $kode1;?>" />
	  <a href="administrator.php"><input name="Batal" type="button" value="Batal" /></a>
	</tr>
</table>
</form>

<?php	//	MERUBAH PASSWORD 
	if(isset($_POST["Ubah"])){
		$kode=$_POST["kode"];
		$username=$_POST["username"];
		$namalengkap=$_POST["namalengkap"];
		$password=md5($_POST["password"]);
		
					$sql="update tbl_user set f_namalengkap='$namalengkap', f_password='$password' where f_kodeuser='$kode' ";
			$hasil=mysql_query($sql);
			if($hasil){
				echo "<script>alert('DATA BERHASIL DISIMPAN');document.location.href='administrator.php';</script>";
			}
			else{
				echo"<script>alert('DATA GAGAL DISIMPAN');document.location.href='administrator.php';</script>";
			}

	}  
?>