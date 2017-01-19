<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#informasi").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>

<!-- memakai tiny note -->
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	skin : "o2k7",
	//skin_variant:"red",
	plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
	theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
content_css : "scripts/tiny_mce/tiny.css"
});
</script>

<?php 
	include "koneksi.php";
	//session_start();
	$pro="simpan";
	$YPATH="infoimages";
	$gambar0="default.jpg";
	if(!$_SESSION["1CLEVEL"]==""){

?>


<?php

  $sql="select * from tbl_informasi order by f_kodeinfo desc";
  $q=mysql_query($sql);
  $jum=mysql_num_rows($q);
  $kd="B".date("y").date("m");
		if($jum > 0){
			$d=mysql_fetch_array($q);
			$kodeinfo=$d["f_kodeinfo"];
			$urut=substr($kodeinfo,5,4)+1;
				if($urut<10){$kodeinfo="$kd"."00".$urut;}
				else if($urut<100){$kodeinfo="$kd"."0".$urut;}
				else{$kodeinfo="$kd".$urut;}
			}
		else{$kodeinfo="$kd"."001";}
?>


<?php
if($_GET["pro"]=="ubah"){
	$kodeinfo=$_GET["id"];
	$s="select * from tbl_informasi where f_kodeinfo='$kodeinfo'";
	$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$kodeinfo=$d["f_kodeinfo"];
				$jenisinfo=$d["f_jenisinfo"];
				$keyinfo=$d["f_keyinfo"];
				$judulinfo=$d["f_judulinfo"];
				$infosingkat=$d["f_infosingkat"];
				$infolengkap=$d["f_infolengkap"];
				
				$gambar0=$d["f_images"];
				$gambar=$d["f_images"];
				$pro="ubah";		
}
?>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #FF0000}
.style3 {color: #FFFFFF}
-->
</style>

<h2>DATA INFORMASI DAN BERITA </h2>

<form id="informasi" action="" method="post" enctype="multipart/form-data">
  <strong><a href='#' onclick='buka(&quot;berita/zoom.php?id=<?php echo $kodeinfo;?>&quot;)'></a></strong>
  <table width="794">
    
    <tr>
      <td width="85" rowspan="7" align="center" valign="middle"><strong><a href='#' onclick='buka(&quot;berita/zoom.php?id=<?php echo $kodeinfo;?>&quot;)'><img src="<?php echo "$YPATH/$gambar0";?>" width="80" height="80" /></a></strong></td>
      <td width="122" align="right" valign="top"><div align="right" class="style1">
        <div align="left">Kode Informasi</div>
      </div></td>
      <td width="571" valign="top">:
      <input name="kodeinfo" type="text" value="<?php echo $kodeinfo;?>" size="10" readonly="true" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style1">
        <div align="left">Jenis Informasi</div>
      </div></td>
      <td>:
        <select name="jenisinfo" class="required" title="harus diisi">
          <option value="<?php echo $jenisinfo; ?>"><?php echo $jenisinfo; ?></option>
          <option value="UNKATEGORI">- Pilih -</option>
          <option value="NEWS">NEWS</option>
          <option value="INFO">INFO</option>
          <option value="KEGIATAN">KEGIATAN</option>
          <option value="PROFILE">PROFILE</option>
        </select>
        
      </span></td>
    </tr>
    <tr>
      <td><div align="right" class="style1">
        <div align="left">Key Informasi</div>
      </div></td>
      <td class="style1">
        
        :
        <input type="text" name="keyinfo" value="<?php echo $keyinfo; ?>" class="required" title="harus diisi" />
        
        *jangan ada <span class="style2">SPASI</span> (contoh: PSB atau JADWAL) </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">
        <div align="left">Judul Informasi</div>
      </div></td>
      <td class="style1">
        
        :
        <input name="judulinfo" type="text" value="<?php echo $judulinfo;?>" size="40" maxlength="30" class="required" title="harus diisi" />
        
        *max 20 char  </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">
        <div align="left">Informasi Singkat</div>
      </div></td>
      <td class="style1">
        
		:
		<input name="infosingkat" type="text" value="<?php echo $infosingkat;?>" size="75" maxlength="160" class="required" title="harus diisi" />
        
        *max 160 char (diisi hanya untuk jenis informasi INFO, jika bukan cukup dengan sembarang inputan, seperti b atau 2) </td>
    </tr>
    <tr>
      <td height="24" align="right" valign="top"><div align="right" class="style1">
        <div align="left">Foto/Gambar</div>
      </div></td>
      <td valign="top">:
        <input type="file" name="gambar" id="gambar" />      </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">
        <div align="left">Informasi Lengkap</div>
      </div></td>
      <td valign="top"><span class="style1">
        
        <textarea name="infolengkap" class="required" title="harus diisi"><?php echo $infolengkap;?></textarea>
      </span></td>
    </tr>
    
    <tr>
      <td height="26" colspan="3" align="center" valign="top"><input name="Simpan" type="submit" id="Simpan" onclick="return confirm('Simpan Data')" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="kodeinfo" type="hidden" id="kodeinfo" value="<?php echo $kodeinfo;?>" />
        <a href="?mnu=finformasi">
        <input name="Batal" type="button" id="Batal" value="Batal" />
      </a></td>
    </tr>
  </table>
</form>

<table width="100%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="2%" bgcolor="#333333"><span class="style3">
      No.</span></th>
    <th width="6%" bgcolor="#333333"><span class="style3">
      Kode</span></th>
    <th width="9%" bgcolor="#333333"><span class="style3">
      Jenis.Informasi</span></th>
    <th width="22%" bgcolor="#333333"><span class="style3">Tanggal</span></th>
    <th width="18%" bgcolor="#333333"><span class="style3">
      Key Info</span></th>
    <th width="32%" bgcolor="#333333"><span class="style3">
      Judul Informasi</span></th>
    <th width="11%" bgcolor="#333333"><span class="style3">
      menu</span></th>
  </tr>
<?php  

	if(isset($_POST["cari"])){
		//$item=$_POST["txtcari"];
		if($_POST["cariberdasarkan"]=="$jenisinfo"){$perintah="select * from tbl_informasi where f_jenisinfo like '%$jenisinfo2%'  order by f_judulinfo asc ";}
		else{$perintah="select * from tbl_informasi order by f_judulinfo asc";}
}

//		yg diatas masih aneh

  $s="select * from tbl_informasi order by f_jenisinfo desc";
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
				$kodeinfo=$d["f_kodeinfo"];
				$jenisinfo=$d["f_jenisinfo"];
				$keyinfo=$d["f_keyinfo"];
				$judulinfo=$d["f_judulinfo"];
				$infosingkat=$d["f_infosingkat"];
				$infolengkap=$d["f_infolengkap"];
				$gambar=$d["f_images"];
				$tglpost=$d["f_tglpost"];
						
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$no</td>
				<td>$kodeinfo</td>
				<td>$jenisinfo</td>
				<td>$tglpost</td>
				<td>$keyinfo</td>
				<td>$judulinfo</td>
				<td><div align='center'>
<a href='?mnu=finformasi&pro=ubah&id=$kodeinfo'>Ubah</a>
<a href='?mnu=finformasi&pro=hapus&id=$kodeinfo' onClick='return confirm(\"Anda Yakin\")'>Hapus</a></div></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
			<td>$no</td>
				<td>$kodeinfo</td>
				<td>$jenisinfo</td>
				<td>$tglpost</td>
				<td>$keyinfo</td>
				<td>$judulinfo</td>
				<td><div align='center'>
<a href='?mnu=finformasi&pro=ubah&id=$kodeinfo'>Ubah</a>
<a href='?mnu=finformasi&pro=hapus&id=$kodeinfo' onClick='return confirm(\"Anda Yakin\")'>Hapus</a></div></td>
				</tr>";
				}
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><center>MAAF, DATA BELUM TERSEDIA</center></td></tr>";}
?>
</table>

<?php 
//Langkah 3: Hitung total data dan page 
$tampil2 = mysql_query("select * from tbl_informasi ");
$jmldata = mysql_num_rows($tampil2);
if($jmldata>0){
$jmlhal  = ceil($jmldata/$batas);
echo "<center>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=finformasi'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=finformasi'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=finformasi'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</center>";
	}//if jmldata
}//if Administrator
else{
$tampil2 = mysql_query("select * from tbl_informasi ");
$jmldata = mysql_num_rows($tampil2);
}
echo "<p align=center>Total <b>$jmldata</b> Data</p>";
?>


