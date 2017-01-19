<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#jurusan").validate({
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
.style2 {color: #FFFFFF}
-->
</style>
<?php 
	include "koneksi.php";
//	session_start();
	$pro="simpan";
		if(!$_SESSION["1CLEVEL"]==""){

?>


<?php
if($_GET["pro"]=="ubah"){
	$jurusanid=$_GET["id"];
	$s="select * from tbl_jurusan where f_jurusanid='$jurusanid'";
	$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$jurusanid=$d["f_jurusanid"];
				$jurusanid0=$d["f_jurusanid"];
				$jurusan=$d["f_jurusan"];
				$keterangan=$d["f_keterangan"];
				
				$pro="ubah";		
}
?>

<h2>DATA JURUSAN</h2>
<form id="jurusan" action="" method="post" enctype="multipart/form-data">
  <table width="523">
    
    <tr>
      <td width="186" align="right" valign="top"><div align="right" class="style1">ID Jurusan:</div></td>
      <td width="325" valign="top"><input name="jurusanid" type="text" value="<?php echo $jurusanid;?>" size="10" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Jurusan: </div></td>
      <td>        
        <input name="jurusan" type="text" value="<?php echo $jurusan; ?>" size="40" class="required" title="harus diisi" />
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Keterangan: </div></td>
      <td>
        <textarea name="keterangan" cols="35" class="required" title="harus diisi"><?php echo $keterangan;?></textarea>
     </td>
    </tr>
    <tr>
      <td height="28" colspan="2" align="center" valign="top"><input name="Simpan" type="submit" id="Simpan" onclick="return confirm('Simpan')" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="jurusanid0" type="hidden" id="jurusanid0" value="<?php echo $jurusanid0;?>" />
        <a href="?mnu=fjurusan">
        <input name="Batal" type="button" id="Batal" value="Batal" />
        </a></td>
    </tr>
  </table>
</form>

<table width="100%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="3%" bgcolor="#333333"><span class="style2">
      No.</span></th>
    <th width="8%" bgcolor="#333333"><span class="style2">
      IDJ </span></th>
    <th width="24%" bgcolor="#333333"><span class="style2">
      Nama Jurusan </span></th>
    <th width="49%" bgcolor="#333333"><span class="style2">Keterangan</span></th>
    <th width="16%" bgcolor="#333333"><span class="style2">
      menu</span></th>
  </tr>
<?php 
  $s="select * from tbl_jurusan where f_jurusanid != 0 order by f_jurusanid desc";
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
				$jurusanid=$d["f_jurusanid"];
				$jurusan=$d["f_jurusan"];
				$keterangan=$d["f_keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$no</td>
				<td>$jurusanid</td>
				<td>$jurusan</td>
				<td>$keterangan</td>
				<td><div align='center'>
<a href='?mnu=fjurusan&pro=ubah&id=$jurusanid'>Ubah</a>
<a href='?mnu=fjurusan&pro=hapus&id=$jurusanid' onClick='return confirm(\"Anda Yakin\")'>Hapus</a></div></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
				<td>$no</td>
				<td>$jurusanid</td>
				<td>$jurusan</td>
				<td>$keterangan</td>
				<td><div align='center'>
<a href='?mnu=fjurusan&pro=ubah&id=$jurusanid'>Ubah</a>
<a href='?mnu=fjurusan&pro=hapus&id=$jurusanid' onClick='return confirm(\"APAKAH ANDA YAKIN UNTUK MENGHAPUS DATA INI?..\")'>Hapus</a></div></td>
				</tr>";
				}
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>DATA JURUSAN BELUM TERSEDIA</center></td></tr>";}
?>
</table>

<?php 
//Langkah 3: Hitung total data dan page 
$tampil2 = mysql_query("select * from tbl_jurusan where f_jurusanid != 0 ");
$jmldata = mysql_num_rows($tampil2);
if($jmldata>0){
$jmlhal  = ceil($jmldata/$batas);
echo "<center>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=fjurusan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=fjurusan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=fjurusan'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</center>";
	}//if jmldata
}//if Administrator
else{
$tampil2 = mysql_query("select * from tbl_jurusan ");
$jmldata = mysql_num_rows($tampil2);
}
echo "<p align=center>Total <b>$jmldata</b> Data</p>";
?>


<?php	//	MENYIMPAN DAN MERUBAH DATA
	if(isset($_POST["Simpan"])){
	$statusadabadwords = "none";
	$badWords = array("sex","xxx","viagra","anjing","porn");// daftar bad words 
		$jurusanid=strip_tags($_POST["jurusanid"]);
		$jurusanid0=strip_tags($_POST["jurusanid0"]);
		$jurusan=strip_tags($_POST["jurusan"]);
		$keterangan=strip_tags($_POST["keterangan"]);
		
		for($i = 0; $i <= count($badWords)-1; $i++){
			if (!(strpos($isi, $badWords[$i]) == false)){
				$statusadabadwords = "ada";break;
			}
		}
	
		if($statusadabadwords == "none"){
			if($pro=="simpan"){
				$sql="insert into tbl_jurusan(f_jurusanid, f_jurusan, f_keterangan) values('$jurusanid', '$jurusan', '$keterangan')";
			$simpan=mysql_query($sql);
			if($simpan){
				echo "<script>alert('DATA BERHASIL DISIMPAN');document.location.href='?mnu=fjurusan';</script>";
			}
			else{
				echo"<script>alert('DATA GAGAL DISIMPAN');document.location.href='#';</script>";
			}
		}
		else{
			$sql="update tbl_jurusan set f_jurusan='$jurusan', f_keterangan='$keterangan' where f_jurusanid='$jurusanid0' ";
			$ubah=mysql_query($sql);
				if($ubah){
					echo "<script>alert('DATA BERHASIL DIUBAH');document.location.href='?mnu=fjurusan';</script>";
				}
				else{
					echo"<script>alert('DATA GAGAL DIUBAH');document.location.href='?mnu=fjurusan';</script>";
				}
			}
		}//statusadabadwords
		else{
			echo "<script>alert('Maaf data Anda mengandung kata-kata yang tidak sopan');document.location.href='?mnu=fjurusan';</script>";
		}
	}
?>


<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$jurusanid=$_GET["id"];
		$s="delete from tbl_jurusan where f_jurusanid='$jurusanid' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('DATA BERHASIL DIHAPUS');document.location.href='?mnu=fjurusan';</script>";
		}
		else{
			echo"<script>alert('DATA GAGAL DIHAPUS');document.location.href='?mnu=fjurusan';</script>";
		}
	}
?>
