<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#pesantext").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>

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
.style2 {color: #FF0000}
-->
</style>

<h2>KIRIM PESAN</h2>

<form id="pesantext" action="" method="post" enctype="multipart/form-data">
  <table width="672">
    <tr>
      <td width="251"><div align="right" class="style1">Nomor Tujuan: </div></td>
      <td width="409">
        <input name="nomer" type="text" value="<?php echo $nomer; ?>" size="15" class="required" title="nomor harus diisi" />
		</td>
    </tr>
    <tr>
      <td><div align="right" class="style1">Isi Pesan: </div></td>
      <td>
        <textarea name="smstext" cols="40" rows="4" class="required" title="pesan harus diisi"><?php echo $smstext;?></textarea>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="kirimsms" type="submit" id="kirimsms" value="Kirim Pesan" />
        <a href="?mnu=inbox">
        <input name="Batal" type="button" id="Batal" value="Batal" />
      </a></td>
    </tr>
  </table>
</form>

<?php	//	KIRIM SMS 
	if(isset($_POST["kirimsms"])){	
		$idnya = $_POST["idnya"];
		$nomer = $_POST["nomer"];
		$smstext=$_POST["smstext"];
		
		$sql=" insert into outbox(DestinationNumber, TextDecoded,CreatorID) VALUES ('$nomer','$smstext','Administrator PSB') ";

		$hasil=mysql_query($sql);
		if($hasil){
			$updateinboxtrue="update inbox set Processed='true' where ID='$idnya' ";
			mysql_query($updateinboxtrue);		
			echo"<script>alert('SMS BERHASIL DIKIRIM');document.location.href='?mnu=pesantext';</script>";
		}
		else{
			echo"<script>alert('SMS GAGAL DIKIRIM');document.location.href='?mnu=pesantext';</script>";
		}
	}
?>
