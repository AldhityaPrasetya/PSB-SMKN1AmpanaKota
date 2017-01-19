
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<h2>PESAN TERKIRIM </h2>

<?php include "koneksi.php"; if(!$_SESSION["1CLEVEL"]==""){ ?>

<table width="100%" border="1">
  <tr bgcolor="#333333">
    <th width="2%" bgcolor="#333333"><span class="style2">No.</span></th>
    <th width="2%" bgcolor="#333333"><span class="style2">ID</span></th>
    <th width="5%" bgcolor="#333333"><span class="style2">NomorHp</span></th>
    <th width="72%" bgcolor="#333333"><span class="style2">Isi Pesan </span></th>
	<th width="13%" bgcolor="#333333"><span class="style2">Status</span></th>
    <th width="6%" bgcolor="#333333"><span class="style2">Menu</span></th>
  </tr>
  
<?php  
	$s="select * from sentitems order by ID desc ";	// where Processed='false'";
	$q=mysql_query($s);
	$jum=mysql_num_rows($q);
	if($jum > 0){
		$batas   = 20;
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
			$idnya=$d["ID"];
			$nomer=$d["DestinationNumber"];
			$smstext=$d["TextDecoded"];
			$status=$d["Status"];

			if($no %2==1){
				echo"<tr bgcolor='#99FF33'>
					<td>$no</td>
					<td>$idnya</td>
					<td>$nomer</td>
					<td>$smstext</td>
					<td>$status</td>
					<td><center><a href='?mnu=outbox&pro=hapus&id=$idnya' onClick='return confirm(\"APAKAH ANDA YAKIN UNTUK MENGHAPUS DATA INI?..\")' title='Hapus Pesan'><img class='' src='images/stop.png' /></a></center></td>
				</tr>";
			}//no==1
			else if($no %2==0){
				echo"<tr bgcolor='#FFFF99'>
					<td>$no</td>
					<td>$idnya</td>
					<td>$nomer</td>
					<td>$smstext</td>
					<td>$status</td>
					<td><center><a href='?mnu=outbox&pro=hapus&id=$idnya' onClick='return confirm(\"APAKAH ANDA YAKIN UNTUK MENGHAPUS DATA INI?..\")' title='Hapus Pesan'><img class='' src='images/stop.png' /></a></center></td>
				</tr>";
			}
			$no++;
		}//while
	}//if
	else{
		echo"<tr><td colspan='6'><center>BELUM ADA PESAN TERKIRIM</center></td></tr>";
	}
?>
</table>

<?php 
	//Langkah 3: Hitung total data dan page 
	$tampil2 = mysql_query("select * from sentitems  ");
	$jmldata = mysql_num_rows($tampil2);
	if($jmldata>0){
		$jmlhal  = ceil($jmldata/$batas);
		echo "<center>";
		if($page > 1){
			$prev=$page-1;
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=outbox'>« Prev</a></span> ";
		}
		else{echo "<span class=disabled>« Prev</span> ";}

		// Tampilkan link page 1,2,3 ...
		for($i=1;$i<=$jmlhal;$i++)
		if ($i != $page){
			echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=outbox'>$i</a> ";
		}
		else{
			echo " <span class=current>$i</span> ";
		}

		// Link kepage berikutnya (Next)
		if($page < $jmlhal){
			$next=$page+1;
			echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=outbox'>Next »</a></span>";
		}
		else{ 
			echo "<span class=disabled>Next »</span>";
		}
		echo "</center>";
	}//if jmldata
	else{
		$tampil2 = mysql_query("select * from sentitems ");
		$jmldata = mysql_num_rows($tampil2);
	}
	echo "<p align=center>TOTAL <b>$jmldata</b> PESAN</p>";
}//if Administrator
?>

<?php	//	MENGHAPUS DATA OUTBOX
	if($_GET["pro"]=="hapus"){
		$idnya = $_GET["id"];
		$s=" delete from sentitems where ID='$idnya' ";
		$delete=mysql_query($s);
		if($delete){
			echo "<script>alert('DATA BERHASIL DIHAPUS');document.location.href='?mnu=outbox';</script>";
		}
		else{
			echo"<script>alert('DATA GAGAL DIHAPUS');document.location.href='?mnu=outbox';</script>";
		}
	}
?>