<?php	//	MENYIMPAN DAN MERUBAH DATA
	if(isset($_POST["Simpan"])){
	$statusadabadwords = "none";
	$badWords = array("sex","xxx","viagra","anjing","porn");// daftar bad words 
		$kodeinfo=strip_tags($_POST["kodeinfo"]);
		$jenisinfo=strip_tags($_POST["jenisinfo"]);
		$keyinfo=strip_tags($_POST["keyinfo"]);
		$judulinfo=strip_tags($_POST["judulinfo"]);
		$infosingkat=strip_tags($_POST["infosingkat"]);
		$infolengkap=$_POST["infolengkap"];
		$infotext=strip_tags($_POST["infolengkap"]);
		
		$gambar0=strip_tags($_POST["gambar0"]);
		$pro=strip_tags($_POST["pro"]);
	
		if($_FILES["gambar"] != ""){
			@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
			$gambar=$_FILES["gambar"]["name"];
		} 
		else{
			$gambar=$gambar0;
		}
		if(strlen($gambar)<1){
			$gambar=$gambar0;
		}
		
		for($i = 0; $i <= count($badWords)-1; $i++){
			if (!(strpos($isi, $badWords[$i]) == false)){
				$statusadabadwords = "ada";break;
			}
		}
		
		//session
		$kodeloginna=$_SESSION["KODELOG"];
	
		if($statusadabadwords == "none"){
			if($pro=="simpan"){
				$sql="insert into tbl_informasi(f_kodeinfo, f_jenisinfo, f_keyinfo, f_judulinfo, f_infosingkat, f_infolengkap, f_infotext, f_images, f_tglpost, f_kodeuser) values('$kodeinfo', '$jenisinfo', '$keyinfo', '$judulinfo', '$infosingkat', '$infolengkap', '$infotext', '$gambar', sysdate(), '$kodeloginna' )";
			$simpan=mysql_query($sql);
			if($simpan){
				echo "<script>alert('DATA BERHASIL DISIMPAN');document.location.href='?mnu=finformasi';</script>";
			}
			else{
				echo"<script>alert('DATA GAGAL DISIMPAN');document.location.href='?mnu=finformasi';</script>";
			}
		}
		else{
			$sql="update tbl_informasi set f_jenisinfo='$jenisinfo', f_keyinfo='$keyinfo', f_judulinfo='$judulinfo', f_infosingkat='$infosingkat', f_infolengkap='$infolengkap', f_infotext='$infotext', f_images='$gambar', f_tglpost=sysdate(), f_kodeuser='$kodeloginna' where f_kodeinfo='$kodeinfo' ";
			$ubah=mysql_query($sql);
				if($ubah){
					echo "<script>alert('DATA BERHASIL DIUBAH');document.location.href='?mnu=finformasi';</script>";
				}
				else{
					echo"<script>alert('DATA GAGAL DIUBAH');document.location.href='?mnu=finformasi';</script>";
				}
			}
		}//statusadabadwords
		else{
			echo "<script>alert('Maaf data Anda mengandung kata-kata yang tidak sopan');document.location.href='?mnu=finformasi';</script>";
		}
	}
?>


<?php	//	menghapus data
	if($_GET["pro"]=="hapus"){
		$kodeinfo=$_GET["id"];
		$s="delete from tbl_informasi where f_kodeinfo='$kodeinfo' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('DATA BERHASIL DIHAPUS');document.location.href='?mnu=finformasi';</script>";
		}
		else{
			echo"<script>alert('DATA GAGAL DIHAPUS');document.location.href='?mnu=finformasi';</script>";
		}
	}
?>
