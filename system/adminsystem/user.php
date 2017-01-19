<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#user").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<?php 
	include "koneksi.php";
	//session_start();
	$pro="simpan";
?>

<?php
  $sql="select * from tbl_user order by f_kodeuser desc ";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $kd="U".date("y").date("m");
		if($jum > 0){
			$d=mysql_fetch_array($q);
			$kode=$d["f_kodeuser"];
			$urut=substr($kode,5,4)+1;
				if($urut<10){$kode="$kd"."00".$urut;}
				else if($urut<100){$kode="$kd"."0".$urut;}
				else{$kode="$kd".$urut;}
			}
		else{$kode="$kd"."001";}
?>

<?php
if($_GET["pro"]=="ubah"){
	$kode=$_GET["id"];
	$s="select * from `tbl_user` where `f_kodeuser`='$kode'";
	$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$kode=$d["f_kodeuser"];
				$username=$d["f_username"];
				$namalengkap=$d["f_namalengkap"];
				$status=$d["f_hakakses"];
				//$password=$d["f_password"];
			
				$pro="ubah";		
}
$password="";
?>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #FFFFFF}
-->
</style>

<?php  if ($_SESSION["1CLEVEL"]=="admin"){ ?>

  <h2>DATA PENGGUNA </h2>

  <form id="user" action="" method="post" enctype="multipart/form-data" >
<table width="493" height="160" border="0">
  
  <tr>
    <td width="187" height="24" align="right" valign="top"><span class="style1">Kode:  
    </span>
    <td width="296" align="left" valign="top"><input name="kode" type="text" readonly="true" id="kode" value="<?php echo $kode;?>" size="10" class="required" title="harus diisi" />  </tr>
  <tr>
    <td height="24" align="right" valign="top"><span class="style1">Username:</span>
    <td align="left" valign="top">
	
	<input name="username" type="text" id="username" value="<?php echo $username;?>" size="45" class="required" title="harus diisi" />	</tr>
  
  <tr>
    <td align="right" valign="top"><span class="style1">NamaLengkap:  
    </span>
    <td height="24" align="left" valign="top">
	<input name="namalengkap" type="text" id="namalengkap" value="<?php echo $namalengkap;?>" size="45" class="required" title="harus diisi" />    </tr>
  <tr>
    <td align="right" valign="top"><span class="style1">Status:  
    </span>
    <td height="24" align="left" valign="top">
	<input name="status" type="radio" value="admin" class="required" title="harus diisi" />Admin
        <input name="status" type="radio" value="user" />User  </td>
  </tr>
  <tr>
    <td align="right" valign="top"><span class="style1">Password: </span> </td>
    <td height="24" align="left" valign="top"><input name="password" id="password" type="password" value="<?php echo $namalengkap;?>" size="45" class="required" title="harus diisi" />    </td>
  </tr>
  <tr>
    <td align="right" valign="top">  
    <td height="26" align="left" valign="top"><input name="Simpan" type="submit" id="Simpan" onclick="return confirm('Simpan Data')" value="Simpan" />
      <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
      <input name="kode2" type="hidden" id="kode2" value="<?php echo $kode;?>" />
      <a href="?mnu=user">
      <input name="Batal" type="button" id="Batal" value="Batal" />
      </a>     </tr>
</table>
</form>


<div class="page">
<table width="96%" border="1" align="center" cellpadding="0" cellspacing="0"  bgcolor="" summary="Summary Here">
  <tr  bgcolor="#333333" align="center" valign="middle">
    <th width="3%" bgcolor="#333333"><span class="style2">No.</span></th>
    <th width="9%" bgcolor="#333333"><span class="style2">Kode</span></th>
    <th width="17%" bgcolor="#333333"><span class="style2">Username</span></th>
	<th width="15%" bgcolor="#333333"><span class="style2">Hakakses</span></th>
    <th width="43%" bgcolor="#333333"><span class="style2">Nama Lengkap</span></th>
    <th width="13%" bgcolor="#333333"><span class="style2">Menu</span></th>
  </tr>
<?php  
  $s="select * from `tbl_user` order by `f_kodeuser` desc";
  $q=mysql_query($s);
  $jum=mysql_num_rows($q);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
			$batas   = 10;
			$page = $_GET['page'];
			if(empty($page)){$posawal  = 0;$page = 1;}
			else{$posawal = ($page-1) * $batas;}

			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
			while($d=mysql_fetch_array($q2)){							
				$kode=$d["f_kodeuser"];
				$username=$d["f_username"];
				$namalengkap=$d["f_namalengkap"];
				$status=$d["f_hakakses"];
						
				if($no %2==1){
				echo"<tr bgcolor='#99FF33'>
					<td>$no</td>
					<td>$kode</td>
					<td>$username</td>
					<td>$status</td>
					<td>$namalengkap</td>
					<td><center><a href='?mnu=user&pro=hapus&id=$kode' alt='hapus' onClick='return confirm(\"Anda Yakin\")' title='Hapus Data'><img class='' src='images/stop.png' /></a></center></td>
				</tr>";  
				}//no==1
				else if($no %2==0){
					echo"<tr bgcolor='#FFFF99'>
					<td>$no</td>
					<td>$kode</td>
					<td>$username</td>
					<td>$status</td>
					<td>$namalengkap</td>
					<td><center><a href='?mnu=user&pro=hapus&id=$kode' alt='hapus' onClick='return confirm(\"Anda Yakin\")' title='Hapus Data'><img class='' src='images/stop.png' /></a></center></td>
				</tr>";
				}
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>DATA PENGGUNA BELUM TERSEDIA</center></td></tr>";}
}
?>
</table>



<?php 	//menyimpan dan merubah data
	if(isset($_POST["Simpan"])){
		$statusadabadwords = "none";
		$kode=$_POST["kode"];
		$username=$_POST["username"];
		$namalengkap=$_POST["namalengkap"];
		$status=$_POST["status"];
		$password=md5($_POST[password]);
		$pro=$_POST["pro"];	
	
		for($i = 0; $i <= count($badWords)-1; $i++){if (!(strpos($isi, $badWords[$i]) == false)){
			$statusadabadwords = "ada";break;
		}
	}

	if($statusadabadwords == "none"){
		if($pro=="simpan"){
			$sql="insert into tbl_user(`f_kodeuser` ,`f_username` ,`f_namalengkap` , `f_hakakses`, `f_password` ) values('$kode', '$username', '$namalengkap', '$status', '$password')";
			$simpan=mysql_query($sql);
			if($simpan){
				echo"<script>alert('DATA BERHASIL DISIMPAN');document.location.href='?mnu=user';</script>";
			}
			else{
				echo"<script>alert('DATA GAGAL DISIMPAN');document.location.href='?mnu=user';</script>";
			}
		}
		else{
			
			if(empty($_POST[password])){
				$sql="update `tbl_user` set `f_username`='$username' , `f_namalengkap`='$namalengkap' where `f_kodeuser`='$kode'";
				$ubah=mysql_query($sql);
				if($ubah){
					echo "<script>alert('DATA $username BERHASIL DISIMPAN');document.location.href='?mnu=user';</script>";
				}
				else{
					echo"<script>alert('DATA $username GAGAL DISIMPAN');document.location.href='?mnu=user';</script>";
				}
			}
			else{
				$sql="update `tbl_user` set `f_username`='$username' , `f_namalengkap`='$namalengkap', `f_password`='$password' where `f_kodeuser`='$kode'";
				$ubah=mysql_query($sql);
				if($ubah){
					echo"<script>alert('DATA BERHASIL DISIMPAN');document.location.href='?mnu=user';</script>";
				}
				else{
					echo"<script>alert('DATA GAGAL DISIMPAN');document.location.href='?mnu=user';</script>";
				}
			
			}
			
		}
	}//statusadabadwords
	else{
		echo "<script>alert('Maaf data Anda mengandung kata-kata tidak sopan');document.location.href='?mnu=user';</script>";}
	}
?>


<?php 	//menhapus data dari tabel
	if($_GET["pro"]=="hapus"){
		$kode=$_GET["id"];
		$s="delete from `tbl_user` where `f_kodeuser`='$kode'";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('DATA BERHASIL DIHAPUS');document.location.href='?mnu=user';</script>";
		}
		else{
			echo"<script>alert('DATA GAGAL DIHAPUS');document.location.href='?mnu=user';</script>";
		}
	}
?>
