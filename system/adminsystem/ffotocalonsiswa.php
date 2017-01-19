<?php 
	$FTSWA="fotocalonsiswa";	
	if(!$_SESSION["1CLEVEL"]==""){

?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<meta http-equiv="refresh" content="10">
<h2>DAFTAR REQUES FOTO CALON SISWA </h2>
	
<table width="70%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="3%" bgcolor="#333333"><span class="style1">No.</span></th>
    <th width="9%" bgcolor="#333333"><span class="style1">Pendaftaran</span></th>
    <th width="53%" bgcolor="#333333"><span class="style1">Nama Siswa </span></th>
    <th width="16%" bgcolor="#333333"><span class="style1">Nomor Hp</span></th>
    <th width="8%" bgcolor="#333333"><span class="style1">Foto</span></th>
    <th width="6%" bgcolor="#333333"><span class="style1">Setujui</span></th>
    <th width="5%" bgcolor="#333333"><span class="style1">Tolak</span></th>
  </tr>

<?php  
	#	mysql_connect("localhost","root","");
	#	mysql_select_db("db_psbnew");
	$s="select * from tbl_calonsiswa where f_stsfoto='T' order by f_nopendaftaran asc ";
	$q=mysql_query($s);
	$jum=mysql_num_rows($q);
		if($jum > 0){
			$batas   = 10;
			$page = $_GET['page'];
			if(empty($page)){
				$posawal  = 0;$page = 1;
			}
			else{
				$posawal = ($page-1) * $batas;
			}
			$s2 = $s." LIMIT $posawal,$batas";
			$q2  = mysql_query($s2);
			$no = $posawal+1;
			
			while($d=mysql_fetch_array($q2)){							
				$nopendafaran=$d["f_nopendaftaran"];
				$namalengkap=$d["f_namalengkap"];
				$nohp=$d["f_nohp"];
				$foto=$d["f_foto"];
				
				if($no %2==1){
					echo"<tr bgcolor='#99FF33'>
						<td>$no</td>
						<td>$nopendafaran</td>
						<td>$namalengkap</td>
						<td><center>$nohp</center></td>
						<td><center><a href='$FTSWA/$foto' class='link' title='$namalengkap' rel='prettyPhoto[gallery1]'><img src='$FTSWA/$foto' width='70' height='70' /></a></center></td>
						<td><center><a href='?mnu=ffotocalonsiswa&pro=setuju&id=$nopendafaran' title='Setujui Foto'><img class='' src='images/bbetul.png' /></a></center></td>
						<td><center><a href='?mnu=ffotocalonsiswa&pro=tolak&id=$nopendafaran' onClick='return confirm(\"APAKAH ANDA YAKIN AKAN MENOLAK FOTO INI?\")' title='Tolak Foto'><img class='' src='images/stop.png' /></a></center></td></center>
					</tr>";
				}//no==1
				else if($no %2==0){
					echo"<tr bgcolor='#FFFF99'>
						<td>$no</td>
						<td>$nopendafaran</td>
						<td>$namalengkap</td>
						<td><center>$nohp</center></td>
						<td><center><a href='$FTSWA/$foto' class='link' title='$namalengkap' rel='prettyPhoto[gallery1]'><img src='$FTSWA/$foto' width='70' height='70' /></a></center></td>
						<td><center><a href='?mnu=ffotocalonsiswa&pro=setuju&id=$nopendafaran' title='Setujui Foto'><img class='' src='images/bbetul.png' /></a></center></td>
						<td><center><a href='?mnu=ffotocalonsiswa&pro=tolak&id=$nopendafaran' onClick='return confirm(\"APAKAH ANDA YAKIN AKAN MENOLAK FOTO INI?\")' title='Tolak Foto'><img class='' src='images/stop.png' /></a></center></td></center>
					</tr>";
				}
				$no++;
			}//while
		}//if
		else{
			echo"<tr><td colspan='7'><center>BELUM ADA REQUEST FOTO</center></td></tr>";
		}
?>
</table>


<?php 
	//Langkah 3: Hitung total data dan page 
	$tampil2 = mysql_query("select * from tbl_calonsiswa where f_stsfoto='T' ");
	$jmldata = mysql_num_rows($tampil2);
	if($jmldata>0){
		$jmlhal  = ceil($jmldata/$batas);
		echo "<center>";
		if($page > 1){
			$prev=$page-1;
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=ffotocalonsiswa'>« Prev</a></span> ";
		}
		else{
			echo "<span class=disabled>« Prev</span> ";
		}
		
		// Tampilkan link page 1,2,3 ...
		for($i=1;$i<=$jmlhal;$i++)
		if($i != $page){
			echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=ffotocalonsiswa'>$i</a> ";
		}
		else{
			echo " <span class=current>$i</span> ";
		}

		// Link kepage berikutnya (Next)
		if($page < $jmlhal){
			$next=$page+1;
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=ffotocalonsiswa'>Next »</a></span>";
		}
		else{ 
			echo "<span class=disabled>Next »</span>";
		}
		echo "</center>";
	}//if jmldata
	else{
		$tampil2 = mysql_query("select * from tbl_calonsiswa where f_stsfoto='T' ");
		$jmldata = mysql_num_rows($tampil2);
	}
	echo "<p align=center>TOTAL <b>$jmldata</b> REQUEST</p>";

}//if Administrator
?>


<?php	//	MENYETUJUI FOTO
	if($_GET["pro"]=="setuju"){
		$nopendafaran=$_GET["id"];
		$s1="update tbl_calonsiswa set f_stsfoto='Y' where f_nopendaftaran='$nopendafaran' ";
		$setuju=mysql_query($s1);
		if($setuju){
			//MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendafaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$nopendaftaran=$data["f_nopendaftaran"];
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			//MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Foto yg Anda upload telah mendapat persetujuan panitia. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);
		
			echo"<script>alert('FOTO BERHASIL DISETUJUI');document.location.href='?mnu=ffotocalonsiswa';</script>";
		}
		else{
			echo"<script>alert('FOTO GAGAL DISETUJUI');document.location.href='?mnu=ffotocalonsiswa';</script>";
		}
	}
?>

<?php	//	MENOLAK FOTO
	if($_GET["pro"]=="tolak"){
		$nopendaftaran=$_GET["id"];
		$s="update tbl_calonsiswa set f_foto='default.png', f_stsfoto=NULL where f_nopendaftaran='$nopendaftaran' ";
		$tolak=mysql_query($s);
		if($tolak){
			//MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$nopendaftaran=$data["f_nopendaftaran"];
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			//MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Foto yg Anda upload tidak memenuhi syarat, silahkan upload kembali sesuai ketentuan. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);
			
			echo"<script>alert('FOTO BERHASIL DITOLAK');document.location.href='?mnu=ffotocalonsiswa';</script>";
		}
		else{
			echo"<script>alert('FOTO GAGAL DITOLAK');document.location.href='?mnu=ffotocalonsiswa';</script>";
		}
	}
?>
