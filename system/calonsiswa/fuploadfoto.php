<?php 
	$foto0="default.png";
	$FTSWA="fotocalonsiswa";
?>
<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#uploadfoto").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>

<h2>UPLOAD FOTO CALON SISWA </h2>

<form id="uploadfoto" action="" method="post" enctype="multipart/form-data">
<table width="494">
  <tr>
    <td height="24" align="right" valign="top">Pilih Foto Anda:</td>
    <td valign="top"><input type="file" name="foto" id="foto" class="required" title="Pilih foto" />
    </td>
  </tr>
  <tr>
    <td width="136" height="26" align="right" valign="top">&nbsp;</td>
    <td width="346" valign="top"><input name="Ubah" type="submit" id="Ubah" onclick="return confirm('Upload Foto ?')" value="Upload" />
        <input name="foto0" type="hidden" id="foto0" value="<?php echo $foto0;?>" />
    </td>
  </tr>
</table>
</form>

<?php 	//	UPDATE FOTO
	$nopendaftaran=$_SESSION["KODELOG"];
	if(isset($_POST["Ubah"])){	
	
		if($_FILES["foto"] != ""){
			@copy($_FILES["foto"]["tmp_name"],"$FTSWA/".$_FILES["foto"]["name"]);
			$foto=$_FILES["foto"]["name"];
		} 
		else{
			$foto=$foto0;
		}
		if(strlen($foto)<1){
			$foto=$foto0;
		}
		
		$sql="update tbl_calonsiswa set f_foto='$foto', f_stsfoto='T' where f_nopendaftaran='$nopendaftaran' ";

		$hasil=mysql_query($sql);
		if($hasil){
			echo"<script>alert('UPLOAD FOTO BERHASIL');document.location.href='?mnu=ffoto';</script>";
		}
		else{
			echo"<script>alert('UPLOAD FOTO GAGAL');document.location.href='?mnu=ffoto';</script>";
		}
	}
	
?>
