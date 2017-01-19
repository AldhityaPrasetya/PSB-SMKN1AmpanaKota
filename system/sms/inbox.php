<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#inbox").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<?php 
	//$pro="simpan";
	include "koneksi.php";
?>


<?php
	if($_GET["pro"]=="ubah"){
		$idnya=$_GET["id"];
		$s="select * from inbox where ID='$idnya'";
		$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$idnya=$d["ID"];
				$nomer=$d["SenderNumber"];
				$smstext=$d["TextDecoded"];
				
				$pro="ubah";		
	}
?>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #FFFFFF}
-->
</style>
<?php if(!$_SESSION["1CLEVEL"]==""){ ?>

<h2>PESAN MASUK</h2>

<form id="inbox" action="" method="post" enctype="multipart/form-data">
<table width="544">    
    <tr>
      <td width="186"><div align="right" class="style1">ID:  </div></td>
      <td width="346" valign="top"><input name="idnya" type="text" value="<?php echo $idnya;?>" size="2" readonly="true" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Nomor: </div></td>
      <td>
        <input name="nomer" type="text" value="<?php echo $nomer; ?>" size="15" readonly="true" class="required" title="tidak ada nomornya" />
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Isi Pesan:   </div></td>
      <td>
        <textarea name="smstext" cols="40" rows="4" readonly="readonly"><?php echo $smstext;?></textarea>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Pesan Balasan: </div></td>
      <td>
        <textarea name="balassmstext" cols="40" rows="4" class="required" title="belum ada pesan balasan"></textarea>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="kirimsms" type="submit" id="kirimsms" value="Kirim Pesan Balasan" />
        <a href="?mnu=inbox">
        <input name="Batal" type="button" id="Batal" value="Batal" />
      </a></td>
    </tr>
  </table>
</form>


<table width="550" border="1">
  <tr bgcolor="#333333"">
    <th width="2%" bgcolor="#333333"><span class="style2">No.</span></th>
    <th width="2%" bgcolor="#333333"><span class="style2">ID</span></th>
    <th width="6%" bgcolor="#333333"><span class="style2">NomorHp</span></th>
	<th width="18%" bgcolor="#333333"><span class="style2">Diterima</span></th>
    <th width="57%" bgcolor="#333333"><span class="style2">Isi Pesan </span></th>
    <th width="15%" bgcolor="#333333"><span class="style2">Menu</span></th>
  </tr>
<?php  
  $s="select * from inbox where kirim='false' order by ID desc ";
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
				$idnya=$d["ID"];
				$nomer=$d["SenderNumber"];
				$smstext=$d["TextDecoded"];
				$diterima=$d["ReceivingDateTime"];
						
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$no</td>
				<td>$idnya</td>
				<td>$nomer</td>
				<td>$diterima</td>
				<td>$smstext</td>
				<td><center><a href='?mnu=inbox&pro=ubah&id=$idnya'>Balas</a>
				<a href='?mnu=inbox&pro=hapus&id=$idnya' onClick='return confirm(\"APAKAH ANDA YAKIN AKAN MENGHAPUS PESAN INI?\")'>Hapus</a></center></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
				<td>$no</td>
				<td>$idnya</td>
				<td>$nomer</td>
				<td>$diterima</td>
				<td>$smstext</td>
				<td><center><a href='?mnu=inbox&pro=ubah&id=$idnya'>Balas</a>
				<a href='?mnu=inbox&pro=hapus&id=$idnya' onClick='return confirm(\"APAKAH ANDA YAKIN AKAN MENGHAPUS PESAN INI?\")'>Hapus</a></center></td>
				</tr>";
				}
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><center>BELUM ADA PESAN YANG MASUK</center></td></tr>";}
?>
</table>

<?php 
//Langkah 3: Hitung total data dan page 
$tampil2 = mysql_query("select * from inbox where Processed='false' ");
$jmldata = mysql_num_rows($tampil2);
if($jmldata>0){
$jmlhal  = ceil($jmldata/$batas);
echo "<center>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=inbox'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=inbox'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=inbox'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</center>";
	}//if jmldata
}//if Administrator
else{
$tampil2 = mysql_query("select * from inbox ");
$jmldata = mysql_num_rows($tampil2);
}
echo "<p align=center>Total <b>$jmldata</b> Data</p>";
?>


<?php	//	KIRIM SMS BALASAN
	if(isset($_POST["kirimsms"])){	
		$idnya = $_POST["idnya"];
		$nomer = $_POST["nomer"];
		$smstext=$_POST["smstext"];
		$balassmstext = $_POST["balassmstext"];
		
		$sql=" insert into outbox(DestinationNumber, TextDecoded,CreatorID) VALUES ('$nomer','$balassmstext','Administrator PSB') ";

		$hasil=mysql_query($sql);
		if($hasil){
			$updateinboxtrue="update inbox set Processed='true', kirim='true' where ID='$idnya' ";
			mysql_query($updateinboxtrue);		
			echo"<script>alert('SMS BERHASIL DIKIRIM');document.location.href='?mnu=inbox';</script>";
		}
		else{
			echo"<script>alert('SMS GAGAL DIKIRIM');document.location.href='?mnu=inbox';</script>";
		}
	}
?>

<?php	//	HAPUS SMS 
	if($_GET["pro"]=="hapus"){
		$idnya = $_GET["id"];		
		$sql="delete from inbox where ID='$idnya'  ";
		$hasil=mysql_query($sql);
		if($hasil){
			echo"<script>alert('SMS BERHASIL DIHAPUS');document.location.href='?mnu=inbox';</script>";
		}
		else{
			echo"<script>alert('SMS GAGAL DIHAPUS');document.location.href='?mnu=inbox';</script>";
		}
	}
?>
