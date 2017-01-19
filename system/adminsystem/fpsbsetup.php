<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#psbsetup").validate({
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
-->
</style>


	<!-- LOAD DATA -->
<?php
	$sql="select * from  tbl_psbsetup ";
	$hasil=mysql_query($sql);
		$data=mysql_fetch_array($hasil);
			$angkatanpsb = $data["f_angkatanpsb"];
			$semester = $data["f_semester"];
			$ketuapanitia=$data["f_ketuapanitia"];
			$hargaformulir = $data["f_hargaformulir"];
			$telppsb=$data["f_telppsb"];
?>

<?php if(!$_SESSION["1CLEVEL"]==""){ ?>

<h2>PENGATURAN PENERIMAAN SISWA BARU </h2>
<form id="psbsetup" action="" method="post"  name="ftbl_psbsettup">
<table width="494">
  <tr>
    <td width="186"><div align="right" class="style1"><span class="style1">Tahun Periode:</span></div></td>
    <td width="296">
      <input name="angkatanpsb" type="text" value="<?php echo $angkatanpsb;?>" size="10" class="required" title="harus diisi" />
    </td>
  </tr>
  <tr>
    <td><div align="right" class="style1"><span class="style1">Semester:</span></div></td>
    <td>
      <select name="semester" class="required" title="harus diisi">
        <option value="<?php echo $semester;?>"><?php echo $semester;?></option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><div align="right" class="style1"><span class="style1">Ketua Panitia: </span></div></td>
    <td>
      <input name="ketuapanitia" type="text" value="<?php echo $ketuapanitia;?>" size="40" class="required" title="harus diisi" />
    </td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Nomor Telpon System: </div></td>
    <td>
      <input name="telppsb" type="text" value="<?php echo $telppsb;?>" size="15" class="required" title="harus diisi" />
	</td>
  </tr>
  <tr>
    <td><div align="right" class="style1"><span class="style1">Harga Formulir: </span></div></td>
    <td>
      <input name="hargaformulir" type="text" value="<?php echo $hargaformulir;?>" size="10" class="required" title="harus diisi" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="Ubah" onclick="return confirm('Update Data')" value="Update" />    </td>
  </tr>
</table>

</form>


	<!-- UPDATE DATA -->
<?php 
if(isset($_POST["Ubah"])){
	$angkatanpsb = $_POST["angkatanpsb"];
	$semester = $_POST["semester"];
	$ketuapanitia=$_POST["ketuapanitia"];
	$telppsb=$_POST["telppsb"];
	$hargaformulir = $_POST["hargaformulir"];	
	$sql="update tbl_psbsetup set f_angkatanpsb='$angkatanpsb', f_semester='$semester', f_ketuapanitia='$ketuapanitia', f_telppsb='$telppsb', f_hargaformulir='$hargaformulir' ";
	$hasil=mysql_query($sql);
	if($hasil){
		echo"<script>alert('PERUBAHAN DATA BERHASIL');document.location.href='?mnu=fpsbsetup';</script>";
	}
	else{
		echo"<script>alert('PERUBAHAN DATA GAGAL');document.location.href='?mnu=fpsbsetup';</script>";
	}
}

}
?>
